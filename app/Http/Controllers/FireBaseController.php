<?php

namespace App\Http\Controllers;

use App\Services\FirebaseMessagingServiceMain;
use Illuminate\Http\Request;

class FireBaseController extends Controller
{
    protected $firebaseMessagingService;

    public function __construct(FirebaseMessagingServiceMain $firebaseMessagingService)
    {
        $this->firebaseMessagingService = $firebaseMessagingService;
    }
    public function detail($id, Request $request)
    {

//        $response = $this->firebaseMessagingService->sendNotification('Salom', 'Main', $id);

    }

}
