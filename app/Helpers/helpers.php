<?php
namespace App\Helpers;

use App\Models\SmsCode;
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
            $randomNumber = mt_rand(10000, 99999);
            $exists = UserWallet::where('wallet_id', $randomNumber)->exists();

        } while ($exists);

        return $randomNumber;
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

    public static function makeMessageProblem($problem): string
    {
        $equipment = empty($problem->equipment) ? null : $problem->equipment;
        $prefix = "🔥Yangi xabar🔥";
        $type = 'Turi: ' . ($problem->equipment ? 'Jihoz muammosi' : 'Umumiy muammo');
        $client = 'Mijoz: ' . $problem->branch->user->name;
        $filial = 'Filial: ' . $problem->branch->name;
        $equipmentText = 'Jihozi: ' . ($equipment ? $equipment->name : '-');
        $messageText = 'Batafsil muammo: ' . $problem->problem;
        $call = "Bog'lanish uchun: " . $problem->branch->user->username;
        $adminLink = 'Adminda: ' . 'https://admin.homefixuz.com/home-problems/view?id=' . $problem->id;

        return "$prefix\n\n$type\n$client\n$filial\n$equipmentText\n$messageText\n\n$call\n$adminLink";
    }
}
