<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewForm;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class MyForm extends Controller
{
    public function index(){


        $id_user = auth()->id();
        $user = User::where('id', $id_user)->first();
        $user_group = $user->id_group;

        $get_form = NewForm::where('id_group', $user_group)->get();
        
        $cantidad = count($get_form);

        if($cantidad){
            return view('admin.form.view', ['data_name' => $get_form]);
        }else{
            return Redirect::route('create_form')->with('warning', 'You do not have any form registered');
        }
    }

    public function individual($id){


        $id_user = auth()->id();
        $user = User::where('id', $id_user)->first();
        $user_group = $user->id_group;

        $get_form = NewForm::where('id_group', $user_group)->get();

        $get_individual = NewForm::where('id', $id)
                                    ->where('id_group', $user_group)
                                    ->first();

        $data = $get_individual->data;
        $array_data = explode(",", $data);

        return view('admin.form.individual_form',['data_name' => $get_form, 'form_data' => $get_individual, 'data' => $array_data, 'id' => $id]);
    }


    public function delete_individual($id){

        NewForm::where('id', $id)->delete();

        return Redirect::route('my_form')->with('delete',  'Successfully removed');

    }

    public function individual_update(Request $request, $id){
        $array_data = $request->update_array;
        
        NewForm::where('id', $id)->update([
            'data' => $array_data,
        ]);

        return Redirect::back()->with('updated', 'Successfully updated');

    }

}
