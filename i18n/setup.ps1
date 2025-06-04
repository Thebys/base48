# HTML Translation Tool Setup Script for Windows PowerShell
# Run this script from the i18n directory

Write-Host "🚀 Setting up HTML Translation Tool with DeepL API" -ForegroundColor Green
Write-Host "=" * 50

# Check if Python is installed
try {
    $pythonVersion = python --version
    Write-Host "📍 Using Python: $pythonVersion" -ForegroundColor Cyan
} catch {
    Write-Host "❌ Error: Python not found. Please install Python 3.7+ first." -ForegroundColor Red
    Write-Host "Download from: https://www.python.org/downloads/" -ForegroundColor Yellow
    exit 1
}

# Create virtual environment
Write-Host "`n📁 Creating virtual environment..." -ForegroundColor Yellow
try {
    python -m venv venv
    Write-Host "✅ Virtual environment created successfully!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error creating virtual environment: $_" -ForegroundColor Red
    exit 1
}

# Activate virtual environment and install dependencies
Write-Host "`n📦 Installing dependencies..." -ForegroundColor Yellow
try {
    & ".\venv\Scripts\Activate.ps1"
    pip install -r requirements.txt
    Write-Host "✅ Dependencies installed successfully!" -ForegroundColor Green
} catch {
    Write-Host "❌ Error installing dependencies: $_" -ForegroundColor Red
    exit 1
}

# Create .env file if it doesn't exist
if (!(Test-Path ".env")) {
    if (Test-Path "config.env.example") {
        Copy-Item "config.env.example" ".env"
        Write-Host "✅ Created .env file from example" -ForegroundColor Green
        Write-Host "⚠️  Remember to edit .env and add your DeepL API key!" -ForegroundColor Yellow
    }
}

Write-Host "`n" + "=" * 50
Write-Host "✅ Setup completed successfully!" -ForegroundColor Green

Write-Host "`n📋 Next steps:" -ForegroundColor Cyan
Write-Host "1. Edit the .env file and add your DeepL API key"
Write-Host "   Get your API key from: https://www.deepl.com/pro-api"

Write-Host "`n2. Activate the virtual environment:"
Write-Host "   .\venv\Scripts\Activate.ps1" -ForegroundColor Yellow

Write-Host "`n3. Test the translation tool:"
Write-Host "   python translate.py --list-languages" -ForegroundColor Yellow
Write-Host "   python translate.py ..\index.html -t EN-US" -ForegroundColor Yellow

Write-Host "`n4. Deactivate when done:"
Write-Host "   deactivate" -ForegroundColor Yellow

Write-Host "`n🎯 Example batch translation:"
Write-Host "   python translate_batch.py ..\index.html --language-set basic" -ForegroundColor Green 