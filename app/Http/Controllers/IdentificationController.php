<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Identification;
use Illuminate\Http\Request;

class IdentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identifications =  Identification::all();
        //report_it("Opened all Identification Page");
        return view('identity.all', compact('identifications'));
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
        if($request->input('title')==""){
 echo "Title is missing";
        }else{
            $response = "0";
            try{
                $identification = new Identification();
                $identification->name = $request->input('title');
                if($identification->save()){
                    //report_it("Created a new means of Identification ".$identification->name);
                   $response = "1";
                }
            }
           catch(\Exception $e){
                $response =  $e->getMessage();
            }
            
            echo   $response;
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\identification  $identification
     * @return \Illuminate\Http\Response
     */
    public function show(identification $identification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\identification  $identification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =  Identification::find($id);  
        report_it("Opened Edit Identification Page");      
        //return response()->json($data);
        return view('identity.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\identification  $identification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if( $request->input('title')==""){
            echo "Title cannot be empty";
        }else{
            $response = "0";
            try{
                $id = $request->input('id');
                $data =  Identification::find($id);         
                $data->name = $request->input('title');
                if($data->save()){
                    report_it("Updated Identification ".$data->name);
                    $response = "1";
                }
            }
           
            catch(\Exception $e){
                $response =  $e->getMessage();
            }
          echo  $response ;
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *els
     * @param  \App\Models\identification  $identification
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try{
            $res=Identification::find($id)->delete();
            if ($res){
                //notifyAdmin("Admin is requesting to delete a Bank account. <b>Decline</b> or <b>Ignore this message</b>.Account Name:  <b>".$bank->bank_name." Account Name: ".$bank->account_name." </b><br><a class='btn btn-primary btn-sm' href='/retore-delete/".$bank->id."/Allbank'>Decline</a>",Auth::user()->bid);
                report_it("Deleted an Identification");
                echo "1";
                
            }
        }
                   catch(\Exception $e){
                    echo  $e->getMessage();}
                    exit;    
                        }
}
