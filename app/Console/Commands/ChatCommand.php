<?php

namespace App\Console\Commands;

use App\Services\OpenRouterService;
use Illuminate\Console\Command;
use function Laravel\Prompts\spin;
use function Laravel\Prompts\text;

class ChatCommand extends Command
{
    protected $signature = 'chat';
    protected $description = 'Chat with AI via OpenRouter';

    public function __construct(
        private OpenRouterService $ai
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $prompt = text('Ask something:', required: true);

        try {
            $response = spin(
                fn () => $this->ai->chat($prompt),
                'Thinking...'
            );

            $this->info("\nAI:");
            $this->line($response);

            return self::SUCCESS;

        } catch (\Throwable $e) {
            $this->error($e->getMessage());
            return self::FAILURE;
        }
    }
}
