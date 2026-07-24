<?php

namespace App\Services\AI;

interface AIProviderInterface
{
    /**
     * Send a chat message to the AI tutor and receive a response.
     *
     * @param  array  $messages  Array of ['role' => 'user'|'assistant', 'content' => '...']
     * @param  array  $options   Optional overrides (temperature, max_tokens, subject, language)
     * @return string
     */
    public function chat(array $messages, array $options = []): string;

    /**
     * Solve a doubt given a question text and optional image URL.
     *
     * @param  string       $question
     * @param  string|null  $imageUrl  Base64 or public URL of question image
     * @param  string       $language  'en' | 'hi'
     * @return array  ['solution' => '...', 'steps' => [...], 'concepts' => [...]]
     */
    public function solveDoubt(string $question, ?string $imageUrl = null, string $language = 'en'): array;

    /**
     * Generate a personalized study plan.
     *
     * @param  array  $params  [exam_target, exam_date, daily_hours, current_level, weak_subjects]
     * @return array  Structured plan with weekly schedule
     */
    public function generateStudyPlan(array $params): array;

    /**
     * Analyze student performance and return coaching insights.
     *
     * @param  array  $performanceData  [attempts, scores, subjects, topics, accuracy, speed]
     * @return array  [weak_topics, strong_topics, recommendations, predicted_score, study_hours]
     */
    public function analyzePerformance(array $performanceData): array;

    /**
     * Generate quiz questions for a given topic.
     *
     * @param  string  $topic
     * @param  int     $count
     * @param  string  $difficulty  'easy'|'medium'|'hard'
     * @param  string  $language    'en'|'hi'|'both'
     * @return array  Array of question objects
     */
    public function generateQuiz(string $topic, int $count = 10, string $difficulty = 'medium', string $language = 'en'): array;

    /**
     * Explain a specific question in detail.
     *
     * @param  string  $questionText
     * @param  string  $correctAnswer
     * @param  string  $language
     * @return string
     */
    public function explainQuestion(string $questionText, string $correctAnswer, string $language = 'en'): string;

    /**
     * Generate AI notes for a given topic.
     *
     * @param  string  $topic
     * @param  string  $subject
     * @param  string  $language
     * @return string  Markdown formatted notes
     */
    public function generateNotes(string $topic, string $subject, string $language = 'en'): string;

    /**
     * Get the provider name identifier.
     */
    public function getProviderName(): string;
}
