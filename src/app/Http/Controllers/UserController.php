<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view("user_create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => ["regex:/^[a-zA-Z0-9]{6,15}$/", "required"],
            "password" => ["required", "regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!-\/:-@[-`{-~])[!-~]{8,}$/"]
        ], [
            "name" => "名前の入力方法が違います",
            "password" => "パスワードの入力方法が違います"
        ]);
        User::query()->create([
            "name" => $request->name,
            "password" => Hash::make($request->password)
        ]);
        return redirect(route("login"));
    }
}
