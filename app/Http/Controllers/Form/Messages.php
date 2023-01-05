<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\NewForm;
use App\Models\FormMessage;


class Messages extends Controller
{
    public function index(){
        $id_group = auth()->user()->id_group;
        $name_form = NewForm::where('id_group', $id_group)->get();
        return view('admin.form.message', ['name_form'=> $name_form ]);
    }

    public function individual($id){
        $id_group = auth()->user()->id_group;
        $form_group = NewForm::where('id_group', $id_group)->get();
        $name_form = NewForm::where('id_group', $id_group)->where('id', $id)->first();
        $form_message_data = FormMessage::where('id_form', $name_form->id)->get();
        $data_array = explode(',', $name_form->data);

        return view('admin.form.individual_messages', ['name_form'=>$form_group, 'form_indivual' => $name_form, 'message' => $form_message_data, 'data_array' => $data_array ]);
    }
}
