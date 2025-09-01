<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function checkUser($name,$password){
        $user=User::where("name",$name)->first();
        if($user&&Hash::check($password,$user->password)){
            return true;
        }
        return false;
    }

    public function getApi(Request $request){
        $check=$this->checkUser($request->name,$request->password);
        $task=Task::get();
        if($check){
            return response()->json($task);
        }
        return response()->json(["エラー"=>"そのアカウントは登録されていません"]);
    }
}
