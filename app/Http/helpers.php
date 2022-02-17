<?php

use App\Models\Admin;
use App\Models\Jobrole;
use App\Models\User;


function getIdRowNumber($number)
{
   $numberOfUsers = User::where('id_type', $number)->count();
                return $numberOfUsers;
}
function getJobroleRowNumber($id)
{
   $numberOfUsers = User::where('job_role', $id)->count()??0;
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

  
  ?>
