<?php

namespace App\Http\Controllers;

use App\Services\FirebaseMessagingService;
use Illuminate\Http\Request;

class FireBaseController extends Controller
{
    protected $firebaseMessagingService;

    public function __construct(FirebaseMessagingService $firebaseMessagingService)
    {
        $this->firebaseMessagingService = $firebaseMessagingService;
    }
    public  function  index()
    {

    }
}
