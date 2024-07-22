<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

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
}
