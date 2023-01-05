<?php

namespace App\Http\Controllers\Template\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MyprofileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function update_user(Request $request){


        if($request->avatar){

            $name_image = Str::random(70) . $request->file('avatar')->getClientOriginalName();
            Storage::disk('avatar')->put( $name_image , file_get_contents($request->file('avatar')->getPathName()) );
            $url_photo = Storage::disk('avatar')->url($name_image);;

            $user = auth()->id();
            User::where('id', $user)
                    ->update([
                        'name' => $request->fullName,
                        'about' => $request->about,
                        'company' => $request->company,
                        'job' => $request->job,
                        'country' => $request->country,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'photo_profile' => $url_photo,
            ]);

        }else{

            $user = auth()->id();

            User::where('id', $user)
                    ->update([
                        'name' => $request->fullName,
                        'about' => $request->about,
                        'company' => $request->company,
                        'job' => $request->job,
                        'country' => $request->country,
                        'address' => $request->address,
                        'phone' => $request->phone,
            ]);

        }

        

        return Redirect::back()->with('message_user', 'Updated successfully');


    }

    public function delete_image_profile(){
        $user = auth()->id();
        User::where('id', $user)
            ->update([
                'photo_profile' => null
        ]);
        return Redirect::back()->with('message', 'Delete successfully');
    }

    public function update_notify_email(Request $request){

        $user = auth()->id();

        User::where('id', $user)
                ->update([
                    'product_notifycation' => $request->new_product,
                    'promo_notifycation' => $request->new_promo,
                    'securiry_notifycation' => $request->segurity,
        ]);

        return Redirect::back()->with('message_notify', 'Updated successfully');

    }

    // Artavia17@gmail

    public function update_change_password(Request $request){

        $user = auth()->id();
        $user_get = User::where('id', $user)->first();

        // return $request->password;

    
        if(Hash::check($request->view_password, $user_get->password)){

            
            $validator =  request()->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            ]);

            User::where('id', $user)
                ->update([
                    'password' => Hash::make($request->password),
            ]);

            return Redirect::back()->with('message_password', 'Updated successfully');


        }else{
            
            return Redirect::back()->with('error', 'Password incorrectly');

        };


    }

}
