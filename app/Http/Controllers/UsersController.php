<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Identification;
use App\Models\Guarantor;
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
        /* if($request->input('oldp')==''){
            echo "You must enter old password";
        }else if($request->input('newp')==''){
            echo "Enter new password";
        }else if($request->input('cnewp')==''){
            echo "Confirm new password";
        }else if($request->input('cnewp')!= $request->input('newp')){
            echo "Paswords do not match";
        }else if(Hash::make($request->input('oldp')) != Auth::user()->password ){
            echo  Auth::user()->password;
        } */

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
    public function store(Request $request)
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
      }else if($request->input('salary')==""){
          echo "How much salary?";
      }else if($request->input('role')==""){
          echo "Select Job role";
      }else if($request->input('idtype')==""){
          echo "Select ID type";
      }else{
          DB::beginTransaction();
        $response = "0";
        try{
 $randAlpha = substr(str_shuffle( implode("",range("A","Z")) ),0,3);
        $bid = $randAlpha.date("ymd");
        $idphoto = $this->uploadImage($request->file('photoid'),"/useridfolder",$bid);           
       $passportpics = $this-> uploadImage($request->file('photo'),"/userphotofolder",$bid); 
        if(file_exists(public_path().$idphoto) && file_exists(public_path().$passportpics)){
        $user = new User();
        $user->bid = $bid;
        $user->fullname = $request->input('fname');
        $user->username = $request->input('uname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make("12345678");//default password for user to reset
        $user->gender = $request->input('gender');
        $user->address = $request->input('addr');
        $user->salary = $request->input('salary');
        $user->job_role = $request->input('role');
        $user->passport =  $passportpics;
        $user->id_type = $request->input('idtype');
        $user->idphoto = $idphoto;
        if($user->save()){ 
           //report_it("Created a new user " .$user->fullname);
            DB::commit();
            $response = "1";
            
        }else{
           $this-> DeleteImage($passportpics);
            $this->DeleteImage($idphoto);
            $response = "Something went wrong";
        }
    }
        }catch(\Exception $e){
DB::rollback();
        $response =  $e->getMessage();
    }
    echo   $response;
      }
        

        
}
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
    public function add_guarantor_one($id)
    {
        $user = User::find($id);
        $jobrole =  Jobrole::all();
        $id_type =  Identification::all();
        $guarantor = "1";
        $success="Staff added successfully. Complete Guarantors profile";
        return view('staff.edit', compact('user','jobrole','id_type','guarantor','success'));
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clusters  $clusters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
        }else if($request->input('salary')==""){
            echo "How much salary?";
        }else if($request->input('role')==""){
            echo "Select Job role";
        }else if($request->input('idtype')==""){
            echo "Select ID type";
        }else{

            $id = $request->input('user_id');
            $user = User::find($id);
            $bid = $user->bid;
            $oldIDImage = $user->idphoto;
            $oldPassport = $user->passport;
           
            if($request->file('photoid')=='' && $request->file('photo')==''){
    
                DB::beginTransaction();
                    $user->fullname = $request->input('fname');
                    $user->username = $request->input('uname');
                    $user->email = $request->input('email');
                    $user->phone = $request->input('phone');
                    $user->gender = $request->input('gender');
                    $user->address = $request->input('addr');
                    $user->salary = $request->input('salary');
                    $user->job_role = $request->input('role');
                    $user->comment = $request->input('comment');
                    $user->id_type = $request->input('idtype');
                    if($user->save()){ 
                        //report_it("Updated a user" .$user->fullname);
                        DB::commit();
                       echo "1";
                    }else{
                   echo "0"; 
                   DB::rollback();
                  
                }
                
            }else if($request->file('photoid')!=''){
                 $idphoto =  $this->checkImage($request->file('photoid'),$oldIDImage,"/useridfolder",$bid);  
    
                if(file_exists(public_path().$idphoto)){
                    DB::beginTransaction();
                    $user->fullname = $request->input('fname');
                    $user->username = $request->input('uname');
                    $user->email = $request->input('email');
                    $user->phone = $request->input('phone');
                    $user->gender = $request->input('gender');
                    $user->address = $request->input('addr');
                    $user->salary = $request->input('salary');
                    $user->job_role = $request->input('role');
                    $user->comment = $request->input('comment');
                    $user->id_type = $request->input('idtype');
                    $user->idphoto = $idphoto;
                    if($user->save()){ 
                       echo "1";
                       DB::commit();
                    }else{
                   echo "0"; 
                   DB::rollback();
                  
                }
                }
            }else if($request->file('photo')!=''){
             
           $passportpics = $this->checkImage($request->file('photo'),$oldPassport,"/userphotofolder",$bid); 
                if(file_exists(public_path().$passportpics) ){
                    DB::beginTransaction();
                    $user->fullname = $request->input('fname');
                    $user->username = $request->input('uname');
                    $user->email = $request->input('email');
                    $user->phone = $request->input('phone');
                    $user->gender = $request->input('gender');
                    $user->address = $request->input('addr');
                    $user->salary = $request->input('salary');
                    $user->job_role = $request->input('role');
                    $user->comment = $request->input('comment');
                    $user->passport =  $passportpics;
                    $user->id_type = $request->input('idtype');
                    if($user->save()){ 
                       echo "1";
                       DB::commit();
                    }else{
                   echo "0"; 
                   DB::rollback();
                  
                }
                }
            }else if($request->file('photoid')!='' && $request->file('photo')!=''){
                $idphoto =  $this->checkImage($request->file('photoid'),$oldIDImage,"/useridfolder",$bid);  
                $passportpics = $this->checkImage($request->file('photo'),$oldPassport,"/userphotofolder",$bid); 
              
                if(file_exists(public_path().$idphoto) && file_exists(public_path().$passportpics)){
                    DB::beginTransaction();
                    $user->fullname = $request->input('fname');
                    $user->username = $request->input('uname');
                    $user->email = $request->input('email');
                    $user->phone = $request->input('phone');
                    $user->gender = $request->input('gender');
                    $user->address = $request->input('addr');
                    $user->salary = $request->input('salary');
                    $user->job_role = $request->input('role');
                    $user->comment = $request->input('comment');
                    $user->id_type = $request->input('idtype');
                    $user->idphoto = $idphoto;
                    $user->passport =  $passportpics;
                    if($user->save()){ 
                       echo "1";
                       DB::commit();
                    }else{
                   echo "0"; 
                   DB::rollback();
                  
                }
                }
            }
        }

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clusters  $clusters
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::find($id); 
      $guarantor_one_file =  User::find($id)->Guarantor()->where('number_', '1')->first();
      $guarantor_two_file =  User::find($id)->Guarantor()->where('number_', '2')->first();

      $message="0";      
        try {
            DB::transaction(function () use($user,$guarantor_one_file,$guarantor_two_file,& $message) {
               $passport = $user->passport;
              $idphoto = $user->idphoto; 
             //notifyAdmin("Admin is requesting for a delete of this account. <b>Decline</b> or <b>Ignore this message</b>. Account Name:  <b>".getUserName($user->bid)."</b><br><a class='btn btn-primary btn-sm' href='/retore-delete/".$user->id."/User'>Decline</a>",Auth::user()->bid);
             //report_it("Deleted a user " .$user->fullname);
             $res = $user->delete();
              if($res){
               /*  if(isset($passport)){
                    $this-> DeleteImage($passport);
                }if(isset($idphoto)){
                    $this-> DeleteImage($idphoto);
                }
                if(isset($guarantor_one_file->id)){

                    $g_one_passport= $guarantor_one_file->passport;
                    $g_one_idphoto= $guarantor_one_file->id_image;
                    $guarantor_one_file->delete();
                }  
             
                           
                if(isset($guarantor_two_file->id)){
             $g_two_passport= $guarantor_two_file->passport;
            $g_two_idphoto= $guarantor_two_file->id_image;  
             $guarantor_two_file->delete();      }

             if(isset($g_one_passport)){
                $this-> DeleteImage($g_one_passport);
            }if(isset($g_one_idphoto)){
                $this-> DeleteImage($g_one_idphoto);
            }
            if( isset($g_two_passport)){
                $this-> DeleteImage($g_two_passport);
            }if(isset($g_two_idphoto)){
                $this-> DeleteImage($g_two_idphoto);
            } */
      
            $message= "1";
           
 }
           
            });
        }
        catch (\Throwable $e) {
            $message= "0";
        }
        
      echo $message;
    }

    

public  function uploadImage($img,$folder,$bid){
    $uploaded_name="";
    $ymd = date('Ymd');
    $hours = date('H');
    $minutes = (date('i') < 10)?"0".date('i'):date('i');
    $seconds = (date('s') < 10)?"0".date('s'):date('s');
  
    $alpha = implode('',range('a','z'));
    $rand = substr(str_shuffle(str_repeat($alpha,5)),0,2);//generating random alphabets a-z
    if($img !=null){

        $ext = $img->getClientOriginalExtension();
        $file_name = "IMG_".$ymd."_".$hours.$minutes.$seconds.$rand.$bid.".".$ext;
        if(strtolower($ext)=='jpg'|| strtolower($ext)=='png'){
            if($img->move(public_path().$folder,$file_name)){
                
                $uploaded_name = $folder."/".$file_name;
            }

        }
       
    }
     return $uploaded_name;
    
  }
  public function DeleteImage($img){
    if($img != ""){
      unlink(public_path()."/".$img);
  }
}

  function checkImage($img,$oldImage,$folder,$bid){
   
    if($oldImage != "" && $img !=""){
       
        $upload = $this -> uploadImage($img,$folder,$bid); 
        if($upload !=""){
            if($this-> DeleteImage($oldImage)){
                 return $upload;
            }else{
                return $upload;
            }
            
           
        } else{
            return $oldImage;
        }
         
    }else{
        $upload = $this -> uploadImage($img,$folder,$bid); 
        return $upload;
    }
    
   
  }



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

public function reset($id){

    $response=0;
    try{

        $user = User::find($id);
        $user->password = Hash::make("12345678");//default password for user to reset
        if($user->save()){
            //report_it("Reset a user password " .$user->fullname);
$response = 1;
        }
    } catch(\Exception $e){
        $response= $e->getMessage();
    }

    echo $response;
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