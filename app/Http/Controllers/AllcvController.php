<?php

namespace App\Http\Controllers;

use App\Models\allcv;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;


class AllcvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $file = allcv::where('candidate_id',$request->input('id'))->first();
        $user = User::find($request->input('id'));
        $filePath = public_path().$file->link;
      if($file->extension == "docx"){
          $headers = ['Content-Type: application/docx'];
      }else if($file->extension == "pdf"){
        $headers = ['Content-Type: application/docx'];
      }else if($file->extension == "doc"){
        $headers = ['Content-Type: application/doc'];
      }else{
          return "File is unreadable.";
      }
    	

    	$fileName = $user->fullname.'.docx';


    	return response()->download($filePath, $fileName, $headers);

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


    public function uploadCV(Request $request){
    
        $validator = Validator::make($request->all(), [
            'cv'   => 'required|file|max:5000|mimes:doc,pdf,docx'
        ]);
        if($validator->fails()) {
            
            return $validator->errors()->first();
        }else{
      $oldfile = allcv::where('candidate_id',Auth::user()->id)->first();
           
         if(isset($oldfile->link)){
            $ext = $request->file('cv')->getClientOriginalExtension();
            $cv_link = checkFile($request->file('cv'),$oldfile->link,"/cvfolder",Auth::user()->bid); 
          
           $oldfile->link = $cv_link;
           $oldfile->extension = $ext;
            if($oldfile->save()){
                return 1;
                notifyUser("You have successfully updated your CV","Enlist",Auth::user()->bid);
                notifyAdmin(Auth::user()->fullname." has updated their CV ","Enlist");
            }else{
                DeleteImage($cv_link);
                return "something went wrong";
            }
         }else{
             $ext = $request->file('cv')->getClientOriginalExtension();
            $cv_link = uploadFile($request->file('cv'),"/cvfolder",Auth::user()->bid); 
            
            $newFile = new allcv();
            $newFile->link = $cv_link;       
            $newFile->extension =   $ext;    
            $newFile->candidate_id = Auth::user()->id;       
            if($newFile->save()){
                notifyUser("You have successfully submitted your CV","Enlist",Auth::user()->bid);
                notifyAdmin(Auth::user()->fullname." has submitted their CV ","Enlist");
                return 1;
            }else{
                DeleteImage($cv_link);
                return "something went wrong";
            }
         }
                 
        }
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
     * @param  \App\Models\allcv  $allcv
     * @return \Illuminate\Http\Response
     */
    public function show(allcv $allcv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\allcv  $allcv
     * @return \Illuminate\Http\Response
     */
    public function edit(allcv $allcv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\allcv  $allcv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, allcv $allcv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\allcv  $allcv
     * @return \Illuminate\Http\Response
     */
    public function destroy(allcv $allcv)
    {
        //
    }
}
