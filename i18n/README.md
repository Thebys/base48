# HTML Translation Tool with DeepL API

A powerful HTML translation tool that uses the DeepL API with **perfect structure preservation**. This tool uses an intelligent two-pass approach to ensure complex HTML structures remain intact while translating content.

## Key Features

- 🎯 **Perfect HTML structure preservation**: Complex nested elements stay intact
- 🌐 **Smart two-pass translation**: Parse structure → translate content → reconstruct perfectly
- 🔒 **Translation control**: Respects `translate="no"` and `class="notranslate"` attributes
- 📁 **Batch processing**: Translate to multiple languages at once
- ⚡ **Efficient**: Batch translation of text segments for optimal API usage
- 🎛️ **Flexible output**: Custom paths, directories, and naming
- 📝 **Clear progress**: Detailed logging and error reporting

## How It Works

1. **Parse**: HTML structure is analyzed and preserved
2. **Extract**: Only translatable text content is identified  
3. **Translate**: Text segments are efficiently batch-translated
4. **Reconstruct**: HTML is rebuilt with translated text and perfect structure

This ensures complex elements like frame containers, buttons with icons, and nested structures remain perfectly intact.

## Setup

### 1. Get DeepL API Key

1. Visit [DeepL Pro API](https://www.deepl.com/pro-api)
2. Sign up for free (500K characters/month) or paid account
3. Get your authentication key from account settings

### 2. Install Dependencies

```bash
cd i18n
python setup.py
```

Or manually:
```bash
cd i18n
python -m venv venv

# Windows
venv\Scripts\activate
# Linux/Mac
source venv/bin/activate

pip install -r requirements.txt
```

### 3. Configure API Key

Edit `.env` file and add your key:
```
DEEPL_API_KEY=your_actual_api_key_here
```

## Usage

### Single File Translation

```bash
# Basic translation
python translate.py ../index.html -t EN-US

# Specify source language
python translate.py ../index.html -t DE -s CS

# Custom output file
python translate.py ../index.html -t FR -o ../index_french.html

# Output to directory
python translate.py ../index.html -t DE --output-dir ../translations/
```

### Batch Translation (Multiple Languages)

```bash
# Translate to basic European languages
python translate_batch.py ../index.html --language-set basic --output-dir ../translations/

# Custom language list
python translate_batch.py ../index.html --languages EN-US DE FR ES IT

# Show available language sets
python translate_batch.py --list-sets
```

### Utility Commands

```bash
# List all available languages
python translate.py --list-languages

# Use API key from command line
python translate.py ../index.html -t EN-US --api-key your_key_here
```

## Language Sets (Batch Translation)

| Set | Languages |
|-----|-----------|
| `basic` | EN-US, DE, FR |
| `european` | EN-US, DE, FR, ES, IT, NL, PL |
| `extended` | EN-US, DE, FR, ES, IT, PT-PT, RU, JA, ZH |
| `nordic` | EN-US, SV, DA, NO, FI |
| `slavic` | EN-US, PL, RU, CS, SK |

## Structure Preservation Examples

### Complex Frame Containers ✅ Perfect
```html
<!-- Original Czech -->
<a href="#" class="frame-container portrait glow" data-gallery="space">
    <img src="/img/frame/frame.webp" alt="CRT Frame" class="frame-frame">
    <div class="frame-content scanlines">
        <span class="frame-title">Prostor</span>
        <img src="/img/screen/content.webp" alt="Content" class="frame-content-image">
    </div>
</a>

<!-- Translated English - Structure 100% intact -->
<a href="#" class="frame-container portrait glow" data-gallery="space">
    <img src="/img/frame/frame.webp" alt="CRT Frame" class="frame-frame">
    <div class="frame-content scanlines">
        <span class="frame-title">Space</span>
        <img src="/img/screen/content.webp" alt="Content" class="frame-content-image">
    </div>
</a>
```

### Buttons with Icons ✅ Perfect
```html
<!-- Original -->
<a href="#section" class="button">
    <i class="fas fa-icon"></i>
    <span class="button-inner">Tlačítko</span>
</a>

<!-- Translated - Perfect structure preservation -->
<a href="#section" class="button">
    <i class="fas fa-icon"></i>
    <span class="button-inner">Button</span>
</a>
```

## Translation Control

### Prevent Translation
```html
<!-- Will NOT be translated -->
<p translate="no">This stays in original language</p>
<div class="notranslate">This content is preserved</div>

<!-- WILL be translated -->
<p>This text will be translated</p>
<h1>This heading will be translated</h1>
```

## Command Line Options

### Main Translator (`translate.py`)
- `input_file`: HTML file to translate
- `-t, --target-lang`: Target language code (required)
- `-s, --source-lang`: Source language (optional, auto-detect)
- `-o, --output`: Custom output file path
- `--output-dir`: Output directory
- `--list-languages`: Show available languages
- `--api-key`: DeepL API key

### Batch Translator (`translate_batch.py`)
- `input_file`: HTML file to translate
- `--languages`: Space-separated language codes
- `--language-set`: Predefined language set
- `--source-lang`: Source language
- `--output-dir`: Output directory (default: `translations`)
- `--list-sets`: Show language sets
- `--api-key`: DeepL API key

## File Structure

```
i18n/
├── translate.py             # Main translator (smart structure preservation)
├── translate_batch.py       # Batch translation to multiple languages
├── setup.py                 # Cross-platform setup script
├── requirements.txt         # Python dependencies
├── .env                     # API key configuration
├── config.env.example       # Example configuration
├── venv/                    # Virtual environment
└── README.md                # This documentation

../
├── index.html               # Original website
├── index_en_us.html         # English translation
├── index_de.html            # German translation
└── translations/            # Batch output directory
    ├── index_fr.html
    └── index_es.html
```

## Common Language Codes

- `EN-US` - English (American)
- `EN-GB` - English (British)  
- `DE` - German
- `FR` - French
- `ES` - Spanish
- `IT` - Italian
- `PT-PT` - Portuguese (European)
- `PT-BR` - Portuguese (Brazilian)
- `RU` - Russian
- `JA` - Japanese
- `ZH` - Chinese (simplified)
- `KO` - Korean
- `NL` - Dutch
- `PL` - Polish
- `CS` - Czech
- `SV` - Swedish
- `DA` - Danish
- `NO` - Norwegian
- `FI` - Finnish

## Production Example

Translate your website to multiple languages:

```bash
# Activate environment
source venv/bin/activate  # Linux/Mac
# or
venv\Scripts\activate     # Windows

# Single translation
python translate.py ../index.html -t EN-US -o ../index_en.html

# Batch translation
python translate_batch.py ../index.html --language-set european --output-dir ../translations/
```

## API Usage Limits

- **Free**: 500,000 characters/month
- **Paid**: Various limits based on plan
- Monitor usage: `python translate.py --list-languages`

## Troubleshooting

1. **API key issues**: Verify `.env` file and DeepL account
2. **Environment**: Re-run `setup.py` if needed
3. **Translation quality**: Tool preserves ALL HTML structure perfectly
4. **File not found**: Check paths relative to current directory

**Perfect HTML structure preservation guaranteed** ✅ 