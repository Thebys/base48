#!/usr/bin/env python3
"""
Setup script for HTML Translation Tool

This script sets up a Python virtual environment and installs
the required dependencies for the DeepL HTML translation tool.
"""

import os
import sys
import subprocess
import platform
from pathlib import Path

def run_command(command, description):
    """Run a shell command and handle errors."""
    print(f"🔄 {description}...")
    try:
        if platform.system() == "Windows":
            result = subprocess.run(command, shell=True, check=True, capture_output=True, text=True)
        else:
            result = subprocess.run(command.split(), check=True, capture_output=True, text=True)
        print(f"✅ {description} completed successfully!")
        return True
    except subprocess.CalledProcessError as e:
        print(f"❌ Error during {description}:")
        print(f"Command: {command}")
        print(f"Error: {e.stderr}")
        return False

def main():
    """Main setup function."""
    print("🚀 Setting up HTML Translation Tool with DeepL API")
    print("=" * 50)
    
    # Get current directory
    current_dir = Path(__file__).parent
    venv_dir = current_dir / "venv"
    
    # Check if Python 3 is available
    try:
        result = subprocess.run([sys.executable, "--version"], capture_output=True, text=True)
        python_version = result.stdout.strip()
        print(f"📍 Using Python: {python_version}")
    except Exception as e:
        print(f"❌ Error checking Python version: {e}")
        sys.exit(1)
    
    # Create virtual environment
    print(f"\n📁 Creating virtual environment in: {venv_dir}")
    if not run_command(f"{sys.executable} -m venv {venv_dir}", "Creating virtual environment"):
        sys.exit(1)
    
    # Determine activation script path
    if platform.system() == "Windows":
        activate_script = venv_dir / "Scripts" / "activate.bat"
        pip_path = venv_dir / "Scripts" / "pip.exe"
        python_path = venv_dir / "Scripts" / "python.exe"
    else:
        activate_script = venv_dir / "bin" / "activate"
        pip_path = venv_dir / "bin" / "pip"
        python_path = venv_dir / "bin" / "python"
    
    # Install requirements
    requirements_file = current_dir / "requirements.txt"
    if requirements_file.exists():
        print(f"\n📦 Installing dependencies from {requirements_file}")
        if not run_command(f"{pip_path} install -r {requirements_file}", "Installing dependencies"):
            sys.exit(1)
    else:
        print(f"⚠️  Warning: requirements.txt not found at {requirements_file}")
    
    # Create .env file if it doesn't exist
    env_file = current_dir / ".env"
    env_example = current_dir / ".env.example"
    
    if not env_file.exists() and env_example.exists():
        print(f"\n📝 Creating .env file from example...")
        with open(env_example, 'r') as f:
            content = f.read()
        with open(env_file, 'w') as f:
            f.write(content)
        print(f"✅ Created {env_file}")
        print("⚠️  Remember to edit .env and add your DeepL API key!")
    
    print("\n" + "=" * 50)
    print("✅ Setup completed successfully!")
    print("\n📋 Next steps:")
    print("1. Edit the .env file and add your DeepL API key")
    print("   Get your API key from: https://www.deepl.com/pro-api")
    print("\n2. Activate the virtual environment:")
    
    if platform.system() == "Windows":
        print(f"   {activate_script}")
    else:
        print(f"   source {activate_script}")
    
    print("\n3. Test the translation tool:")
    print(f"   {python_path} translate.py --list-languages")
    print(f"   {python_path} translate.py ../index.html -t EN-US")
    
    print("\n4. Deactivate when done:")
    print("   deactivate")

if __name__ == "__main__":
    main() 