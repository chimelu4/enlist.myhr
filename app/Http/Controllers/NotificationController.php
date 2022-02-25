<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = notification::where('to_bid',Auth::user()->bid)->latest()->get();
    foreach($messages as $message){
$message->status = 1;
$message->save();
    }    
    return view('admin.notifications',compact('messages'));
    }
    
    public function indexUser()
    {
        $messages = notification::where('to_bid',Auth::user()->bid)->latest()->get();
    foreach($messages as $message){
$message->status = 1;
$message->save();
    }    
    return view('user.notifications',compact('messages'));
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

    public function read(){
        $messages = notification::where('to_bid',Auth::user()->bid)->orderBy('updated_at', 'DESC')->get();
        foreach($messages as $message){
    $message->status = 1;
    $message->save();
        }    
        return back();
        exit;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(notification $notification)
    {
        //
    }
}
