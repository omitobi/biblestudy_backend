<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Group $group)
    {
        return $group->messages()->with('user')->get();
    }
}
