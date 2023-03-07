<?php

namespace ChatGPT;

use OpenAI\Client as OpenAIClient;

class Client
{
    public const VERSION = '0.1.0';
    protected OpenAIClient $client;
    protected string $model;
    protected string $system_message;
    public array $messages = [];

    public function __construct(string $api_key, string $model = 'gpt-3.5-turbo', string $system_message = 'You are a helpful assistant.', string $organization = null)
    {
        // initialize the OpenAI API client
        $this->client = new OpenAIClient($api_key, $organization);

        // set the model
        $this->model = $model;

        // set the system message
        $this->system_message = $system_message;

        // initialize the conversation history
        $this->clear();
    }

    public function __destruct()
    {
        // close the OpenAI API client
        $this->client->__destruct();
    }

    public function chat(string $message): string
    {
        // add the user's message to the conversation history
        $this->messages[] = ['role' => 'user', 'content' => $message];

        // get the response from the OpenAI API
        $completion = $this->client->createChatCompletion($this->model, $this->messages);
        $message = $completion['choices'][0]['message']['content'];

        // add the assistant's message to the conversation history
        $this->messages[] = ['role' => 'assistant', 'content' => $message];

        return $message;
    }

    public function clear(): void
    {
        // clear the conversation history
        $this->messages = $this->system_message ? [['role' => 'system', 'content' => $this->system_message]] : [];
    }
}
