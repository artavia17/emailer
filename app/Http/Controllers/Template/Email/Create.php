<?php

namespace App\Http\Controllers\Template\Email;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ApiEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class Create extends Controller
{

    public function index(){

        if(ApiEmail::where('id_user', auth()->id())->first()){
            $data_api_server = ApiEmail::where('id_user', auth()->id())->first();
            $transport = $data_api_server->transport;
            $host = $data_api_server->host;
            $port = $data_api_server->port;
            $encryption = $data_api_server->encryption;
            $username = $data_api_server->username;
            $password = $data_api_server->password;

            return view('admin/email/new', [
                'transport' => $transport,
                'host' => $host,
                'port' => $port,
                'encryption' => $encryption,
                'username' => $username,
                'password' => $password
            ]);
        }else{
            $transport = '';
            $host = '';
            $port = '';
            $encryption = '';
            $username = '';
            $password = '';

            return view('admin/email/new', [
                'transport' => $transport,
                'host' => $host,
                'port' => $port,
                'encryption' => $encryption,
                'username' => $username,
                'password' => $password
            ]);
            return view('admin/email/new');    
        }

    }

    public function api_smtp(Request $request){


        $validator = request()->validate([
            'transport' => ['required', 'string', 'max:4'],
            'host' => ['required', 'string'],
            'port' => ['required', 'max:4'],
            'encryption' => ['required', 'string', 'max:4'],
            'username' => ['required'],
            'password' => ['required'],
        ]);


        if(ApiEmail::where('id_user', auth()->id())->first()){
            $id_user = auth()->id();
            $transport = $request->transport;
            $host = $request->host;
            $port = $request->port;
            $encryption = $request->encryption;
            $username = $request->username;
            $password = $request->password;

            ApiEmail::where('id_user', auth()->id())->update([
                'transport' =>  $transport,
                'host' => $host,
                'port' => $port,
                'encryption' => $encryption,
                'username' => $username,
                'password' => $password,
            ]);
        }else{

            $id_user = auth()->id();
            $transport = $request->transport;
            $host = $request->host;
            $port = $request->port;
            $encryption = $request->encryption;
            $username = $request->username;
            $password = $request->password;
            $token = Str::random(70);

            ApiEmail::create([
                'id_user' => $id_user,
                'transport' =>  $transport,
                'host' => $host,
                'port' => $port,
                'encryption' => $encryption,
                'username' => $username,
                'password' => $password,
                'token' => $token
            ]);

            return Redirect::route('view_data_email')->with('message','Saved successfully');

        };

        return Redirect::back()->with('message','Saved successfully');

    }


    public function my_api(){

        if(ApiEmail::where('id_user', auth()->id())->first()){

            $token = ApiEmail::where('id_user', auth()->id())->first();

            return view('admin/email/template', [
                'token' => $token->token,
                'email' => $token->email,
            ]);
        }else{
            return Redirect::route('send_data_smtp')->with('message_error', 'To enter My Api you must first configure the SMTP');
        }
    }


    public function add_email(Request $request){

        $validator = request()->validate([
            'email' => ['required'],
        ]);

        $email = $request->email;
        ApiEmail::where('id_user', auth()->id())->update([
            'email' => $email,
        ]);

        return Redirect::back()->with('message', 'Saved successfully');

    }

}
