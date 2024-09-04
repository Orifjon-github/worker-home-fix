<?php

use App\Models\Client;

$payme = Client::where('name', 'payme')->first();
return [
    'min_amount' => $payme->min_amount,
    'max_amount' => $payme->max_amount,
    'identity' => $payme->identity,
    'login' => $payme->login,
    'key' => $payme->password,
    'merchant_id' => $payme->merchant_id,
    'allowed_ips' => [
        '185.234.113.1',
        '185.234.113.2',
        '185.234.113.3',
        '185.234.113.4',
        '185.234.113.5',
        '185.234.113.6',
        '185.234.113.7',
        '185.234.113.8',
        '185.234.113.9',
        '185.234.113.10',
        '185.234.113.11',
        '185.234.113.12',
        '185.234.113.13',
        '185.234.113.14',
        '185.234.113.15',
    ]
];
