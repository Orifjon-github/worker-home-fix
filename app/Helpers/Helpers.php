<?php

namespace App\Helpers;

use App\Models\SmsCode;
use App\Models\UserWallet;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

trait Helpers
{
    public function getValue($model, $attribute='title') {
        $language = App::getLocale();
        $mainAttr = $attribute;
        switch ($language) {
            case 'ru':
                $attribute .= '_ru';
                return $model->$attribute ?? $model->$mainAttr;
            case 'en':
                $attribute .= '_en';
                return $model->$attribute ?? $model->$mainAttr;
            default:
                return $model->$attribute;
        }
    }

    public static function generateWalletId(): string
    {
        do {
            $datePrefix = date('ymd');

            $randomNumber = mt_rand(1000, 9999);

            $uniqueId = '1' . $datePrefix . $randomNumber;

            $exists = UserWallet::where('wallet_id', $uniqueId)->exists();

        } while ($exists);

        return $uniqueId;
    }

    public function checkPhone($phone): bool|string
    {
        $phone = str_replace([' ', '-', '+', '(', ')'], '', $phone);
        if (strlen($phone) == 9 || strlen($phone) == 12) {
            return strlen($phone) == 9 ? '998' . $phone : $phone;
        }
        return false;
    }

    public function checkCode($user, $code): bool|JsonResponse
    {
        $record = $user->sms_code()->where('code', $code)->first() ?? null;
        if ($record && $record->exists()) {
            $recordUpdatedAt = Carbon::parse($record->updated_at)->timezone(config('app.timezone'));
            Log::error($recordUpdatedAt);
            Log::error(Carbon::now()->subMinute(2));
            if ($recordUpdatedAt > Carbon::now()->subMinute(2)) {
                return true;
            }
            return $this->error('Sms code expired');
        }
        return $this->error('Invalid Sms Code');
    }
}
