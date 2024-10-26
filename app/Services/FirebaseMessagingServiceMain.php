<?php

namespace App\Services;

use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Factory;

class FirebaseMessagingServiceMain
{
    protected $messaging;

    public function __construct()
    {
        $this->messaging = (new Factory)
            ->withServiceAccount(storage_path('app/public/homefixuz-firebase-adminsdk-xztht-68762cd29c.json')) // Use storage_path
            ->createMessaging();
    }

    public function sendNotification(string $title, string $body, string $deviceTokens): array
    {
        // Create a CloudMessage for multiple device tokens
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

