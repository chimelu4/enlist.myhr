<?php

namespace App\Http\Controllers;

use App\Models\accounttype;
use App\Models\allcv;
use App\Models\application;
use App\Models\jobpost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function index()
    {
        return view('user.auth.login');
    }
      
    public function mycompany()
    {
        $data = User::find(Auth::user()->id);
        return view("user.profile.mycompany",compact('data'));
    }
    
    public function myhires()
    {
        $hires = jobpost::where('company_id',Auth::user()->id)->join('applications', 'jobposts.id', '=', 'applications.jobpost_id')->where('applications.status','=',1)
        ->join('users','applications.candidate_id','=','users.id')
        ->get(['jobposts.*', 'applications.status','users.fullname','users.phone','users.email']);

        
        return view('user.profile.all-company-hires',compact('hires'));
    }

    public function updateCompany(Request $request)
    {
        $cname = $request->input('cname');
        $c_address = $request->input('caddr');
        $office_line = $request->input('oline');
        $current_position = $request->input('cposition');
        
        if($cname ==""){
            return "Enter Company name ";
        }else  if($c_address ==""){
            return "Enter Company address";
        }else  if($office_line==""){
            return "Enter Office Line";
        }else  if($current_position==""){
            return "Enter Current Position";
        }else{
            $user = User::find($request->input('id'));
            $user->company = $cname;
            $user->company_addr = $cname;
            $user->company_phone = $office_line;
            $user->company_position = $current_position;
            if($user->save()){
                notifyUser("You have updated your company details","Enlist",Auth::user()->bid);
                notifyAdmin(Auth::user()->fullname.", has updated company information","Enlist");
                return 1;
              
            }else{
                return 0;
            }
        }
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
        if(Auth::guard('web')->attempt(
            $req->only(['email', 'password'])
        ))
        {
            return redirect()->intended(route('user.dashboard'));
        }

        return redirect()
            ->back()
            ->with('status', 'Invalid Credentials');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('user.login');
    }

    public function about(){
        
        $data = User::find(Auth::user()->id);
        return view('user.profile.about',compact('data'));
    } 
    
    public function cv(){
        
        $data = User::find(Auth::user()->id);
        $cv = allcv::where('candidate_id',Auth::user()->id)->first();
        return view('user.profile.cv',compact('data','cv'));
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


    public function updateProfile(Request $request)
    {
        if($request->input('fname')==""){
            echo "Enter full name";
        }else if($request->input('uname')==""){
            echo "Enter username";
        }else if($request->input('email')==""){
            echo "Enter email";
        }else if($request->input('phone')==""){
            echo "Enter phone";
        }else if($request->input('gender')==""){
            echo "Select gender type";
        }else if($request->input('addr')==""){
            echo "Enter address";
        }else{
            $id = $request->input('id');
            $user = User::find($id);
            $bid = $user->bid;
            $oldPassport = $user->passport;

        DB::beginTransaction();
        try{
      if($request->file('photo') !=''){
        $passportpics = checkImage($request->file('photo'),$oldPassport,"/userphotofolder",$bid); 
             
                    $user->fullname = $request->input('fname');
                    $user->username = $request->input('uname');
                    $user->email = $request->input('email');
                    $user->phone = $request->input('phone');
                    $user->gender = $request->input('gender');
                    $user->address = $request->input('addr');
                    $user->passport =  $passportpics;
                    if($user->save()){ 
                        //report_it("Updated a user" .$user->fullname);
                        DB::commit();
                       return "1";
                    }
            } else{
                           
                            $user->fullname = $request->input('fname');
                            $user->username = $request->input('uname');
                            $user->email = $request->input('email');
                            $user->phone = $request->input('phone');
                            $user->gender = $request->input('gender');
                            $user->address = $request->input('addr');
                            if($user->save()){ 
                                //report_it("Updated a user" .$user->fullname);
                                DB::commit();
                               return "1";
                            }
                    }}catch(\Exception $e){
                DB::rollback();
                return $e->getMessage();

            }
            

        
    
    }
    }

 
    public function passwordchange(Request $request)
    {
        

    $validator = Validator::make($request->all(), [
            'oldp' => 'required',
            'newp' => 'required|min:8|different:oldp',
            'cnewp' => 'required|in:'.$request->input('newp'),],
            [   
                'oldp.required'    => 'Please provide your old password.',
                'newp.required'  => 'Enter new Password.',
                'newp.min'  => 'New Password Length Should Be More Than 8 Character Or Digit Or Mix.',
                'newp.different'  => 'Sorry, new password must be different from old.',
                'cnewp.required'     => 'Confirm password cannot be empty.',
                'cnewp.in'     => 'Confirm password do not match.',
            ]);
        
        if($validator->fails()) {
        
            echo $validator->errors()->first();
        }else{
$user = User::find(Auth::user()->id);
            if (Hash::check($request->input('oldp'), $user->password)) { 
                $user->fill([
                 'password' => Hash::make($request->input('newp'))
                 ])->save();

                 echo "1";
             
        }else{
            echo "Old password incorrect";
        }
    }
}



}