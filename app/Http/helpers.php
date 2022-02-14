<?php

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

  ?>
