<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = support::all();
        return view('admin.all-tickets',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.profile.support');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = $request->input('message');
        $title = $request->input('title');
        $ref = genRef();
         if($title == ""){
            return "Support must have a title";
        }else if($message == ""){
            return "Please a enter message";
        }else{
            DB::beginTransaction();
            try{
                $admin = Admin::all(); 
            $support = new support();
            foreach($admin as $user){

           
            $support->to_bid = $user->bid;
            $support->from_bid = Auth::user()->bid;
            $support->title = $title;
            $support->message = $message;
            $support->ref = $ref;
            $support->save();
            }
               notifyAdmin(Auth::user()->fullname. " sent a support request","Enlist");
                notifyUser("You have sent a support request, kindly be patient while we look into your case","Enlist",Auth::user()->bid);
                DB::commit();
                return 1;
           
            }catch(\Exception $e){
                DB::rollback();
                return $e->getMessage();
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = support::find($id);
        //$dialogs = support::where('from_bid',$item->from_bid)->where('to_bid',Auth::user()->bid) orWhere('from_bid',Auth->orderBy('created_at','desc')->get();

        //return view('admin.view-ticket',compact('dialogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(support $support)
    {
        //
    }
}
