<?php

namespace App\Services;

use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Exception\MessagingException;

class FirebaseMessagingServiceMain
{
    protected $messaging;

    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    public function sendNotification(string $title, string $body, array $deviceTokens): array
    {
        // Create a CloudMessage
        $message = CloudMessage::withTarget('token', $deviceTokens)
            ->withNotification(Notification::create($title, $body));

        try {
            // Send the message
            $this->messaging->send($message);
            return ['success' => true, 'message' => 'Notification sent successfully.'];
        } catch (MessagingException $e) {
            // Handle exceptions
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
