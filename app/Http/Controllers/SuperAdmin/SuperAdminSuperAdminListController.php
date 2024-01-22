<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

use DB;

class SuperAdminSuperAdminListController extends Controller
{
    public function getUpdateData(Request $request)
    {
        $id = $request->id;
        
        $user = User::where('id', '=', $id)
        ->select('id' ,'first_name', 'last_name', 'email', 'contact_number')
        ->first();
        if ($user) {
            // Data found for the given ID
            return response()->json($user);
        } else {
            // Data not found
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function getViewData(Request $request)
    {

        
        $user = User::where('id', '=', $request->id)
        ->select('id' ,'first_name', 'last_name', 'email', 'contact_number')
        ->first();

        if ($user) {
            // Data found for the given ID
            return response()->json($user);
        } else {
            // Data not found
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function fetchData(Request $request)
    {
     
        $userType = $request->input('user_type', 'Super Admin');


        $data = User::where('user_type', $userType)->get();


        $data = $data->map(function ($item, $key) {
            $item['#'] = $key + 1;


            $item['active'] = '<a href="#" class="clickable" data-id="' . $item['id'] . '"><img src="' . ($item['is_active'] == 1 ? '/asset/img/button_img/active-48.png' : '/asset/img/button_img/inactive-48.png') . '" alt="' . ($item['is_active'] == 1 ? 'Active' : 'Inactive') . '"></a>';


            $item['actions'] = '<img src= "/asset/img/button_img/eye-blue-32.png" alt="Button 1" class="button-image1" style="height: 25px; width: 25px;"> <img src="/asset/img/button_img/pen-green-32.png" alt="Button 2" class="button-image2" style="height: 25px; width: 25px;">';

            
            return $item;
        });

        return response()->json(['data' => $data]);
    }

    public function getDataById(Request $request)
    {

    $id = $request->input('id');
    $data = User::find($id);

    return response()->json(['data' => $data]);
    }

    public function updateActiveStatus(Request $request)
    {
        $id = $request->input('id');
        $newStatus = $request->input('newStatus');

        // Update the 'is_active' status in the database
        User::where('id', $id)->update(['is_active' => $newStatus]);

        return response()->json(['success' => true]);
    }


    public function saveAccount(Request $request)
    {
            //  dd($request->all());
            $usertype = "Super Admin";
            $company = 1;
            $zero = "0";
            

            $validator = Validator::make($request->all(), [
                'c_email' => 'required|unique:users,email|max:255',
                'c_password' => ['required',Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()
                            ->uncompromised()], 
                'c_confirmPassword' => 'same:c_password',
        
            ],[
                'c_email.required' => 'The email field is required.',
                'c_email.unique' => 'The email address has already been taken. Please choose a different one.',
                'c_email.max' => 'The email address must not exceed 255 characters.',
                'c_password.required' => 'The password field is required.',
        
                'c_confirmPassword.same' => 'Password does not match!',
                // Add more custom messages as needed
            ]);
            $c_email = $request->old('c_email');
            $c_password = $request->old('c_password');
        


            if ($validator->fails()) {
               // Alert::error('Registration Failed');
                return redirect('/superadmin/superadmin')
               
                            ->withErrors($validator)
                            ->withInput()
                            ->with("create-failed", "Account failed to create");
            }else{

              
                
                $user = new User;
                $user->first_name = $request->input('c_first_name');
                $user->last_name = $request->input('c_last_name');
                $user->contact_number = $request->input('c_number');
                $user->email = $request->input('c_email');
                $user->password = Hash::make($request->input('c_password'));
                $user->company_id = $company;
                $user->user_type = $usertype;
                $user->is_active = 1;
                $user->save();
            
           
                //return view('auth.login', compact('Auth.login'));
                //return redirect('registration');
                return redirect(('/superadmin/superadmin/list'))->with('create-success', "Account registered successfully");
                //return redirect(route('auth.registration'))->withToastSuccess('Task Created Successfully!');
               
            }
          

           
    }


    public function updateAccount(Request $request)
    {
            //  dd($request->all());
        

            $id = $request->input('selectedId');
    
            

            $validator = Validator::make($request->all(), [
                'e_email' =>  'max:255|required|email|unique:users,email,'.$id,
        
            ],[
                'e_email.required' => 'The email field is required.',
                'e_email.unique' => 'The email address has already been taken. Please choose a different one.',
                'e_email.max' => 'The email address must not exceed 255 characters.',
           
               
            ]);
            $e_email = $request->old('e_email');
        


            if ($validator->fails()) {
               // Alert::error('Registration Failed');
                return redirect('/superadmin/superadmin')
               
                            ->withErrors($validator)
                            ->withInput()
                            ->with("update-failed", "Account registered successfully");
            }else{

              
                
                $user = User::find($id);
                $user->first_name = $request->input('e_first_name');
                $user->last_name = $request->input('e_last_name');
                $user->contact_number = $request->input('e_number');
                $user->email = $request->input('e_email');
                $user->update();
            
        
                return redirect(('/superadmin/superadmin'))->with('update-success', "Account updated successfully");
           
               
            }
          

           
    }
}
