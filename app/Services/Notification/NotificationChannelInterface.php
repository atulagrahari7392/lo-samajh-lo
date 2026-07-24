<?php

namespace App\Services\Notification;

use App\Models\User;

interface NotificationChannelInterface
{
    /**
     * Send a notification to a user.
     * 
     * @param User $user The recipient
     * @param string $title Notification title
     * @param string $message Notification body
     * @param array $data Additional metadata
     * @return bool True on success
     */
    public function send(User $user, string $title, string $message, array $data = []): bool;

    /**
     * Get the channel name (e.g., 'email', 'sms').
     */
    public function getName(): string;
}
