# 🤖⚡ Laravel AI CLI Chat (OpenRouter Powered)

<p align="center">
  <b>A lightweight, blazing-fast AI assistant inside your terminal</b><br>
  Built with Laravel + OpenRouter API — no UI, just pure productivity.
</p>

<p align="center">
  <a href="https://laravel.com">
    <img src="https://img.shields.io/badge/Laravel-12.x%20%7C%2013.x-red?logo=laravel&style=for-the-badge" />
  </a>
  <a href="https://www.php.net">
    <img src="https://img.shields.io/badge/PHP-8.4%2B-blue?logo=php&style=for-the-badge" />
  </a>
  <a href="LICENSE">
    <img src="https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge" />
  </a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Status-Active-success?style=flat-square" />
  <img src="https://img.shields.io/badge/CLI-Focused-black?style=flat-square" />
  <img src="https://img.shields.io/badge/AI-OpenRouter-purple?style=flat-square" />
</p>

---

### ✨ Why this exists

> Bring AI directly into your terminal — fast, minimal, and distraction-free.

Instead of switching tabs or using heavy interfaces, just type:

```bash
php artisan chat
```

---

## ✨ Features

* ⚡ CLI-based AI chat
* 🤖 Powered by OpenRouter (supports multiple models)
* ⏳ Built-in “Thinking...” spinner for better UX
* 🧼 Clean Laravel service-based architecture
* 🔐 Secure API key via `.env`
* 🧩 Easy to extend and customize

---

## 📦 Requirements

* PHP 8.4+
* Laravel 12 or 13
* OpenRouter API key

---

## 🚀 Installation

Clone your project:

```bash
git clone https://github.com/ehsanilahi77/laravel-agent.git
cd laravel-agent
```

Install dependencies:

```bash
composer install
```

---

## 🔑 Environment Setup

Add your OpenRouter credentials in `.env`:

```env
OPENAI_API_KEY=your-openrouter-api-key
OPENAI_URL=https://openrouter.ai/api/v1/chat/completions
OPENAI_MODEL=openai/gpt-oss-20b
```

---

## ⚙️ Configuration

Ensure your `config/services.php` includes:

```php
'openai' => [
    'key' => env('OPENAI_API_KEY'),
    'url' => env('OPENAI_URL', 'https://openrouter.ai/api/v1/chat/completions'),
    'model' => env('OPENAI_MODEL', 'openai/gpt-oss-20b'),
],
```

---

## 💬 Usage

Run the CLI chat command:

```bash
php artisan chat
```

Example interaction:

```
Ask something: What is Laravel?

Thinking...

AI:
Laravel is a PHP framework designed for building modern web applications...
```

---

## 🧠 How It Works

* User enters a prompt in CLI
* Command triggers OpenRouter API request
* Response is streamed internally (handled cleanly)
* Output is displayed after processing
* Spinner shows **“Thinking...”** during request

---

## 🏗️ Architecture

```
app/
 ├── Console/Commands/ChatCommand.php
 └── Services/OpenRouterService.php
```

### Flow

```
Command → Service → OpenRouter API → Response → CLI Output
```

Clean separation of concerns:

* Command = UI layer
* Service = API logic

---

## 🔧 Customization

### Change AI Model

```env
OPENAI_MODEL=anthropic/claude-3-sonnet
```

### Adjust token limit

In service:

```php
'max_tokens' => 200,
```

---

## 🧪 Example Models (OpenRouter)

* openai/gpt-oss-20b
* openai/gpt-oss-120b
* openai/gpt-4o-mini
* anthropic/claude-3-sonnet
* meta-llama/llama-3-70b
---

## 📄 License

MIT License — feel free to use and modify.

---
