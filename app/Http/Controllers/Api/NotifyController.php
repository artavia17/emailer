<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notify;
use App\Models\User;

class NotifyController extends Controller
{
    public function index(){

        $id_user = auth()->id();
        $user = User::where('id', $id_user)->first();
        $id_group = $user->id_group;

        // $notify = Notify::where('id_group', $id_group);
                        // ->where('view', 'not');
        $notify = Notify::where('id_group', $id_group)
                        ->where('view', 'not')
                        ->get();
        
        $notify_count = Notify::where('id_group', $id_group)
                        ->where('view', 'not')
                        ->count();

        return response()->json([
            'data' => [
                'status' => 200,
                'count' => $notify_count,
                'items' => $notify->map(function($items){
                    return [
                        'title' => $items->title,
                        'text' => $items->text,
                        'type' => $items->type,
                        'date' => $items->created_at
                    ];
                }),
            ]
        ])->setStatusCode(200);
    }


    public function clear_notify(){

        $id_user = auth()->id();

        $notify = Notify::where('id_user', $id_user)
                        ->where('view', 'not')
                        ->update([
                            'view' => 'yes'
                        ]);

        return response()->noContent()->setStatusCode(201);

    }

}
