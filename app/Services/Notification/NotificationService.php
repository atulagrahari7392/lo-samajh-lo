<?php

namespace App\Services\Notification;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    protected array $channels = [];

    public function __construct(iterable $channels)
    {
        foreach ($channels as $channel) {
            if ($channel instanceof NotificationChannelInterface) {
                $this->channels[$channel->getName()] = $channel;
            }
        }
    }

    public function send(User $user, string $title, string $message, array $data = [], array $via = ['database']): void
    {
        // Always save to database if requested
        if (in_array('database', $via)) {
            \App\Models\Notification::create([
                'user_id' => $user->id,
                'type' => $data['type'] ?? 'system',
                'title' => $title,
                'message' => $message,
                'data' => $data
            ]);
        }

        // Dispatch to other channels
        foreach ($via as $channelName) {
            if ($channelName === 'database') continue;
            
            if (isset($this->channels[$channelName])) {
                try {
                    $this->channels[$channelName]->send($user, $title, $message, $data);
                } catch (\Exception $e) {
                    Log::error("Failed to send notification via {$channelName} to User {$user->id}: " . $e->getMessage());
                }
            }
        }
    }
}
