<?php

namespace App\Http\Controllers;

use App\Models\activejob;
use App\Models\allcv;
use App\Models\application;
use App\Models\jobpost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($job_id)
    {
        $post = jobpost::find($job_id);
        return view('user.jobs.apply',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assign($id)
    {
        DB::beginTransaction();
        try{
            $application = application::find($id);
            $jobposts = jobpost::find($application->jobpost_id);
            $application->status = 1;
            if($application->save()){
                $activeJob = new activejob();
                $activeJob->application_id = $application->id;
                $activeJob->candidate_id = $application->candidate_id;
                $activeJob->company_id = $jobposts->company_id;
                $activeJob->job_title= $jobposts->job_title;
                $activeJob->jobpost_id= $jobposts->id;
               if( $activeJob->save()){
                  $user = User::find($application->candidate_id);
                   notifyAdmin(Auth::user()->fullname." has assigned a job to ".getCandidateName($application->candidate_id),"Enlist");
                   notifyUser("Congratulations! You have been offered a Job. Admin will inform and prepare you for the next stage.","Enlist",$user->bid);
    
                    DB::commit();
                    return 1;
               }else{
                   DB::rollback();
                   return "Cannot move this candidate at the momemt";
               }
                
            }else{
                DB::rollback();
                return "Cannot change application status at the momemt";
           
            }
        }catch(\Exception $e){
            DB::rollback();
            return $e->getMessage();
       
        }
       
    }  
    
    public function reject($id)
    {
        DB::beginTransaction();
        try{
            $application = application::find($id);
            $application->status = 2;
            if($application->save()){
                DB::commit();
                   return 1;
               }else{
                   DB::rollback();
                   return "Cannot change status at the momemt";
               }
                
          
        }catch(\Exception $e){
            DB::rollback();
            return $e->getMessage();
       
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
        $message = $request->input('cover');
        $jobpost_id = $request->input('job_id');
        $cv = allcv::where('candidate_id',Auth::user()->id)->first();
     
        if(null == $cv){
            return "You must upload a CV first from your dashboard settings.";
        }else if($message ==""){
            return "You must attach a cover letter";
        }else if($jobpost_id ==""){
            return "There's no job found";
        }else{
            DB::beginTransaction();
            try{
                 $post = jobpost::find($jobpost_id);
            $application = new application();
            $application->jobpost_id = $jobpost_id;
            $application->candidate_id = Auth::user()->id;
            $application->message = $message;
            if($application->save()){
                notifyAdmin(Auth::user()->fullname." has applied for ".$post->job_title,"Enlist");
                notifyUser("You have successfully applied for a job post. Admin will notify you when your application is approved.","Enlist",Auth::user()->bid);
 
            }
            DB::commit();
            return 1;
            }catch(\Exception $e){
                DB::rollback();
                return "You have already applied for this post. Kindly wait for approval.";
            }
          
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts = application::where('applications.status',0)->join('jobposts', 'applications.jobpost_id', '=', 'jobposts.id')->join('allcvs','applications.candidate_id','=','allcvs.candidate_id')->
      get(['jobposts.*', 'applications.*','allcvs.link']);
      
      return view('admin.jobpost.applications', compact('posts'));
    // dd($posts);
    }

 public function showSingle($id)
    {
        $posts = application::where('applications.id',$id)->join('jobposts', 'applications.jobpost_id', '=', 'jobposts.id')->join('allcvs','applications.candidate_id','=','allcvs.candidate_id')
        ->join('users','applications.candidate_id','=','users.id')->
      first(['jobposts.*', 'applications.*','allcvs.link','users.fullname','users.passport']);
      
      return view('admin.jobpost.single-application', compact('posts'));
    // dd($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(application::find($id)->delete()){
            return 1;
        }
      
    }
}
