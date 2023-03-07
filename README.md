# ChatGPT PHP

[![Packagist Version](https://img.shields.io/packagist/v/sgraaf/chatgpt-php)](https://packagist.org/packages/sgraaf/chatgpt-php)
[![Packagist PHP Version](https://img.shields.io/packagist/dependency-v/sgraaf/chatgpt-php/php)](https://img.shields.io/packagist/dependency-v/sgraaf/chatgpt-php/php)
[![pre-commit.ci status](https://results.pre-commit.ci/badge/github/sgraaf/chatgpt-php/main.svg)](https://results.pre-commit.ci/latest/github/sgraaf/chatgpt-php/main)
[![Packagist License](https://img.shields.io/packagist/l/sgraaf/chatgpt-php)](./LICENSE)

A convenient PHP wrapper for the OpenAI ChatGPT API.

## Installation

You can install ChatGPT PHP via [Composer](https://getcomposer.org/):

```bash
composer require sgraaf/chatgpt-php
```

## Usage

### Start a conversation

```php
// initialize the client
$client = new ChatGPT\Client('YOUR_OPENAI_API_KEY');

// provide an instruction
$message = $client->chat('Who won the world series in 2020?');
var_dump($message);

// continue the conversation
$message = $client->chat('Where was it played?');
var_dump($message);
```

### Clear the conversation history

```php
// initialize the client
$client = new ChatGPT\Client('YOUR_OPENAI_API_KEY');

// provide an instruction
$message = $client->chat('Who won the world series in 2020?');
var_dump($message);

// clear the conversation history
$client->clear();
```
