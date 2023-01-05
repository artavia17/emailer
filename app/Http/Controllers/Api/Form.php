<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormMessage;
use App\Models\NewForm;
use App\Models\Notify;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class Form extends Controller
{
    public function index($token, Request $request){
        $token_data = NewForm::where('token', $token)->first();
        $fiels = $token_data->data;
        $array = explode(",", $fiels);
        $cantidad_array = count($array) - 1;
        $error = [];
        $information = [];
        $id_group = $token_data->id_group;

        for($i = 0; $i < $cantidad_array; $i++){
            foreach($array as $value){
                $data = $request->$value;
                if(!$data && !in_array($value, $error) && $value){
                    array_push($error, $value);
                }else if(!count($error) && !in_array($data, $information)){
                    array_push($information, $data);
                }
            }
        }

        $view_error = collect($error)->map(function ($name) {
            return $name . ' is required';
        });


        $user = User::where('id_group', $id_group)->first();
        $user_id = $user->id;
        $user_token = User::where('id', $user_id)->first();
        $user_group = $user_token->id_group;

        if(count($error)){

            Notify::create([
                'id_user' => $user_id,
                'id_group' => $user_group,
                'title' => 'Form API error',
                'text' => 'There seems to be a conflict in the form API URL, check that the parameters are correct.',
                'type' => 'error',
                'view' => 'not'
            ]);



            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => 'Validation error',
                    'errors' => $view_error
                ]
            ])->setStatusCode(422);
        }else{

            Notify::create([
                'id_user' => $user_id,
                'id_group' => $user_group,
                'title' => 'New Email',
                'text' => 'A new message form has been sent',
                'type' => 'exito',
                'view' => 'not'
            ]);

            $data_string = implode(';', $information);
            FormMessage::create([
                'id_form' => $token_data->id,
                'token' => $token_data->token,
                'id_group' => $id_group,
                'data' => $data_string,
            ]);
            return response()->noContent()->setStatusCode(201);
        }
    }
}
