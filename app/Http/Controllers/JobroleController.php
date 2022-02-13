<?php

namespace App\Http\Controllers;

use App\Models\Jobrole;
use App\Models\User;
use Illuminate\Http\Request;

class JobroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $jobroles =  Jobrole::all();
       //report_it("Opened jobrole form");
        return view('jobroles.all', compact('jobroles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $response = "0";
        try{
            $jobrole = new Jobrole();
            $jobrole->name = $request->input('title');
            if($jobrole->save()){
               $response = "1";
            }
        }
        catch(\Exception $e){
            $response =  $e->getMessage();
        }
      echo $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobrole  $jobrole
     * @return \Illuminate\Http\Response
     */
    public function show(jobrole $jobrole)
    {
        //$count = users::where('status','=','1')->count();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobrole  $jobrole
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =  Jobrole::find($id);    
        return view('jobroles.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jobrole  $jobrole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        $response = "0";   
        try{
            $id = $request->input('id');
            $data =  Jobrole::find($id);      
            $data->name = $request->input('title');
            if($data->save()){
               $response = "1";
            }
        }
       
         catch(\Exception $e){
            $response =  $e->getMessage();
        }
      
        echo   $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobrole  $jobrole
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $res=Jobrole::find($id)->delete();
            if ($res){
                //notifyAdmin("Admin is requesting to delete a Bank account. <b>Decline</b> or <b>Ignore this message</b>.Account Name:  <b>".$bank->bank_name." Account Name: ".$bank->account_name." </b><br><a class='btn btn-primary btn-sm' href='/retore-delete/".$bank->id."/Allbank'>Decline</a>",Auth::user()->bid);
        
                echo "1";
                
            }
        }
        catch(\Exception $e){
        echo  $e->getMessage();}
        exit; 
    }
}
