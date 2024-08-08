<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use Response;
    public function sendQuestion(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->questions()->create(['question' => $request->input('question')]);

        return $this->success(['message' => 'Savolingiz qabul qilindi! Tez orada mutaxasislarimiz siz bilan bog\'lanishadi']);
    }
}
