<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrationController extends Controller
{
    public function registerUser(Request $request)
    {
            $usertype = "User";
            $zero = "0";
            

            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users|max:255',
                'password' => ['required',Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()
                            ->uncompromised()], 
                'confirmPassword' => 'same:password',
                'terms' => 'accepted',
            ]);
            $email = $request->old('email');
            $password = $request->old('password');


            if ($validator->fails()) {
                Alert::error('Registration Failed');
                return redirect('registration')
               
                            ->withErrors($validator)
                            ->withInput();
            }else{

              
                
                $user = new User;
                $user->first_name = $request->input('first_name');
                $user->last_name = $request->input('last_name');
                $user->contact_number = $request->input('number');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->user_type = $usertype;
                $user->save();
            
           
                //return view('auth.login', compact('Auth.login'));
                //return redirect('registration');
                return redirect(route('auth.registration'))->with("success", "Registration success, Login to access the app");
                //return redirect(route('auth.registration'))->withToastSuccess('Task Created Successfully!');
               
            }
          

           
        }
}
