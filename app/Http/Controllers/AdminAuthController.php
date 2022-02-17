<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Identification;
use App\Models\Jobrole;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
  public function home()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.auth.login');
    }
   public function forgot()
    {
        return view('admin.auth.forgotpassword');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::guard('webadmin')
               ->attempt($req->only(['email', 'password'])))
        {
            return redirect()->intended(route('admin.dashboard'))
            ->withSuccess('Signed in');
            //return redirect()
                //->route('');
        }

        return redirect()
            ->back()
            ->with('status', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('webadmin')
            ->logout();

        return redirect()
            ->route('admin.login');
    }


    public function all(){
        $admin = Admin::all();
        //report_it("Opened all users page");
        return view('admin.staff.allstaff',compact('admin'));

    }

    public function create()
    {
        $jobroles =  Jobrole::all();
        $id_type =  Identification::all();
        //report_it("Opened create users page");
        return view('admin.staff.create', compact('jobroles','id_type'));
    }

    public function editStaff($id)
    {
        $data = Admin::find($id);
        return view('admin.staff.edit',compact('data'));
    }

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
        }else{
            $id = $request->input('id');
            $user = Admin::find($id);
            $bid = $user->bid;
            $oldPassport = $user->passport;

        DB::beginTransaction();
        try{
      if($request->file('photo') !=''){
        $passportpics = checkImage($request->file('photo'),$oldPassport,"/admin/staffphotofolder",$bid); 
             
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
                    }
                
                }catch(\Exception $e){
                DB::rollback();
                return $e->getMessage();

            }
            

        
    
    }
    } 
    
    public function updateStaff(Request $request)
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
            $user = Admin::find($id);
            $bid = $user->bid;
            $oldPassport = $user->passport;

        DB::beginTransaction();
        try{
      if($request->file('photo') !=''){
        $passportpics = checkImage($request->file('photo'),$oldPassport,"/admin/staffphotofolder",$bid); 
             
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
    
            $user = Admin::find($id);
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
$user = Admin::find(Auth::user()->id);
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