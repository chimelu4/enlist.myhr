<?php

namespace App\Http\Controllers;

use App\Models\accounttype;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Operator;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.index');
    }
     public function about()
    {
        return view('frontend.about');
    }
     public function service()
    {
        return view('frontend.services');
    } 
    public function pricing()
    {
        return view('frontend.pricing');
    } 
    public function contact()
    {
        return view('frontend.contact');
    }
    public function register()
    {
        $type = accounttype::all();
        return view('auth.register',compact('type'));
    }
   
    
    public function forgotPassword()
    {
        return view('auth.forgotpassword');
    }
    
    public function changePassword(Request $request)
    { 
          $id=$request->input('id');
     $password=$request->input('password');
     $question=$request->input('question');
    $answer=$request->input('answer');

        if($id == ""){
            echo "You must log in to change password";
        }else if($password == ""){
            echo "You must enter a valid password";
        }else if($question == ""){
            echo "You must select a question to answer";
        }else if($answer == ""){
            echo "You must answer at least one question";
        }else{


        $user = User::find($id);
        $user->password=Hash::make($password);
        $user->security_question=$question;
        $user->answer=$answer;
        if($user->save()){
            //report_it("Changed their password");
            echo 1;
        }else{
            echo "";
        }
    }
     } 
     
     
     public function resetPassword(Request $request)
    { 
          $un=$request->input('un');
     $password=$request->input('password');
     $question=$request->input('question');
    $answer=$request->input('answer');

        if($un == ""){
            echo "You must enter a phone number or username";
        }else if($password == ""){
            echo "You must enter a valid password";
        }else if($question == ""){
            echo "You must select a question to answer";
        }else if($answer == ""){
            echo "You must answer at least one question";
        }else{
DB::beginTransaction();

        $user = User::where('username',$un)->orWhere('phone',$un)->first();

       if(null !=$user){
      if($user->security_question == $question && $user->answer == $answer){
        $user->password=Hash::make($password);
        if($user->save()){
            //$report = new report();
 
            echo 1;
        }else{
            echo "Could not perform reset at the moment. Please notify Admin";

        }
      }else{
          echo "Your answer or question is incorrect.Check your input.";
      }
       }else{
           echo "User not found.";
       }
    }
     }
     public function restoreDelete($id, $table)
    {
         $model_name = "App"."\\"."Models"."\\".$table;

        $user = $model_name::withTrashed()
        ->where('id', $id)
        ->restore();
       
        if($user){
            //report_it("Restored a delete action");
            return redirect()->back()->with('success', 'Restored Successfully');
        }else{
           return redirect()->back()->with('errors', 'Data not found'); 
        }
        
     }
     
     public function ignoreDelete()
    {
        //report_it("Ignored a delete action");
            return redirect()->back()->with('success', 'Delete Ignored Successfully');
        
        
     }
     
     public function search($text)
    {
       /*  if ($text !='') { 
           $result =""; //links::Where('name', 'like', '%' . $text . '%')->get();
           if($result->count()>0){
            $output ="<div class='search-header'> Result</div>";
            foreach($result as $data){
         $output.= " 
          <div class='search-item'>
              <a href=' ".$data->url."'>
                <div class='search-icon bg-primary text-white mr-3'>
                  <i class='".$data->icon."'></i>
                </div>
               ".$data->name."
              </a>
            </div>";
            }
            report_it("Searched for".$text);
            echo $output;
           }else{
               echo "<div style='height:80px; margin:0; text-align:center; '>No match found</div>";
           }
        } */

        
     }
   
   
    
    public function redirect()
    {
       if(Auth::user()->jobe_role =='1' && Auth::user()->status=='1'){
           $user = User::find(Auth::user()->id);
           $user->updated_at = Carbon::now();
           if($user->save()){   
            //report_it("Logged in successfully"); 
                 
            return view('dashboard');}else{ return redirect()->route('logout');}
        }else{
            return redirect()->route('logout');
        }

      
    }

   

  

    public function checkAdmin($email, $password)
    {
        $user = User::where('email',$email)->orwhere('username',$email)->first();
        if($user->job_role =='1'){
            echo '1';
        }else{
            echo '0';
        }
}

public function checkReg(Request $request){
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
        
            
            $response = 1;
    
}
return $response;
}

/* public function notifications(){
    $messages = messages::where('to_bid',Auth::user()->bid)->latest()->get();
    foreach($messages as $message){
$message->status = 1;
$message->save();
    }    
    return view('notifications',compact('messages'));
}
 */

/* public function notificationsRead(){
    $messages = messages::where('to_bid',Auth::user()->bid)->orderBy('updated_at', 'DESC')->get();
    foreach($messages as $message){
$message->status = 1;
$message->save();
    }    
    return back();
    exit;
}
 */


}
