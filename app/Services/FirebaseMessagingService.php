<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FirebaseMessagingService
{
    protected $authConfig;

    public function __construct()
    {
        // Load the JSON file with service account details
        $authConfigString = file_get_contents(storage_path('app/public/homefixuz-firebase-adminsdk-xztht-68762cd29c.json'));
        $this->authConfig = json_decode($authConfigString);
    }

    // Method to create Base64Url encoding
    private function base64UrlEncode($text)
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($text));
    }

    public function getAccessToken()
    {
        // Header
        $header = json_encode(['typ' => 'JWT', 'alg' => 'RS256']);
        $base64UrlHeader = $this->base64UrlEncode($header);

        // Payload
        $time = time();
        $start = $time - 60;
        $end = $start + 3600;
        $payload = json_encode([
            "iss" => $this->authConfig->client_email,
            "scope" => "https://www.googleapis.com/auth/firebase.messaging",
            "aud" => "https://oauth2.googleapis.com/token",
            "exp" => $end,
            "iat" => $start,
        ]);
        $base64UrlPayload = $this->base64UrlEncode($payload);

        // Signature
        $secret = openssl_get_privatekey($this->authConfig->private_key);
        openssl_sign("$base64UrlHeader.$base64UrlPayload", $signature, $secret, OPENSSL_ALGO_SHA256);
        $base64UrlSignature = $this->base64UrlEncode($signature);

        // JWT
        $jwt = "$base64UrlHeader.$base64UrlPayload.$base64UrlSignature";

        // Send request to obtain access token
        $response = Http::asForm()->post("https://oauth2.googleapis.com/token", [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception("Failed to obtain access token: " . $response->body());
    }
}
