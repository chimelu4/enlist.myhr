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

  ?>
