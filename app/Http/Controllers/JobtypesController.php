<?php

namespace App\Http\Controllers;

use App\Models\jobtypes;
use Illuminate\Http\Request;

class JobtypesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $types = jobtypes::orderBy('name','asc')->get();

      return view('admin.job-types.all-job-types',compact('types'));
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
    public function store(Request $request)
    {
        $name = $request->input('name');
        if($name ==""){
            return "Name cannot be empty";
        }else{
            $type = new jobtypes();
            $type->name = $name;
            if($type->save()){
                return 1;
            }else{
                return " Cannot save data at the moment";
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = jobtypes::find($id);
        
        return response()->json([
            'name' => $type->name, 
            'id' => $type->id
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\industry  $industry
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $name = $request->input('name');
       $id = $request->input('id');

       if($name==""){
           return "You must enter a name to continue";
       }else{
           $type = jobtypes::where('id',$id)->first();
           $type->name = $name;
           if($type->save()){
               return 1;
           }
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      jobtypes::find($id)->delete();

      return 1;
    }
}
