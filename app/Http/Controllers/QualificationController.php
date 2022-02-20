<?php

namespace App\Http\Controllers;

use App\Models\qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
   
        public function index()
        {
          $qualifications = qualification::orderBy('name','asc')->get();
    
          return view('admin.qualifications.all-qualifications',compact('qualifications'));
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
            $abbr = $request->input('abbr');
            if($name ==""){
                return "Name cannot be empty";
            }else if($abbr ==""){
                return "Abbreviation cannot be empty";
            }else{
                $qualifications = new qualification();
                $qualifications->name = $name;
                $qualifications->abbr = $abbr;
                if($qualifications->save()){
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
            $qualification = qualification::find($id);
            
            return response()->json([
                'name' => $qualification->name, 
                'abbr' => $qualification->abbr, 
                'id' => $qualification->id
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
           $abbr = $request->input('abbr');
           $id = $request->input('id');
    
           if($name==""){
               return "You must enter a name to continue";
           } else if($abbr==""){
               return "You must enter abbreviation to continue";
           }else{
               $qualifications = qualification::where('id',$id)->first();
               $qualifications->name = $name;
               $qualifications->abbr= $abbr;
               if($qualifications->save()){
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
            qualification::find($id)->delete();
    
          return 1;
        }
    
    
}
