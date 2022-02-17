<?php

namespace App\Http\Controllers;

use App\Models\accounttype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccounttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = User::where('account_type',1)->get();
        //report_it("Opened all users page");
        return view('admin.employers.all-employers',compact('employers'));
    }
    
    public function indexCandidate()
    {
        $candidates = User::where('account_type',2)->get();
        //report_it("Opened all users page");
        return view('admin.candidates.all-candidates',compact('candidates'));
    }

 public function editEmployer($id)
    {
        $data = User::find($id);
        return view('admin.employers.edit-employer',compact('data'));
    }
    
    public function editCandidate($id)
    {
        $data = User::find($id);
        return view('admin.candidates.edit-candidate',compact('data'));
    }
    
    public function addEmployer()
    {
        $type = accounttype::all();
        return view('admin.employers.add-employer',compact('type'));
    }
     public function addCandidate()
    {
        $type = accounttype::all();
        return view('admin.candidates.add-candidate',compact('type'));
    }
    
    public function updateUser(Request $request)
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
        $passportpics = checkImage($request->file('photo'),$oldPassport,"/admin/userphotofolder",$bid); 
             
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                return 1;
            }else{
                return 0;
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createEmployer(Request $request)
    {
        $cname = $request->input('cname');
        $c_address = $request->input('caddr');
        $office_line = $request->input('oline');
        $current_position = $request->input('cposition');

        if($request->input('fname')==""){
            echo "Enter full name";
        }else if($request->input('email')==""){
            echo "Enter email";
        }else if(!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)){
           return "Please enter a valid email address ";
        }else if(isExist("email",$request->input('email'),"user")){
            echo "Email is already in use";
        }else if($request->input('uname')==""){
            echo "Enter username";
        }else if(isExist("username",$request->input('uname'),"user")){
            echo "Username already exist";
        }else if($request->input('phone')==""){
            echo "Enter phone";
        }else if(isExist("phone",$request->input('phone'),"user")){
            echo "Phone number is already in use";
        }else if($request->input('addr')==""){
            echo "Enter address";
        }else if($request->input('gender')==""){
            echo "Select gender type";
        }else if($cname ==""){
            return "Enter Company name ";
        }else  if($c_address ==""){
            return "Enter Company address";
        }else  if($office_line==""){
            return "Enter Office Line";
        }else  if($current_position==""){
            return "Enter Current Position";
        }else{
try{
    $bid = generateBid();
    DB::beginTransaction();
    $passportpics = uploadImage($request->file('photo'),"/userphotofolder",$bid); 
    if( file_exists(public_path().$passportpics)){
        $user = new User();
        $user->fullname = $request->input('fname');
        $user->username = $request->input('uname');
        $user->email = $request->input('email');
        $user->bid = $bid;
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->address = $request->input('addr');
        $user->passport =  $passportpics;
        $user->account_type =  1;
        $user->company = $cname;
        $user->company_addr = $cname;
        $user->company_phone = $office_line;
        $user->company_position = $current_position;

        if($user->save()){ 
            //report_it("Created a new user " .$user->fullname);
             DB::commit();
             return  "1";
             
         }else{
            DeleteImage($passportpics);
            return  "Image upload unsuccessful";
         }
    }
}catch(\Exception $e){
    DB::rollback();
     return $e->getMessage();
}

        }
    }
    
    
    public function createCandidate(Request $request)
    {
        

        if($request->input('fname')==""){
            echo "Enter full name";
        }else if($request->input('email')==""){
            echo "Enter email";
        }else if(!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)){
           return "Please enter a valid email address ";
        }else if(isExist("email",$request->input('email'),"user")){
            echo "Email is already in use";
        }else if($request->input('uname')==""){
            echo "Enter username";
        }else if(isExist("username",$request->input('uname'),"user")){
            echo "Username already exist";
        }else if($request->input('phone')==""){
            echo "Enter phone";
        }else if(isExist("phone",$request->input('phone'),"user")){
            echo "Phone number is already in use";
        }else if($request->input('addr')==""){
            echo "Enter address";
        }else if($request->input('gender')==""){
            echo "Select gender type";
        }else{
try{
    $bid = generateBid();
    DB::beginTransaction();
    $passportpics = uploadImage($request->file('photo'),"/userphotofolder",$bid); 
    if( file_exists(public_path().$passportpics)){
        $user = new User();
        $user->fullname = $request->input('fname');
        $user->username = $request->input('uname');
        $user->email = $request->input('email');
        $user->bid = $bid;
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->address = $request->input('addr');
        $user->passport =  $passportpics;
        $user->account_type =  2;
      

        if($user->save()){ 
            //report_it("Created a new user " .$user->fullname);
             DB::commit();
             return  "1";
             
         }else{
            DeleteImage($passportpics);
            return  "Image upload unsuccessful";
         }
    }
}catch(\Exception $e){
    DB::rollback();
     return $e->getMessage();
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
     * Display the specified resource.
     *
     * @param  \App\Models\accounttype  $accounttype
     * @return \Illuminate\Http\Response
     */
    public function show(accounttype $accounttype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\accounttype  $accounttype
     * @return \Illuminate\Http\Response
     */
    public function edit(accounttype $accounttype)
    {
        //
    }

    public function toggleActiveUser($id){

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\accounttype  $accounttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, accounttype $accounttype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\accounttype  $accounttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(accounttype $accounttype)
    {
        //
    }
    
    public function deleteEmployer($id)
    {
        User::find($id)->delete();

        return 1;
    }
    
    public function deleteCandidate($id)
    {
        User::find($id)->delete();

        return 1;
    }
}
