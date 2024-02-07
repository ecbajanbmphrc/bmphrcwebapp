<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\User;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
Use App\Models\Company;

use App\Http\Middleware\Guest;


use Session;
use Auth;


class LoginController extends Controller
{
    //

    // public function loq()
    // {
    //     return view('landing.login');
    // }

    public function registration()
    {
      return view('auth.registration');
    }

    protected function login_user(Request $request){


        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        ]);

        if(Auth::attempt($credentials))
        {

        $user_role = Auth::user()->user_type; 

        $check_active = Auth::user()->is_active;

        $user_check  = $request->user_check;

        switch ($user_check){

            case 1:

                if(($user_role == "Super Admin" ) && ($check_active == 1)){
                    // $user = User::where('email' , '=' , $request->email) ->first();

                        $users = DB::table('users')
                        ->join('companies' , 'users.company_id' , '=' , 'companies.id')
                        ->select('users.*', 'companies.name as company_name')
                        ->where('users.email', $request->email)
                        ->first();


                  //  $user_name = Auth::user()->first_name;

                  
    
                    Session::put('user', ['current_user_id' => $users->id , 'usernum' => $user_check , 'first_name' => $users->first_name , 'last_name' => $users->last_name , 'company' => $users->company_name, 'company_id' => $users->company_id]);
                
                    $fname = session('user')['first_name']; 

                    toast("Login success ! Welcome user {$fname}" ,'success');
                    
    
                    return redirect(route('superadmin.view.dashboard'));
                }else{
                    $email = $request->old('email');
                    $password = $request->old('password');
                    Auth::logout();
                    Alert::error('Login Failed' , 'Invalid user!');
                    return back()
                       ->withInput();
                }
            break;
            
            case 2:
          
                if(($user_role == "Payroll Head") && ($check_active == 1) ){
                    $users = DB::table('users')
                    ->join('companies' , 'users.company_id' , '=' , 'companies.id')
                    ->select('users.*', 'companies.name as company_name')
                    ->where('users.email', $request->email)
                    ->first();
    
    
                    //$request->session()->put('current_user_id', $user->id);
    
                    Session::put('user', ['current_user_id' => $users->id , 'usernum' => $user_check , 'first_name' => $users->first_name , 'last_name' => $users->last_name , 'company' => $users->company_name , 'company_id' => $users->company_id]);
    
                  
    
    
    
                    
                    $fname = session('user')['first_name']; 

                    toast("Login success ! Welcome user {$fname}" ,'success');
                    return redirect(route('payrollhead.view.dashboard'));
    
         
                 }else{
                    $email = $request->old('email');
                    $password = $request->old('password');
                    Auth::logout();
                    Alert::error('Login Failed' , 'Invalid user!');
                    return back()
                           ->withInput();
    
                
                }
            break;

            case 3:
          
                    if(($user_role == "Payroll Officer") && ($check_active == 1)){
                        $users = DB::table('users')
                        ->join('companies' , 'users.company_id' , '=' , 'companies.id')
                        ->select('users.*', 'companies.name as company_name')
                        ->where('users.email', $request->email)
                        ->first();
        
        
                        //$request->session()->put('current_user_id', $user->id);
        
                        Session::put('user', ['current_user_id' => $users->id , 'usernum' => $user_check , 'first_name' => $users->first_name , 'last_name' => $users->last_name , 'company' => $users->company_name , 'company_id' => $users->company_id]);
        
                      
        
        
        
                        
                        $fname = session('user')['first_name']; 

                        toast("Login success ! Welcome user {$fname}" ,'success');
                        return redirect(route('payrollofficer.view.dashboard'));
        
             
                     }else{
                        $email = $request->old('email');
                        $password = $request->old('password');
                        Auth::logout();
                        Alert::error('Login Failed' , 'Invalid user!');
                        return back()
                               ->withInput();
        
                    
                }
            break;

            case 4:
          
                        if(($user_role == "Account Supervisor") && ($check_active == 1) ){
                            $users = DB::table('users')
                                ->join('companies' , 'users.company_id' , '=' , 'companies.id')
                                ->select('users.*', 'companies.name as company_name')
                                ->where('users.email', $request->email)
                                ->first();
            
                           
            
            
                            //$request->session()->put('current_user_id', $user->id);
            
                            Session::put('user', ['current_user_id' => $users->id , 'usernum' => $user_check , 'first_name' => $users->first_name , 'last_name' => $users->last_name , 'company' => $users->company_name , 'company_id' => $users->company_id]);
            
                            $fname = session('user')['first_name']; 

                            toast("Login success ! Welcome user {$fname}" ,'success');
                           
                            return redirect(route('accountsupervisor.view.dashboard'));
            
                 
                         }else{
                            $email = $request->old('email');
                            $password = $request->old('password');
                            Auth::logout();
                            Alert::error('Login Failed' , 'Invalid user!');
                            return back()
                                   ->withInput();
            
                        
                }
            break;
            
            
            case 5:

                if(($user_role == "Treasury" ) && ($check_active == 1)){
                    

                        $users = DB::table('users')
                        ->join('companies' , 'users.company_id' , '=' , 'companies.id')
                        ->select('users.*', 'companies.name as company_name')
                        ->where('users.email', $request->email)
                        ->first();


                  //  $user_name = Auth::user()->first_name;

                  
    
                  Session::put('user', ['current_user_id' => $users->id , 'usernum' => $user_check , 'first_name' => $users->first_name , 'last_name' => $users->last_name , 'company' => $users->company_name , 'company_id' => $users->company_id]);
                    $fname = session('user')['first_name']; 

                    toast("Login success ! Welcome user {$fname}" ,'success');
                    
    
                    return redirect(route('treasury.view.dashboard'));
                }else{
                    $email = $request->old('email');
                    $password = $request->old('password');
                    Auth::logout();
                    Alert::error('Login Failed' , 'Invalid user!');
                    return back()
                       ->withInput();
                }
            break;


            case 6:
          
                if(($user_role == "Merchandiser") && ($check_active == 1)){

                    $users = DB::table('users')
                    ->join('companies' , 'users.company_id' , '=' , 'companies.id')
                    ->select('users.*', 'companies.name as company_name')
                    ->where('users.email', $request->email)
                    ->first();
    
    
                    //$request->session()->put('current_user_id', $user->id);
    
                    Session::put('user', ['current_user_id' => $users->id , 'usernum' => $user_check , 'first_name' => $users->first_name , 'last_name' => $users->last_name , 'company' => $users->company_name , 'company_id' => $users->company_id]);
    
                    
                    $fname = session('user')['first_name']; 

                    toast("Login success ! Welcome user {$fname}" ,'success');
                    return redirect(route('merchandiser.view.menu'));
    
         
                 }else{
                    $email = $request->old('email');
                    $password = $request->old('password');
                    Auth::logout();
                    Alert::error('Login Failed' , 'Invalid user!');
                    return back()
                           ->withInput();
    
                
                }
            break;

         }

        }else{
            Alert::error('Login Failed' , 'Invalid email or password!');
            return back()
                        ->withInput();
        }
    }
    
    public function logout(){


        if (Session::has('user')){
            
            $redirect_login = Session::get('user')['usernum'];
            Auth::logout();
            Session::flush();


            if($redirect_login == 1 ){
                return redirect(route('auth.superadmin'));
            }

            else if($redirect_login == 2 ){
                return redirect(route('auth.payrollhead'));
            }

            else if($redirect_login == 3 ){
                return redirect(route('auth.payrollofficer'));
            }

            else if($redirect_login == 4 ){
                return redirect(route('auth.accountsupervisor'));
            }

            else if($redirect_login == 5 ){
                return redirect(route('auth.treasury'));
            }  

            else if($redirect_login == 6 ){
                return redirect(route('auth.login'));
            }  
        }
        else{
                return back();    
        }
    }
   
   

        
    


}
