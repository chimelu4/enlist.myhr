<?php

namespace App\Http\Controllers;

use App\Models\accounttype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function index()
    {
        return view('user.auth.login');
    }
    
    public function home()
    {
        return view('user.dashboard');
    } 
    
    public function forgot()
    {
        return view('user.auth.forgotpassword');
    }

    public function login()
    {
        return view('user.auth.login');
    }
     public function register($type)
    {
        $checkInput = accounttype::where('name',$type)->get();
        if($checkInput->count()>0){
             return view('user.auth.register',compact('type'));
        }else{
            return redirect()->route('index');
        }
       
    }

    public function handleLogin(Request $req)
    {
        if(Auth::attempt(
            $req->only(['email', 'password'])
        ))
        {
            return redirect()->intended(route('user.dashboard'));
        }

        return redirect()
            ->back()
            ->with('status', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()
            ->route('user.login');
    }


    public function registerUser(Request $request){

        $email = $request->input('email');
        $un = $request->input('un');
        $fname = $request->input('fname');
        $gender = $request->input('gender');
        $type = $request->input('type');
        $password = $request->input('password');
        $cpassword = $request->input('cpassword');
    
        if($fname == ""){
            $response = "Please enter your fullname ";
        }else if($email ==""){
            $response = "Email cannot be empty ";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $response = "Please enter a valid email address ";
        }else if( User::where('email',$email)->first()??0>0){
            $response = "There is already a user with this email address ";
        }else if($un =="" ){
            $response = "Select a username ";
        }else if($un !="" && User::where('username',$un)->first()??0>0){
            $response = "Sorry username already taken";
        }else if($gender ==""){
            $response = "Select Gender";
        }else if(strlen($password)<8){
            $response = "Passwords must be 8 or more characters in length";
        }else if($cpassword != $password){
            return "Passwords do not match";
        }else if($type == ""){
            $response = "Select account type";
        }else if($type != 1 && $type !=2){
            $response = "Invalid Type";
        }else{
            
            $bid = generateBid();
            DB::beginTransaction();
            try{
                $user = new User();
                $user->bid = $bid;
                $user->fullname = $fname;
                $user->username = $un;
                if(!is_numeric($email)){
                    $user->email = $email;
                }else{
                    $user->phone = $email;
                }         
               $user->password = Hash::make($password);//default password for user to reset
                $user->gender = $gender;
                $user->account_type = $type;
                $user->save();
                DB::commit();
                
                if(Auth::attempt(
                    $request->only(['email', 'password'])
                ))
                {
                    return redirect()->intended(route('user.dashboard'));
                }
        }catch(\Exception $e){
           $response = $e->getMessage();
            DB::rollback();
        }
    }

    return redirect()->back()->withInput($request->input())
    ->with('status',$response);
    }

}