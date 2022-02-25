<?php

use App\Models\admin;
use App\Models\application;
use App\Models\industry;
use App\Models\jobpost;
use App\Models\Jobrole;
use App\Models\jobtypes;
use App\Models\notification;
use App\Models\poststatus;
use App\Models\qualification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


function getUserName($bid)
{
  if(isset($bid)){
    if($bid != "Enlist"){
      $user = User::where('bid', $bid)->first()??Admin::where('bid',$bid)->first();
     if( isset($user)){
       if($user->fullname== Auth::user()->fullname){
           return "You";
       }else{
      return $user->fullname;
     }
    
     }
     }else{
return "Enlist";
     }
  }else{
    return "deleted account";
  }
}

function getCandidateName($id){
  $user = User::find($id);
  
    return $user->fullname??"Unknown";
  
}function getJobTitle($id){
  $job = jobpost::find($id);
  
    return $job->job_title??"Unknown";
  
}

function applicationRequest(){
  $posts = application::where('candidate_id',Auth::user()->id)->join('jobposts', 'applications.jobpost_id', '=', 'jobposts.id')
  ->get(['jobposts.*', 'applications.status']);
  $application = application::orderBy('created_at','desc')->where('status',0)->get();
  $output = "";

 if(isset($application)){
  foreach($application as $data){
    $output .= "
    <div class='card-body p-0'>
    <div class='tickets-list'>
      <a href='/admin/all-applications' class='ticket-item'>
        <div class='ticket-title'>
          <h4>".getJobTitle($data->jobpost_id)."</h4>
        </div>
        <div class='ticket-info'>
          <div>".getCandidateName($data->candidate_id)."</div>
          <div class='bullet'></div>
          <div class='text-primary'>".$data->created_at->diffForHumans()."</div>
        </div>
      </a>     
     
    
    ";
  }
 }else{
  
    $output .= "
    <div class='card-body p-0'>
    <div class='tickets-list'>
      <a href='#' class='ticket-item'>
        <div class='ticket-title'>
          <h4>No application yet</h4>
        </div>
       
      </a>     
     
    
    ";
  
 }
  $output .="
  <a href='/admin/all-applications' class='ticket-item ticket-more'>
    View All <i class='fas fa-chevron-right'></i>
  </a>
</div>
</div>";
  return $output;
}
function getStat($type,$status){
    if($type == "employer"){
        if($status == "active"){
            return User::where('account_type',1)->where('status',1)->count()??0;
        }else if($status =="deactivated"){
            return User::where('account_type',1)->where('status',0)->count()??0;
        }else if($status =="total"){
            return User::where('account_type',1)->count()??0;
        }
    } else if($type == "candidate"){
        if($status == "active"){
            return User::where('account_type',2)->where('status',1)->count()??0;
        }else if($status =="deactivated"){
            return User::where('account_type',2)->where('status',0)->count()??0;
        }else if($status =="total"){
            return User::where('account_type',2)->count()??0;
        }
    }else if($type == "jobpost"){
        if($status == "published"){
            return jobpost::where('status',1)->count()??0;
        }else if($status =="taken"){
            return jobpost::where('status',3)->count()??0;
        }else if($status =="expired"){
            return jobpost::where('status',4)->count()??0;
        }else if($status =="total"){
            return jobpost::all()->count()??0;
        }
    }
}

function setMessageBeep(){
    $user = Auth::user()->bid;
    $count = notification::where('to_bid',$user)->where('status',0)->count();
  if($count<=0){
    return 'class="nav-link notification-toggle nav-link-lg"';
  }else{
    return 'class="nav-link notification-toggle nav-link-lg beep"';
  }
  }

  function getTotalApplication(){
    return application::where('status',0)->count()??0;
  }
  function getApplicationsCount($id){
    return application::where('jobpost_id',$id)->count()??0;
  }
  function getUserFirstName(){
    $name = explode(' ',Auth::user()->fullname);
    $firstName = $name[0];
    return $firstName;
  }
  
  function userMessagesCount($user){
   
    $count = notification::where('to_bid',$user)->where('status',0)->count()??0;
    
    echo $count!=0?$count:'';
}
 function findUserType($bid){
     $admin = admin::where('bid',$bid)->first();
     $user = User::where('bid',$bid)->first();
     if(isset($admin)){
         return "admin";
     }else if(isset($user)){
         return "user";
     }
 }
function getAdminPhoto($bid)
{

 if(findUserType($bid) =="admin"){
    if($bid !="Enlist"){
        $user = admin::where('bid', $bid)->first();
        if(isset($user)){
             return "public/".$user->passport;
        } else{
        return "public/frontend/assets/images/logo.png";
      }
     
    }
 }else if (findUserType($bid) =="user"){
    if($bid !="Enlist"){
        $user = User::where('bid', $bid)->first();
        if(isset($user)){
             return "public/".$user->passport;
        } else{
        return "public/frontend/assets/images/logo.png";
      }
     
    }
 }
}

  function userMessages($user,$user_type){
    
    $messages = notification::where('to_bid',$user)->orderBy('created_at', 'DESC')->get();
     $output = "";
   if($messages->count()>0){
    foreach($messages as $message){
        $output .=" 
        <div class='dropdown-item ".setClassForMessage($message->status)."'>
        <div class='dropdown-item-icon  text-white'>
        <img src='".getAdminPhoto($message->from_bid)."' class='table-img' >
        </div>
        <div class='dropdown-item-desc'>
          ".$message->message."
          <div class=' text-primary'>".$message->created_at->diffForHumans()." | <a href='/".findUserType($user)."/notifications'>View Message</a></div>
        </div>
      </div>";
    }
   }else{
        $output .="<div style='color:#3333' class='text-center'>No messages found</div>";
    }
    echo $output;
}

function setClassForMessage($status){
    if($status == 0){
      return "dropdown-item-unread";
    }else{
      return "";
    }
  }
function getIdRowNumber($number)
{
   $numberOfUsers = User::where('id_type', $number)->count();
                return $numberOfUsers;
}
function getJobroleRowNumber($id)
{
   $numberOfUsers = admin::where('job_role', $id)->count()??0;
                return $numberOfUsers;
}
function getRowName($id)
{
   $jobrole = Jobrole::withTrashed()->where('id',$id)->first();
                return $jobrole->name;
}

function generateBid(){
   
      $randAlpha = strtolower(substr(str_shuffle( implode("",range("A","Z")) ),0,5));
     $rid = "enlist".date("ymd").$randAlpha; //generating a unique userid using three random alphabets and year(two figures),month(two figures), day(two figures)
    return $rid;
    
}
         
function genRef(){
  $randAlpha = strtolower(substr(str_shuffle( implode("",range("A","Z")) ),0,5));
return  $rid = "myhr".date("ymd").$randAlpha; //generating a unique userid using three random alphabets and year(two figures),month(two figures), day(two figures)

}


function notifyAdmin($content, $from)
{
  $response = false;
  
  $message = new notification();
  $admin = admin::all();

  foreach($admin as $user){
    $message->from_bid = $from;
    $message->to_bid = $user->bid;
    $message->message = $content;
    $message->save();
     }
  }
  
  function notifyUser($content, $from, $to)
{
  
  
  $message = new notification();
 

    $message->from_bid = $from;
    $message->to_bid = $to;
    $message->message = $content;
    $message->save();
     
  }
  

  function uploadImage($img,$folder,$bid){
   $uploaded_name="";
   $ymd = date('Ymd');
   $hours = date('H');
   $minutes = (date('i') < 10)?"0".date('i'):date('i');
   $seconds = (date('s') < 10)?"0".date('s'):date('s');
 
   $alpha = implode('',range('a','z'));
   $rand = substr(str_shuffle(str_repeat($alpha,5)),0,2);//generating random alphabets a-z
   if($img !=null){

       $ext = $img->getClientOriginalExtension();
       $file_name = "IMG_".$ymd."_".$hours.$minutes.$seconds.$rand.$bid.".".$ext;
       if(strtolower($ext)=='jpg'|| strtolower($ext)=='png'){
           if($img->move(public_path().$folder,$file_name)){
               
               $uploaded_name = $folder."/".$file_name;
           }

       }
      
   }
    return $uploaded_name;
   
 }

 function uploadFile($img,$folder,$bid){
   $uploaded_name="";
   $ymd = date('Ymd');
   $hours = date('H');
   $minutes = (date('i') < 10)?"0".date('i'):date('i');
   $seconds = (date('s') < 10)?"0".date('s'):date('s');
 
   $alpha = implode('',range('a','z'));
   $rand = substr(str_shuffle(str_repeat($alpha,5)),0,2);//generating random alphabets a-z
   if($img !=null){

       $ext = $img->getClientOriginalExtension();
       $file_name = "CV_".$ymd."_".$hours.$minutes.$seconds.$rand.$bid.".".$ext;
       //if(strtolower($ext)=='application/pdf'|| strtolower($ext)=='application/docx'){
           if($img->move(public_path().$folder,$file_name)){
               
               $uploaded_name = $folder."/".$file_name;
           }

       //}
      
   }
    return $uploaded_name;
   
 }


  function DeleteImage($img){
   if($img != ""){
     unlink(public_path()."/".$img);}
 }

 function checkImage($img,$oldImage,$folder,$bid){
   
    if($oldImage != "" && $img !=""){
       
        $upload =  uploadImage($img,$folder,$bid); 
        if($upload !=""){
            if(DeleteImage($oldImage)){
                 return $upload;
            }else{
                return $upload;
            }
            
           
        } else{
            return $oldImage;
        }
         
    }else{
        $upload = uploadImage($img,$folder,$bid); 
        return $upload;
    }    
   
    
  } 
  
  function checkFile($img,$oldImage,$folder,$bid){
   
    if($oldImage != "" && $img !=""){
       
        $upload =  uploadFile($img,$folder,$bid); 
        if($upload !=""){
            if(DeleteImage($oldImage)){
                 return $upload;
            }else{
                return $upload;
            }
            
           
        } else{
            return $oldImage;
        }
         
    }else{
        $upload = uploadFile($img,$folder,$bid); 
        return $upload;
    }    
   
    
  }

  function isExist($column,$value, $user){
 

    if($user=="user"){
        $isValue = User::where($column,$value)->get();
        if($isValue->count()>0){
            return true;
        }else{
            return  false;
        }
    }else if($user=="admin"){
        $isValue = Admin::where($column,$value)->get();  
        if($isValue->count()>0){
            return true;
        }else{
            return  false;
        }
    }
}
    
    function getObjectName($object, $id){
        if($object == "type"){
            $type = jobtypes::find($id);

            return $type->name??"Not found";
        }else if($object == "company"){
            $user = User::find($id);

            return $user->company??"Not found";
        }else if($object == "industry"){
            $industry = industry::find($id);

            return $industry->name??"Not found";
        }else if($object == "status"){
            $status = poststatus::find($id);

            return ucfirst($status->name)??"Not found";
        }else if($object == "qualification"){
            $quali = qualification::find($id);

            return ucfirst($quali->name)??"Not found";
        }
    }
function showPostStatus($id){
    $status = poststatus::find($id);
    if(null != $status){

if($status->count()>0 && $status->id==1){
    return "<div class='badge badge-success'>".ucfirst($status->name)."</div>";
}else if($status->count()>0 && $status->id==2){
    return "<div class='badge badge-secondary'>".ucfirst($status->name)."</div>";
}else if($status->count()>0 && $status->id==3){
    return "<div class='badge badge-primary'>".ucfirst($status->name)."</div>";
}else if($status->count()>0 && $status->id==4){
    return "<div class='badge badge-warning'>".ucfirst($status->name)."</div>";
}
}else{
    return "unknown status";
}
}
function getRecentPosts(){

    $posts = jobpost::orderBy('id','desc')->limit(5)->get();

    $output = "";

    foreach($posts as $post){

        $output .= " 
        <tr>
        <th >
        <i class='fas fa-th'></i>
      </th>
          <th>Title</th>
          <th>Status</th>
          <th>Ending Date</th>
          <th>Action</th>
        </tr>
        <tr>
        <td>
           <div class='sort-handler'>
            <i class='fas fa-th'></i>
            </div>
            </td>
          <td class='font-weight-600'>".$post->job_title."</td>
          <td>".showPostStatus($post->status)."</td>
          <td>".$post->date_closing."</td>
          <td>
            <a href='admin/edit-job-post/".$post->id."' class='btn btn-primary'>view</a>
          </td>
        </tr>  ";   }

   
 return $output;
    
}
  function getCompanyJobs($company_id){
  $jobs = jobpost::where('company_id',$company_id)->get();
$output = "";
  if(isset($jobs)){
    foreach($jobs as $job){
        $output .= "
        <table class='table table-striped'>
        <tr>
        <th >
        <i class='fas fa-th'></i>
      </th>
          <th>Title</th>
          <th>Status</th>
          <th>Due Date</th>
          <th>Action</th>
        </tr>
        <tr>
        <td>
        <div class='sort-handler'>
         <i class='fas fa-th'></i>
         </div>
         </td>
          <td class='font-weight-600'>".$job->job_title."</td>
          <td>".showPostStatus($job->id)."</td>
          <td>".$job->created_at."</td>
          <td>
            <a href='/jobpost/".$job->id."' class='btn btn-primary'>view</a>
          </td>
        </tr>
      </table>
      </div>
      </div>
        ";
        }return $output;
  } else {
    
        $output .= "
        <table class='table table-striped'>
        <tr>
        <th >
        <i class='fas fa-th'></i>
      </th>
          <th>Title</th>
          <th>Status</th>
          <th>Due Date</th>
          <th>Action</th>
        </tr>
        
      </table>
      <div class='text-center p-5'>You do not have any job posts yet</div>
      </div>
      </div>
        ";
        return $output;
  }
  
  }

  function showUserRecentPost(){
 $posts = jobpost::where('status',1)->get();
    $output = " ";
    foreach($posts as $post){

      $output .="
      <table class='table table-striped'>
      <tr>
        <th>Job Title</th>
        <th>Date Opened</th>
        <th>Expiry Date</th>
        <th>Job Type</th>
        <th>Status</th>
        <th>Min. Salary</th>
        <th>Action</th>
      </tr>
      <tr>
        <td>".$post->job_title."</td>
        <td>".Carbon::parse($post->date_open)->diffForHumans()."</td>
        <td>".Carbon::parse($post->date_closing)->diffForHumans()."</td>
        <td>".getObjectName("type",$post->job_type)."</td>
        <td>".showPostStatus($post->status)."</td>
        <td>".number_format($post->salary_from)."</td>
        <td>
          <a href='../jobpost/".$post->id."' class='btn btn-primary'>View</a>
        </td>
      </tr> 
    </table>
      ";
    }
return $output;
  }
  ?>
