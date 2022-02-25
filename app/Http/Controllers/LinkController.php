<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Jobrole;
use App\Models\link;
use App\Models\User;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($text, Request $request)
    {
        if ($text !='') { 
            $result = link::Where('name', 'like', '%' . $text . '%')->get();
            $user = User::Where('fullname', 'like', '%' . $text . '%')->orWhere('bid', 'like', '%' . $text . '%')->orWhere('company', 'like', '%' . $text . '%')->orWhere('username', 'like', '%' . $text . '%')->orWhere('phone', 'like', '%' . $text . '%')->get();
            $admin = Admin::Where('fullname', 'like', '%' . $text . '%')->orWhere('bid', 'like', '%' . $text . '%')->orWhere('username', 'like', '%' . $text . '%')->orWhere('phone', 'like', '%' . $text . '%')->get();

            if($result->count()>0){
             $output ="<div class='search-header'> Result</div>";
             foreach($result as $d){
          $output.= " 
           <div class='search-item'>
               <a href=' ".$d->url."'>
                 <div class='search-icon bg-primary text-white mr-3'>
                   <i class='".$d->icon."'></i>
                 </div>
                ".$d->name."
               </a>
             </div>";}
             echo $output;
             }if($user->count()>0){
             $output ="<div class='search-header'>Results for Users</div>";
             foreach($user as $data){
          $output.= " 
           <div class='search-item'>
               <a href=' ".$request->root()."/admin/get-user-info/".$data->id."/user'>
                 <div class='search-icon bg-primary text-white mr-3'>
                   <i class='fa fa-user'></i>
                 </div>
                 ".$data->fullname."
               </a>
             </div>";
             }
             //report_it("Searched for".$text);
             echo $output;
            }if($admin->count()>0){
             $output ="<div class='search-header'>Results for Admin</div>";
             foreach($admin as $data){
                $output.= " 
                <div class='search-item'>
                <a href=' ".$request->root()."/admin/get-user-info/".$data->id."/admin'>
                      <div class='search-icon bg-primary text-white mr-3'>
                        <i class='fa fa-user'></i>
                      </div>
                      ".$data->fullname."
                    </a>
                  </div>";
             }
             //report_it("Searched for".$text);
             echo $output;
            }else{
                echo "<div style='height:80px; margin:0; text-align:center; '>No further match found</div>";
            }
         }
 
    }


    public function userSearch($text, Request $request)
    {
       
 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUserInfo($id,$usertype)
    {
        if($usertype == "user"){
     
            $data = User::find($id);
            if($data->account_type==2){
            return view('admin.candidates.edit-candidate',compact('data'));
            }else if($data->account_type==1){
               
                return view('admin.employers.edit-employer',compact('data'));
            }
        }else if($usertype == "admin"){
            $data = Admin::find($id);
            $jobroles =  Jobrole::all();
            return view('admin.staff.edit',compact('data','jobroles'));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(link $link)
    {
        //
    }
}
