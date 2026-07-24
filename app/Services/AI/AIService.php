<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\App;

/**
 * AI Service Factory
 *
 * Resolves the correct AI provider based on the AI_PROVIDER environment variable.
 * Provides a unified interface so the rest of the codebase never needs to know
 * which AI provider is currently active.
 *
 * To add a new provider (e.g., Anthropic Claude):
 *   1. Create AnthropicProvider.php implementing AIProviderInterface
 *   2. Add it to the $providers map below
 *   3. Set AI_PROVIDER=anthropic in .env
 */
class AIService
{
    private AIProviderInterface $provider;

    /**
     * Map of provider names to their concrete classes.
     */
    private array $providers = [
        'openai' => OpenAIProvider::class,
        'gemini' => GeminiProvider::class,
    ];

    public function __construct()
    {
        $this->provider = $this->resolveProvider();
    }

    /**
     * Resolve the AI provider from config.
     */
    private function resolveProvider(): AIProviderInterface
    {
        $providerName = config('lsl.ai.provider', 'openai');

        if (!isset($this->providers[$providerName])) {
            throw new \InvalidArgumentException("Unsupported AI provider: [{$providerName}]. Supported: " . implode(', ', array_keys($this->providers)));
        }

        return App::make($this->providers[$providerName]);
    }

    /**
     * Get the active provider name for logging/display.
     */
    public function getActiveProvider(): string
    {
        return $this->provider->getProviderName();
    }

    // ─── Proxy all interface methods to the resolved provider ─────────────────

    public function chat(array $messages, array $options = []): string
    {
        return $this->provider->chat($messages, $options);
    }

    public function solveDoubt(string $question, ?string $imageUrl = null, string $language = 'en'): array
    {
        return $this->provider->solveDoubt($question, $imageUrl, $language);
    }

    public function generateStudyPlan(array $params): array
    {
        return $this->provider->generateStudyPlan($params);
    }

    public function analyzePerformance(array $performanceData): array
    {
        return $this->provider->analyzePerformance($performanceData);
    }

    public function generateQuiz(string $topic, int $count = 10, string $difficulty = 'medium', string $language = 'en'): array
    {
        return $this->provider->generateQuiz($topic, $count, $difficulty, $language);
    }

    public function explainQuestion(string $questionText, string $correctAnswer, string $language = 'en'): string
    {
        return $this->provider->explainQuestion($questionText, $correctAnswer, $language);
    }

    public function generateNotes(string $topic, string $subject, string $language = 'en'): string
    {
        return $this->provider->generateNotes($topic, $subject, $language);
    }
}
