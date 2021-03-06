<?php

namespace App\Http\Controllers;

use App\Models\industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $industries = industry::orderBy('name','asc')->get();

      return view('admin.industries.all-industries',compact('industries'));
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
            $industry = new industry();
            $industry->name = $name;
            if($industry->save()){
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
        $industry = industry::find($id);
        
        return response()->json([
            'name' => $industry->name, 
            'id' => $industry->id
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit(industry $industry)
    {
        //
    }

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
           $industry = industry::where('id',$id)->first();
           $industry->name = $name;
           if($industry->save()){
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
      industry::find($id)->delete();

      return 1;
    }
}
