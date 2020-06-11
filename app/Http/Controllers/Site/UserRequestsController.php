<?php

namespace App\Http\Controllers\Site;

use App\UserRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRequestsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userRequest = new UserRequests();
        $userRequest->event_id = $request->event_id;
        $userRequest->user_name = $request->user_name;
        $userRequest->user_email = $request->user_email;
        $userRequest->save();
    }

}
