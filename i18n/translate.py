#!/usr/bin/env python3
"""
HTML Translation Script using DeepL API

This script uses a smart two-pass approach to translate HTML files while
perfectly preserving HTML structure, CSS classes, and JavaScript attributes:

1. First pass: Parse HTML structure and extract translatable text segments
2. Second pass: Translate text segments and reconstruct HTML with perfect structure preservation

Features:
- Perfect HTML structure preservation
- Respects translate="no" and class="notranslate" attributes
- Handles complex nested elements (frame containers, buttons with icons)
- Batch translation of text segments for efficiency
- Automatic language detection
"""

import os
import sys
import argparse
import deepl
import re
from pathlib import Path
from dotenv import load_dotenv
from html.parser import HTMLParser
import html

class HTMLTranslator(HTMLParser):
    def __init__(self, api_key):
        super().__init__()
        try:
            self.translator = deepl.Translator(api_key)
            usage = self.translator.get_usage()
            print(f"DeepL API connected successfully. Usage: {usage.character.count}/{usage.character.limit}")
        except Exception as e:
            print(f"Error connecting to DeepL API: {e}")
            sys.exit(1)
        
        # State tracking
        self.reset_parser_state()
    
    def reset_parser_state(self):
        """Reset parser state for new document."""
        self.output = []
        self.text_buffer = []
        self.current_tag_stack = []
        self.translatable_text_segments = []
        self.text_map = {}
        self.in_translatable_content = True
        self.skip_translation_tags = {'script', 'style', 'code', 'pre'}
        self.structural_tags = {'html', 'head', 'body', 'div', 'section', 'header', 'footer', 'nav', 'main'}
        
    def handle_starttag(self, tag, attrs):
        """Handle opening tags."""
        attrs_dict = dict(attrs)
        
        # Check if this element should not be translated
        should_skip = (
            tag in self.skip_translation_tags or
            attrs_dict.get('translate') == 'no' or
            'notranslate' in attrs_dict.get('class', '').split()
        )
        
        self.current_tag_stack.append((tag, should_skip))
        
        # Update translation state
        if should_skip:
            self.in_translatable_content = False
        
        # Reconstruct tag
        attr_string = ''
        if attrs:
            attr_parts = []
            for name, value in attrs:
                if value is None:
                    attr_parts.append(name)
                else:
                    attr_parts.append(f'{name}="{html.escape(value)}"')
            attr_string = ' ' + ' '.join(attr_parts)
        
        self.output.append(f'<{tag}{attr_string}>')
    
    def handle_endtag(self, tag):
        """Handle closing tags."""
        if self.current_tag_stack:
            closed_tag, was_skipped = self.current_tag_stack.pop()
            if was_skipped and not any(skip for _, skip in self.current_tag_stack):
                self.in_translatable_content = True
        
        self.output.append(f'</{tag}>')
    
    def handle_data(self, data):
        """Handle text content."""
        stripped_data = data.strip()
        
        if stripped_data and self.in_translatable_content:
            # This is translatable text
            placeholder = f"__TRANSLATE_{len(self.translatable_text_segments)}__"
            self.translatable_text_segments.append(stripped_data)
            self.output.append(placeholder)
            
            # Preserve original whitespace structure
            if data.startswith(' ') or data.startswith('\n') or data.startswith('\t'):
                leading_match = re.match(r'^(\s*)', data)
                if leading_match:
                    leading_space = leading_match.group(1)
                    self.output[-1] = leading_space + placeholder
            if data.endswith(' ') or data.endswith('\n') or data.endswith('\t'):
                trailing_match = re.search(r'(\s*)$', data)
                if trailing_match:
                    trailing_space = trailing_match.group(1)
                    self.output[-1] = self.output[-1] + trailing_space
        else:
            # Non-translatable or whitespace-only content
            self.output.append(data)
    
    def handle_startendtag(self, tag, attrs):
        """Handle self-closing tags."""
        attrs_dict = dict(attrs)
        
        attr_string = ''
        if attrs:
            attr_parts = []
            for name, value in attrs:
                if value is None:
                    attr_parts.append(name)
                else:
                    attr_parts.append(f'{name}="{html.escape(value)}"')
            attr_string = ' ' + ' '.join(attr_parts)
        
        self.output.append(f'<{tag}{attr_string} />')
    
    def handle_comment(self, data):
        """Handle HTML comments."""
        self.output.append(f'<!--{data}-->')
    
    def handle_decl(self, decl):
        """Handle declarations like DOCTYPE."""
        self.output.append(f'<!{decl}>')
    
    def get_available_languages(self):
        """Get available source and target languages."""
        try:
            source_langs = self.translator.get_source_languages()
            target_langs = self.translator.get_target_languages()
            return source_langs, target_langs
        except Exception as e:
            print(f"Error fetching languages: {e}")
            return [], []
    
    def translate_segments(self, target_lang, source_lang=None):
        """Translate all collected text segments."""
        if not self.translatable_text_segments:
            return {}
        
        print(f"Translating {len(self.translatable_text_segments)} text segments...")
        
        translations = {}
        
        # Translate segments in batches to avoid API limits
        batch_size = 50
        for i in range(0, len(self.translatable_text_segments), batch_size):
            batch = self.translatable_text_segments[i:i + batch_size]
            
            try:
                # Join segments with a special separator for batch translation
                combined_text = '\n---SEGMENT_SEPARATOR---\n'.join(batch)
                
                kwargs = {
                    'text': combined_text,
                    'target_lang': target_lang,
                    'preserve_formatting': True
                }
                
                if source_lang:
                    kwargs['source_lang'] = source_lang
                
                result = self.translator.translate_text(**kwargs)
                
                # Split the result back into individual translations
                translated_segments = result.text.split('\n---SEGMENT_SEPARATOR---\n')
                
                # Map original segments to translations
                for j, original in enumerate(batch):
                    if j < len(translated_segments):
                        translations[original] = translated_segments[j].strip()
                    else:
                        translations[original] = original  # Fallback to original
                
                if hasattr(result, 'detected_source_lang') and i == 0:
                    print(f"Detected source language: {result.detected_source_lang}")
                    
            except Exception as e:
                print(f"Translation error for batch {i//batch_size + 1}: {e}")
                # Fallback: keep original text for this batch
                for original in batch:
                    translations[original] = original
        
        return translations
    
    def reconstruct_html(self, translations):
        """Reconstruct HTML with translated text."""
        result = ''.join(self.output)
        
        # Replace placeholders with translations
        for i, original_text in enumerate(self.translatable_text_segments):
            placeholder = f"__TRANSLATE_{i}__"
            translated_text = translations.get(original_text, original_text)
            result = result.replace(placeholder, translated_text)
        
        return result
    
    def translate_file(self, input_file, output_file, target_lang, source_lang=None):
        """Translate an HTML file using the smart two-pass approach."""
        try:
            # Read input file
            with open(input_file, 'r', encoding='utf-8') as f:
                html_content = f.read()
            
            print(f"Parsing HTML structure from {input_file}...")
            
            # Reset parser state
            self.reset_parser_state()
            
            # Parse HTML and extract translatable text
            self.feed(html_content)
            
            # Translate extracted text segments
            translations = self.translate_segments(target_lang, source_lang)
            
            # Reconstruct HTML with translations
            translated_html = self.reconstruct_html(translations)
            
            # Ensure output directory exists
            output_path = Path(output_file)
            output_path.parent.mkdir(parents=True, exist_ok=True)
            
            # Write translated content
            with open(output_file, 'w', encoding='utf-8') as f:
                f.write(translated_html)
            
            print(f"Translation saved to {output_file}")
            return True
            
        except Exception as e:
            print(f"Translation error: {e}")
            return False

def main():
    """Main function to handle command line arguments and execute translation."""
    parser = argparse.ArgumentParser(
        description="Translate HTML files using DeepL API with perfect structure preservation",
        formatter_class=argparse.RawDescriptionHelpFormatter,
        epilog="""
Examples:
  python translate.py index.html -t EN-US
  python translate.py index.html -t DE -s CS -o index_de.html
  python translate.py index.html -t FR --output-dir translations/
  python translate.py --list-languages
        """
    )
    
    parser.add_argument('input_file', nargs='?', help='Input HTML file to translate')
    parser.add_argument('-t', '--target-lang', help='Target language code (e.g., EN-US, DE, FR)')
    parser.add_argument('-s', '--source-lang', help='Source language code (optional, auto-detect if not specified)')
    parser.add_argument('-o', '--output', help='Output file path (optional)')
    parser.add_argument('--output-dir', help='Output directory for translated files')
    parser.add_argument('--list-languages', action='store_true', help='List available languages')
    parser.add_argument('--api-key', help='DeepL API key (or set DEEPL_API_KEY environment variable)')
    
    args = parser.parse_args()
    
    # Load environment variables
    load_dotenv()
    
    # Get API key
    api_key = args.api_key or os.getenv('DEEPL_API_KEY')
    if not api_key:
        print("Error: DeepL API key not provided!")
        print("Set DEEPL_API_KEY environment variable or use --api-key argument")
        print("Get your API key from: https://www.deepl.com/pro-api")
        sys.exit(1)
    
    # Initialize translator
    translator = HTMLTranslator(api_key)
    
    # List languages if requested
    if args.list_languages:
        source_langs, target_langs = translator.get_available_languages()
        print("\nAvailable source languages:")
        for lang in source_langs:
            print(f"  {lang.code}: {lang.name}")
        print("\nAvailable target languages:")
        for lang in target_langs:
            print(f"  {lang.code}: {lang.name}")
        return
    
    # Validate required arguments
    if not args.input_file or not args.target_lang:
        parser.error("Input file and target language are required (unless using --list-languages)")
    
    # Check if input file exists
    if not os.path.exists(args.input_file):
        print(f"Error: Input file '{args.input_file}' not found!")
        sys.exit(1)
    
    # Determine output file
    if args.output:
        output_file = args.output
    elif args.output_dir:
        input_path = Path(args.input_file)
        lang_suffix = f"_{args.target_lang.lower().replace('-', '_')}"
        output_file = os.path.join(
            args.output_dir, 
            f"{input_path.stem}{lang_suffix}{input_path.suffix}"
        )
    else:
        input_path = Path(args.input_file)
        lang_suffix = f"_{args.target_lang.lower().replace('-', '_')}"
        output_file = f"{input_path.stem}{lang_suffix}{input_path.suffix}"
    
    # Perform translation
    success = translator.translate_file(
        args.input_file, 
        output_file, 
        args.target_lang, 
        args.source_lang
    )
    
    if success:
        print(f"\n✅ Translation completed successfully!")
        print(f"📁 Output: {output_file}")
    else:
        print("\n❌ Translation failed!")
        sys.exit(1)

if __name__ == "__main__":
    main() 