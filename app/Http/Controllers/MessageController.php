<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Group $group)
    {
        $messages = $group->messages()->with('user')->get();

        return view('message', compact('messages'));
    }

    public function send(Request $request)
    {
        $user = $request->user();
        $user->messages()->create($request->only(['group_id', 'body']));

        return back()->with('status', 'message sent successfully!');
    }
}
