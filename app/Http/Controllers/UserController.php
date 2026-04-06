<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function subscribe(Request $request, Subscribe $subscribe){
        $data = $request->validate([
            'email' => 'required|email|max:255|unique:subscribes,email',
        ]);
        if(!$data){
            return redirect()->route('home')->with('error', 'Не удалось подписаться на рассылку. Возможно вы уже подписаны!');
        }
        $subscribe->create($data);
        return redirect()->route('home')->with('success', 'Вы успешно подписались на рассылку');
    }
}
