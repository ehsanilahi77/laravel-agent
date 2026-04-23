<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenRouterService
{
    public function chat(string $prompt): string
    {
        $apiKey = config('services.openai.key');

        if (!$apiKey) {
            throw new \RuntimeException('API key is missing.');
        }

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'HTTP-Referer' => config('app.url', 'http://localhost'),
            'X-OpenRouter-Title' => config('app.name', 'Laravel App'),
        ])
            ->timeout(30)
            ->retry(3, 1000)
            ->post(
                config('services.openai.url', 'https://openrouter.ai/api/v1/chat/completions'),
                [
                    'model' => config('services.openai.model', 'openai/gpt-oss-20b'),
                    'temperature' => 0.7,
                    'max_tokens' => 200,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are a helpful assistant, always answer in short sentences.',
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt,
                        ],
                    ],
                ]
            )
            ->throw()
            ->json();

        $content = data_get($response, 'choices.0.message.content');

        if (!is_string($content) || trim($content) === '') {
            throw new \RuntimeException('Empty response from AI.');
        }

        return trim($content);
    }
}
