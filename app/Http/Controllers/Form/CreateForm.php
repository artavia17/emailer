<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewForm;
use App\Models\User;
use Illuminate\Support\Str;

class CreateForm extends Controller
{
    public function index(){
        return view('admin.form.create');
    }


    public function send_data(Request $request){

        $array = rtrim($request->array_data, ",");
        $name = $request->name_form;
        $id_user = auth()->id();
        $user = User::where('id', $id_user)->first();
        $user_group = $user->id_group;

        $new_form = NewForm::create([
            'id_group' => $user_group,
            'name' => $name,
            'data' => $array,
            'token' => Str::random(70),
        ]);

        return redirect()->route('form_indivudual', ['id' => $new_form->id]);

    }
}
