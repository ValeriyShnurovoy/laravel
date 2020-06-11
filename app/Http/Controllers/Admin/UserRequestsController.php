<?php

namespace App\Http\Controllers\Admin;

use App\UserRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRequests = UserRequests::paginate(25);

        return view('admin/userRequests', ['userRequests' => $userRequests]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userRequset = UserRequests::find($request->id);

        if ($userRequset !== null) {
            $userRequset->user_request_statuses_id = $request->status;
            $userRequset->save();
        }
    }
}
