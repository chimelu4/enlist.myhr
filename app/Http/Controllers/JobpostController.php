<?php

namespace App\Http\Controllers;

use App\Models\accounttype;
use App\Models\industry;
use App\Models\jobpost;
use App\Models\jobtypes;
use App\Models\poststatus;
use App\Models\qualification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class JobpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = jobpost::orderBy('id','desc')->get();

        return view('admin.jobpost.all-posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = User::where('account_type','2')->get();
        $industry = industry::all();
        $types =jobtypes::all();
        $qualifications = qualification::all();
        $jobstatus = poststatus::all();
        return view('admin.jobpost.create-job-post',compact('industry','types','companies','qualifications','jobstatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $location = $request->input('loc');
        $type = $request->input('type');
        $industry = $request->input('industry');
        $min  = $request->input('min');
        $max = $request->input('max');
        $openingdate = $request->input('openingdate');
        $closingdate  = $request->input('closingdate');
        $company = $request->input('company');
        $desc = $request->input('desc');
        $minqualification = $request->input('minqualification');
        $maxqualification = $request->input('maxqualification');
        $other = $request->input('other');
        $status =  $request->input('poststatus');
        $photo  = $request->file('photo');
        //start validating
        if($title == ""){
            return "Enter title";
        }else if($location == ""){
            return "Enter Job Location";
        }else if($type == ""){
            return "Select at least one job type";
        }else if($industry == ""){
            return "Select one Industry";
        }else if($min == ""){
            return "Enter minimum salary";
        }else if($max == ""){
            return "Enter maximum salary";
        }else if($openingdate == ""){
            return "Enter job open date";
        }else if($closingdate == ""){
            return "Enter job closing date";
        }else if($company == ""){
            return "choose Company";
        }else if($desc == ""){
            return "Enter Job description";
        }else if(!isset($photo)){
            return "Upload a thumbnail picture";
        }else if($minqualification == ""){
            return "Select Minimum qualification";
        }else if($maxqualification == ""){
            return "Select Highest qualification";
        }else if($other == ""){
            return "Enter other requirements";
        }else if($status == ""){
            return "you must select status";
        }else{
            $post = new jobpost();
            //$bid = generateBid();
            try{
                $thumbnail= uploadImage($request->file('photo'),"/job-post-images",$post->id); 

                if( file_exists(public_path().$thumbnail)){
                    $post->job_title = $title;
                    $post->location = $location;
                    $post->job_type = $type;
                    $post->industry = $industry;
                    $post->salary_from = $min;
                    $post->salary_to = $max;
                    $post->date_open = $openingdate;
                    $post->date_closing = $closingdate;
                    $post->company_id = $company;
                    $post->image = $thumbnail;
                    $post->job_description = $desc;
                    $post->min_qualification = $minqualification;
                    $post->highest_qualification = $maxqualification;
                    $post->other_requirement = $other;
                    $post->status = $status;
                    $post->posted_by = Auth::user()->id;

                    if($post->save()){ 
                        //report_it("Updated a user" .$user->fullname);
                        DB::commit();
                       return "1";
                    }else{
                        DeleteImage($thumbnail);
                        return  "Something went wrong";
                     }

                }else{
                    return "Image could not be uploaded. Check image file size";
                }
            }catch(\Exception $e){
                  DB::rollback();
            return $e->getMessage();
        }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function show(jobpost $jobpost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = User::where('account_type','1')->get();
        $industry = industry::all();
        $types =jobtypes::all();
        $qualifications = qualification::all();
        $jobstatus = poststatus::all();
        $jobpost = jobpost::find($id);
        return view("admin.jobpost.edit-job-post",compact('jobpost','industry','types','companies','qualifications','jobstatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $title = $request->input('title');
        $location = $request->input('loc');
        $type = $request->input('type');
        $industry = $request->input('industry');
        $min  = $request->input('min');
        $max = $request->input('max');
        $openingdate = $request->input('openingdate');
        $closingdate  = $request->input('closingdate');
        $company = $request->input('company');
        $desc = $request->input('desc');
        $minqualification = $request->input('minqualification');
        $maxqualification = $request->input('maxqualification');
        $other = $request->input('other');
        $status =  $request->input('poststatus');
        $photo  = $request->file('photo');
        //start validating
        if($title == ""){
            return "Enter title";
        }else if($location == ""){
            return "Enter Job location";
        }else if($type == ""){
            return "Select at least one job type";
        }else if($industry == ""){
            return "Select one Industry";
        }else if($min == ""){
            return "Enter minimum salary";
        }else if($max == ""){
            return "Enter maximum salary";
        }else if($openingdate == ""){
            return "Enter job open date";
        }else if($closingdate == ""){
            return "Enter job closing date";
        }else if($company == ""){
            return "choose Company";
        }else if($desc == ""){
            return "Enter Job description";
        }else if($minqualification == ""){
            return "Select Minimum qualification";
        }else if($maxqualification == ""){
            return "Select Highest qualification";
        }else if($other == ""){
            return "Enter other requirements";
        }else if($status == ""){
            return "you must select status";
        }else{
            $post =jobpost::find($request->input('id'));
            $oldImage = $post->image;
            //$bid = generateBid();
            try{
                if(isset($photo)){
                    $thumbnail= checkImage($request->file('photo'),$oldImage,"/job-post-images",$post->id); 

                    if( file_exists(public_path().$thumbnail)){
                        $post->job_title = $title;
                        $post->location = $location;
                        $post->job_type = $type;
                        $post->industry = $industry;
                        $post->salary_from = $min;
                        $post->salary_to = $max;
                        $post->date_open = $openingdate;
                        $post->date_closing = $closingdate;
                        $post->company_id = $company;
                        $post->image = $thumbnail;
                        $post->job_description = $desc;
                        $post->min_qualification = $minqualification;
                        $post->highest_qualification = $maxqualification;
                        $post->other_requirement = $other;
                        $post->status = $status;
                        $post->posted_by = Auth::user()->id;
    
                        if($post->save()){ 
                            //report_it("Updated a user" .$user->fullname);
                            DB::commit();
                           return "1";
                        }else{
                            DeleteImage($thumbnail);
                            return  "Something went wrong";
                         }
    
                    }else{
                        return "Image could not be uploaded. Check image file size";
                    }
                }else{
                        $post->job_title = $title;
                        $post->location = $location;
                        $post->job_type = $type;
                        $post->industry = $industry;
                        $post->salary_from = $min;
                        $post->salary_to = $max;
                        $post->date_open = $openingdate;
                        $post->date_closing = $closingdate;
                        $post->company_id = $company;
                        $post->job_description = $desc;
                        $post->min_qualification = $minqualification;
                        $post->highest_qualification = $maxqualification;
                        $post->other_requirement = $other;
                        $post->status = $status;
                        $post->posted_by = Auth::user()->id;
    
                        if($post->save()){ 
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobpost  $jobpost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();

            $post = jobpost::find($id);
       
 if($post->delete()){
    DeleteImage($post->image);
    DB::commit();
    
    return 1;
 }
       
        }catch(\Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
       

    }
}
