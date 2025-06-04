#!/usr/bin/env python3
"""
Batch HTML Translation Script using DeepL API

This script translates HTML files to multiple languages using the DeepL API
with smart structure preservation. Uses the same intelligent two-pass approach
as the main translator to ensure perfect HTML structure preservation.
"""

import os
import sys
import argparse
from pathlib import Path
from dotenv import load_dotenv
from translate import HTMLTranslator

# Common language configurations
LANGUAGE_SETS = {
    'european': ['EN-US', 'DE', 'FR', 'ES', 'IT', 'NL', 'PL'],
    'basic': ['EN-US', 'DE', 'FR'],
    'extended': ['EN-US', 'DE', 'FR', 'ES', 'IT', 'PT-PT', 'RU', 'JA', 'ZH-HANS'],
    'nordic': ['EN-US', 'SV', 'DA', 'NB', 'FI'],
    'slavic': ['EN-US', 'PL', 'RU', 'CS', 'SK'],
}

def translate_to_multiple_languages(input_file, target_languages, output_dir, source_lang=None, api_key=None):
    """
    Translate a single HTML file to multiple target languages.
    
    Args:
        input_file (str): Path to input HTML file
        target_languages (list): List of target language codes
        output_dir (str): Output directory for translated files
        source_lang (str, optional): Source language code
        api_key (str, optional): DeepL API key
    
    Returns:
        dict: Results of translations {lang: success_bool}
    """
    if not api_key:
        load_dotenv()
        api_key = os.getenv('DEEPL_API_KEY')
    
    if not api_key:
        print("Error: DeepL API key not provided!")
        return {}
    
    # Initialize translator
    try:
        translator = HTMLTranslator(api_key)
    except Exception as e:
        print(f"Error initializing translator: {e}")
        return {}
    
    # Create output directory
    output_path = Path(output_dir)
    output_path.mkdir(parents=True, exist_ok=True)
    
    # Translate to each language
    results = {}
    input_path = Path(input_file)
    
    print(f"\n🌐 Batch translating {input_file} to {len(target_languages)} languages")
    print(f"📁 Output directory: {output_dir}")
    print("-" * 60)
    
    for i, target_lang in enumerate(target_languages, 1):
        print(f"\n[{i}/{len(target_languages)}] Translating to {target_lang}...")
        
        # Generate output filename
        lang_suffix = f"_{target_lang.lower().replace('-', '_')}"
        output_file = output_path / f"{input_path.stem}{lang_suffix}{input_path.suffix}"
        
        # Perform translation
        success = translator.translate_file(
            input_file, 
            str(output_file), 
            target_lang, 
            source_lang
        )
        
        results[target_lang] = success
        
        if success:
            print(f"✅ {target_lang}: {output_file}")
        else:
            print(f"❌ {target_lang}: Translation failed")
    
    return results

def main():
    """Main function for batch translation."""
    parser = argparse.ArgumentParser(
        description="Batch translate HTML files to multiple languages using DeepL API with perfect structure preservation",
        formatter_class=argparse.RawDescriptionHelpFormatter,
        epilog="""
Language Set Examples:
  --language-set european    # EN-US, DE, FR, ES, IT, NL, PL
  --language-set basic       # EN-US, DE, FR
  --language-set extended    # EN-US, DE, FR, ES, IT, PT-PT, RU, JA, ZH-HANS
  --language-set nordic      # EN-US, SV, DA, NB, FI
  --language-set slavic      # EN-US, PL, RU, CS, SK

Custom Examples:
  python translate_batch.py input.html --languages EN-US DE FR
  python translate_batch.py input.html --language-set european --output-dir translations/
  python translate_batch.py input.html --languages EN-US DE --source-lang CS
        """
    )
    
    parser.add_argument('input_file', nargs='?', help='Input HTML file to translate')
    parser.add_argument('--languages', nargs='+', help='Target language codes (e.g., EN-US DE FR)')
    parser.add_argument('--language-set', choices=LANGUAGE_SETS.keys(), 
                       help='Predefined language set')
    parser.add_argument('--source-lang', help='Source language code (optional, auto-detect)')
    parser.add_argument('--output-dir', default='translations', 
                       help='Output directory (default: translations)')
    parser.add_argument('--api-key', help='DeepL API key')
    parser.add_argument('--list-sets', action='store_true', 
                       help='List available language sets')
    
    args = parser.parse_args()
    
    # List language sets if requested
    if args.list_sets:
        print("Available language sets:")
        for set_name, languages in LANGUAGE_SETS.items():
            print(f"  {set_name}: {', '.join(languages)}")
        return
    
    # Validate input file
    if not args.input_file:
        parser.error("Input file is required")
    
    if not os.path.exists(args.input_file):
        print(f"Error: Input file '{args.input_file}' not found!")
        sys.exit(1)
    
    # Determine target languages
    if args.language_set:
        target_languages = LANGUAGE_SETS[args.language_set]
        print(f"Using language set '{args.language_set}': {', '.join(target_languages)}")
    elif args.languages:
        target_languages = args.languages
        print(f"Using custom languages: {', '.join(target_languages)}")
    else:
        parser.error("Either --languages or --language-set must be specified")
    
    # Perform batch translation
    results = translate_to_multiple_languages(
        args.input_file,
        target_languages,
        args.output_dir,
        args.source_lang,
        args.api_key
    )
    
    # Summary
    print("\n" + "=" * 60)
    print("📊 Translation Summary:")
    print("=" * 60)
    
    successful = [lang for lang, success in results.items() if success]
    failed = [lang for lang, success in results.items() if not success]
    
    if successful:
        print(f"✅ Successful ({len(successful)}): {', '.join(successful)}")
    
    if failed:
        print(f"❌ Failed ({len(failed)}): {', '.join(failed)}")
    
    print(f"\n📁 Output directory: {args.output_dir}")
    print(f"📈 Success rate: {len(successful)}/{len(target_languages)} ({len(successful)/len(target_languages)*100:.1f}%)")
    
    if failed:
        sys.exit(1)

if __name__ == "__main__":
    main() 