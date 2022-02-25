<?php

namespace App\Http\Controllers;

use App\Models\application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Identification;
use App\Models\Guarantor;
use App\Models\jobpost;
use App\Models\Jobrole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $trashed_users= User::onlyTrashed()->get();
        //report_it("Opened all users page");
        return view('staff.allstaff',compact('users','trashed_users'));
    }

public function alljobs()
    {
        
        $posts = application::where('candidate_id',Auth::user()->id)->where('applications.status',1)->join('jobposts', 'applications.jobpost_id', '=', 'jobposts.id')
        ->get(['jobposts.*', 'applications.status']);
        return view('user.profile.all-jobs',compact('posts'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobroles =  Jobrole::all();
        $id_type =  Identification::all();
        //report_it("Opened create users page");
        return view('staff.create', compact('jobroles','id_type'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clusters  $clusters
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clusters  $clusters
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $user = User::find($id);
        $jobrole =  Jobrole::all();
        $id_type =  Identification::all();
        //report_it("Opened edit user page");
        return view('staff.edit', compact('user','jobrole','id_type'));
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clusters  $clusters
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clusters  $clusters
     * @return \Illuminate\Http\Response
     */
    

  



  public function checkemail($em){
    if($em != ""){

        $data = User::where('email', $em)->count();
        if($data>0) {
            echo 1;
        }
     
     
  }else{
      echo 0;
  }
  

}



public function checkforunique($un,$em,$ph){
   $response='';
    if($un != "" ){

        $data = User::where('username', $un)->count();
        if($data>0) {
            $response = "Username already exist";
        }
     
     
  } if ($em !=''){
    $data = User::where('email', $em)->count();
    if($data>0) {
        $response = "Email already exist";
    }
  }
  if ($ph !=''){
    $data = User::where('phone', $ph)->count();
    if($data>0) {
        $response = "Phone already exist";
    }
  }
  echo $response;

}



  public function checkphone($ph){
    if($ph != ""){

        $data = User::where('phone', $ph)->count();
        if($data>0) {
            echo 1;
        }
     
     
  }else{
      echo 0;
  }
  

}




  public function checkUsername($un){
    if($un != ""){

        $data = User::where('username', $un)->count();
        if($data>0) {
            echo 1;
        }
     
     
  }else{
      echo 0;
  }
  

}


  public function toggleActive($id){

           $user = User::find($id);
           $status = $user->status;

                    if($status != "" && $status==1){
                       $user->status =0;
                       if( $user ->save()){
                       // report_it("Changed a user status ");
                      echo "1";
                            }else{echo "0";}
                }else if($status != "" && $status==0){
                    $user->status =1;
                if($user ->save()){
                    echo "1";
                }else{
                    echo "0";
                }
  

}

  
}



/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
       $account = User::withTrashed()->find($id);
      // notifyAdmin("Admin is requesting to delete an account. <b>Decline</b> or <b>Ignore this message</b>.Account Name:  <b>".$account->name." Created Date: ".$account->created_at." </b><br><a class='btn btn-primary btn-sm' href='/retore-delete/".$account->id."/accounts'>Decline</a>","system");//Auth::user()->bid);
    $account->deleted_at= null;
       if($account->save()){
        //report_it("Restored a User: ".$account->fullname);
           echo 1;
       }
    }
}