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

### Initialize the client

```php
// initialize the client
$client = new ChatGPT\Client('YOUR_OPENAI_API_KEY');
```

#### Use a custom _system message_

```php
// initialize the client
$client = new ChatGPT\Client('YOUR_OPENAI_API_KEY', system_message: 'You are a helpful assistant that translates English to French.');
```

### Start a conversation

```php
// provide an instruction
$message = $client->chat('Who won the world series in 2020?');
var_dump($message);
// string(53) "The Los Angeles Dodgers won the World Series in 2020."

// continue the conversation
$message = $client->chat('Where was it played?');
var_dump($message);
// string(116) "The 2020 World Series was played in Arlington, Texas at the Globe Life Field, the home stadium of the Texas Rangers."
```

### View the conversation history

```php
var_dump($client->messages);
// array(5) {
//   [0]=>
//   array(2) {
//     ["role"]=>
//     string(6) "system"
//     ["content"]=>
//     string(28) "You are a helpful assistant."
//   }
//   [1]=>
//   array(2) {
//     ["role"]=>
//     string(4) "user"
//     ["content"]=>
//     string(33) "Who won the world series in 2020?"
//   }
//   [2]=>
//   array(2) {
//     ["role"]=>
//     string(9) "assistant"
//     ["content"]=>
//     string(53) "The Los Angeles Dodgers won the World Series in 2020."
//   }
//   [3]=>
//   array(2) {
//     ["role"]=>
//     string(4) "user"
//     ["content"]=>
//     string(20) "Where was it played?"
//   }
//   [4]=>
//   array(2) {
//     ["role"]=>
//     string(9) "assistant"
//     ["content"]=>
//     string(116) "The 2020 World Series was played in Arlington, Texas at the Globe Life Field, the home stadium of the Texas Rangers."
//   }
// }
```

### Clear the conversation history

```php
// clear the conversation history
$client->clear();

var_dump($client->messages);
// array(1) {
//   [0]=>
//   array(2) {
//     ["role"]=>
//     string(6) "system"
//     ["content"]=>
//     string(28) "You are a helpful assistant."
//   }
// }
```
