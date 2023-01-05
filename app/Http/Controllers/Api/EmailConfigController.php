<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Api\EmailMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\ApiEmail;
use App\Models\User;
use App\Models\Notify;

class EmailConfigController extends Controller
{
    public function index(Request $request, $token, $info){

        $validacion = Validator::make( $request->all(), [

            "email" => ["required", 'email:rfc,dns'],
            "subject" => ["required", 'string'],
            "content" => ["required", 'string'],

        ]);


        if($validacion->fails()){

            $error = collect( $validacion->errors())->map(function($items){
                return $items[0];
            });

            $user = ApiEmail::where('token', $token)->first();
            $user_id = $user->id;
            $user_token = User::where('id', $user_id)->first();
            $user_group = $user_token->id_group;

            Notify::create([
                'id_user' => $user_id,
                'id_group' => $user_group,
                'title' => 'Email API error',
                'text' => 'Apparently there is a conflict in the url of the Email Api, please verify that the parameters are correct.',
                'type' => 'error',
                'view' => 'not'
            ]);

            return response()->json([
                "error" =>[
                    "code" => 422,
                    "message" => "Validation error",
                    "errors" => $error,
                ]
            ])->setStatusCode(422);

        }


        

        $get_config = ApiEmail::where('token', $token)->first();
        config(['mail.mailers.smtp.transport' => $get_config->transport]);
        config(['mail.mailers.smtp.host' => $get_config->host]);
        config(['mail.mailers.smtp.port' => $get_config->port]);
        config(['mail.mailers.smtp.encryption' => $get_config->encryption]);
        config(['mail.mailers.smtp.username' => $get_config->username]);
        config(['mail.mailers.smtp.password' => $get_config->password]);
        config(['mail.from.address' => request()->email]);
        config(['mail.from.name' => request()->subject]);

        $sujeto = request()->subject;

        // Enviar el correo al destinatario

        if(!request()->header && !request()->footer){
            $header = ' ';
            $content = request()->content;
            $footer = ' ';
            $correo = new EmailMailable($header, $content, $footer, $sujeto);
            if($get_config->email){
                Mail::to($get_config->email)->send($correo);
            }else{
                $email_user = User::where('id', $get_config->id_user,)->first();
                Mail::to($email_user->email)->send($correo);
            }

        }else if(!request()->header){
            $header = ' ';
            $content = request()->content;
            $footer = request()->footer;
            $correo = new EmailMailable($header, $content, $footer, $sujeto);
            if($get_config->email){
                Mail::to($get_config->email)->send($correo);
            }else{
                $email_user = User::where('id', $get_config->id_user,)->first();
                Mail::to($email_user->email)->send($correo);
            }

        }else if(!request()->footer){
            $header = request()->header;
            $content = request()->content;
            $footer = ' ';
            $correo = new EmailMailable($header, $content, $footer, $sujeto);
            if($get_config->email){
                Mail::to($get_config->email)->send($correo);
            }else{
                $email_user = User::where('id', $get_config->id_user,)->first();
                Mail::to($email_user->email)->send($correo);
            }

        }else{
            $header = request()->header;
            $content = request()->content;
            $footer = request()->footer;
            $correo = new EmailMailable($header, $content, $footer, $sujeto);
            if($get_config->email){
                Mail::to($get_config->email)->send($correo);
            }else{
                $email_user = User::where('id', $get_config->id_user,)->first();
                Mail::to($email_user->email)->send($correo);
            }
        }

            $user = ApiEmail::where('token', $token)->first();
            $user_id = $user->id;
            $user_token = User::where('id', $user_id)->first();
            $user_group = $user_token->id_group;

            Notify::create([
                'id_user' => $user_id,
                'id_group' => $user_group,
                'title' => 'New Email',
                'text' => 'A new email has been sent',
                'type' => 'exito',
                'view' => 'not'
            ]);

        return response()->json([
            'data' => [
                'status' => 201,
                'message' => 'sent successfully'
            ]
        ])->setStatusCode(201);

    }

    public function email(Request $request, $token, $nuevo_correo, $info){

        $validacion = Validator::make( $request->all(), [

            "email" => ["required", 'email:rfc,dns'],
            "subject" => ["required", 'string'],
            "content" => ["required", 'string'],

        ]);


        if($validacion->fails()){

            $error = collect( $validacion->errors())->map(function($items){
                return $items[0];
            });


            $user = ApiEmail::where('token', $token)->first();
            $user_id = $user->id;
            $user_token = User::where('id', $user_id)->first();
            $user_group = $user_token->id_group;

            Notify::create([
                'id_user' => $user_id,
                'id_group' => $user_group,
                'title' => 'Email API error',
                'text' => 'Apparently there is a conflict in the url of the Email Api, please verify that the parameters are correct.',
                'type' => 'error',
                'view' => 'not'
            ]);

            return response()->json([
                "error" =>[
                    "code" => 422,
                    "message" => "Validation error",
                    "errors" => $error,
                ]
            ])->setStatusCode(422);

        }

        $sujeto = request()->subject;

        

        $get_config = ApiEmail::where('token', $token)->first();
        config(['mail.mailers.smtp.transport' => $get_config->transport]);
        config(['mail.mailers.smtp.host' => $get_config->host]);
        config(['mail.mailers.smtp.port' => $get_config->port]);
        config(['mail.mailers.smtp.encryption' => $get_config->encryption]);
        config(['mail.mailers.smtp.username' => $get_config->username]);
        config(['mail.mailers.smtp.password' => $get_config->password]);
        config(['mail.from.address' => request()->email]);
        config(['mail.from.name' => request()->subject]);

        // Enviar el correo al destinatario

        if(!request()->header && !request()->footer){
            $header = ' ';
            $content = request()->content;
            $footer = ' ';
            $correo = new EmailMailable($header, $content, $footer, $sujeto);
            Mail::to($nuevo_correo)->send($correo);

        }else if(!request()->header){
            $header = ' ';
            $content = request()->content;
            $footer = request()->footer;
            $correo = new EmailMailable($header, $content, $footer, $sujeto);
            Mail::to($nuevo_correo)->send($correo);

        }else if(!request()->footer){
            $header = request()->header;
            $content = request()->content;
            $footer = ' ';
            $correo = new EmailMailable($header, $content, $footer, $sujeto);
            Mail::to($nuevo_correo)->send($correo);

        }else{
            $header = request()->header;
            $content = request()->content;
            $footer = request()->footer;
            $correo = new EmailMailable($header, $content, $footer, $sujeto);
            Mail::to($nuevo_correo)->send($correo);
        }

            $user = ApiEmail::where('token', $token)->first();
            $user_id = $user->id;
            $user_token = User::where('id', $user_id)->first();
            $user_group = $user_token->id_group;

            Notify::create([
                'id_user' => $user_id,
                'id_group' => $user_group,
                'title' => 'New Email',
                'text' => 'A new email has been sent',
                'type' => 'exito',
                'view' => 'not'
            ]);

        return response()->json([
            'data' => [
                'status' => 201,
                'message' => 'sent successfully'
            ]
        ])->setStatusCode(201);

    }


}
