<?php

use App\Models\accounts;
use App\Models\accounttransactions;
use App\Models\Allbank;
use App\Models\Allwallet;
use App\Models\ammortization;
use App\Models\Banktransaction;
use App\Models\capital;
use App\Models\Cashtransaction;
use App\Models\Clusters;
use App\Models\Exceptiontypes;
use App\Models\Expenses;
use App\Models\Expensestype;
use App\Models\messages;
use App\Models\User;
use App\Models\Jobrole;
use App\Models\lien;
use Carbon\Carbon;
use App\Models\master;
use App\Models\Operators;
use App\Models\Outlets;
use App\Models\report;
use App\Models\Wallettransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;



        function totalRevenueMonthly($month){
           
           
            $revenue = master::where('method','revenue')->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at','=',$month)->sum('amount')??0;
            return $revenue;
          }
            function getTotalShortage(){
           
           
            $shortage = master::where('method','shortage')->whereYear('created_at', '=', Carbon::now()->year)->sum('amount')??0;
            return $shortage;
          }  
          
          function getTotalSurplus(){
           
           
            $surplus = master::where('method','surplus')->whereYear('created_at', '=', Carbon::now()->year)->sum('amount')??0;
            return $surplus;
          } 
          
          function getTotalDebt(){
           
           
            $loan = master::where('method','loan')->whereYear('created_at', '=', Carbon::now()->year)->sum('amount')??0;
            return $loan;
          }
        function totalOpexMonthly($month){          
            
            $opex = Expensestype::where('category','opex')->get('id');
            $data = Expenses::whereIn('expenses_type',$opex)->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at','=',$month)->sum('amount')??0;
            return $data;
          } 
          
          function getTotalRent(){          
            
            $rent = ammortization::where('title','rent')->where('status',1)->sum('ammortized_amount');
            //data = Expenses::whereIn('expenses_type',$opex)->whereYear('created_at', '=', Carbon::now()->year)->sum('amount')??0;
            return $rent;
          }
          
          function getTotalCapital(){          
            
            
            $data = capital::whereYear('created_at', '=', Carbon::now()->year)->sum('amount')??0;
            return number_format($data);
          } 

           function totalCapexMonthly($month){
           
            $capex = Expensestype::where('category','capex')->get('id');
            $data = Expenses::whereIn('expenses_type',$capex)->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at','=',$month)->sum('amount')??0;
            return $data;
          } 
          
          
          
          function totalBankChargesMonthly($month){
           
            $charges = Expensestype::where('category','charges')->get('id');
            $data = Expenses::whereIn('expenses_type',$charges)->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at','=',$month)->sum('amount')??0;
            return $data;
          }  
          
          function totalExpenses($month){
           
            $data = totalOpexMonthly($month)+totalBankChargesMonthly($month)+totalSalaryMonthly($month);
            return $data;
          }
          
          function totalIncome($month){
           
            $data = totalRevenueMonthly($month) - totalExpenses($month);
            return $data;
          }  
          
          function savings($month,$percent){
           
            $data =($percent/100)*totalIncome($month);
            return $data;
          } 
          
          function totalSalaryMonthly($month){

            $data = User::whereYear('created_at', '<=', Carbon::now()->year)->whereMonth('created_at','<=',$month)->sum('salary')??0;
            return $data;
          }

          function balanceExpensesAccount($month){
           
            //$expenseAccount_id = accounts::where('name','expenses account')->first()->id;
            $expenseAccountBalance = accounttransactions::where('account_id',3)->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at','=',$month)->latest('created_at')->first()->balance??0;
            $data = savings($month,20)+$expenseAccountBalance;
            return $data;
          }  
          
          function balanceReinvestAccount($month){
           
            //$reInvestAccount_id = accounts::where('id','Re-Investment Account')->first()->id;
            $expenseAccountBalance = accounttransactions::where('account_id',9)->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at','=',$month)->latest('created_at')->first()->balance??0;
            $data = savings($month,10)+$expenseAccountBalance;
            return $data;
          }   
          
          function floatingAccount($month){
           
            //$floatingAccount_id = accounts::where('name','Floating Capital Account')->first()->id;
            $floatingAccountBalance = accounttransactions::where('account_id',2)->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at','=',$month)->latest('created_at')->first()->balance??0;
            $data = $floatingAccountBalance;
            return $data;
          }  

          function totalOutletsMonthly($month){
           $Total = Outlets::whereYear('created_at', '<=', Carbon::now()->year)->whereMonth('created_at','<=',$month)->count();
           
            return $Total;
           }
           
           function averageMonthlyRevenue($month){
           $Total = Outlets::whereYear('created_at', '<=', Carbon::now()->year)->whereMonth('created_at','<=',$month)->count();
           
            return totalRevenueMonthly($month)>0?totalRevenueMonthly($month)/$Total:0.0;
           }

           function averageMonthlyIncome($month){
           $Total = Outlets::whereYear('created_at', '<=', Carbon::now()->year)->whereMonth('created_at','<=',$month)->count();
           
            return totalIncome($month)>0?totalIncome($month)/$Total:0.0;
           }

           //this area is for dashboard stats

          function getBusinessStatDaily($type){
            if($type == 'deposit'){
          $depositToday = master::where('method','deposit')->where('created_at','>=', Carbon::today()->toDateString())->sum('amount');
           return $depositToday;
            }else if($type == 'transfer'){
              $transferToday = master::where('method','transfer')->where('created_at','>=', Carbon::today()->toDateString())->sum('amount');
              return $transferToday;
            }else if($type == 'withdrawal'){
              $withdrawalToday = master::where('method','withdrawal')->where('created_at','>=', Carbon::today()->toDateString())->sum('amount');
              return $withdrawalToday;
            }else if($type =='capex' ){
              $capex = Expensestype::where('category','capex')->get('id');
           $data = Expenses::whereIn('expenses_type',$capex)->whereDay('created_at',Carbon::now()->day)->sum('amount')??0;
             return $data;
            }else if($type =='opex' ){
              $opex = Expensestype::where('category','opex')->get('id');
           $data = Expenses::whereIn('expenses_type',$opex)->whereDay('created_at',Carbon::now()->day)->sum('amount')??0;
           return $data;
            }else if($type =='salary' ){
            $data = accounttransactions::where('account_id',6)->whereDay('created_at',Carbon::now()->day)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->sum('deposit')??0;
            
           
            }else if($type =='ammortization' ){
             $ammortization = ammortization::where('status',1)->whereDay('created_at',Carbon::now()->day)->whereMonth('created_at',Carbon::now()->month)->whereyear('created_at',Carbon::now()->year)->sum('ammortized_amount');
              return $ammortization;
            }else if($type =='revenue' ){
           $data = master::where('method','revenue')->where('created_at','=>',Carbon::now())->sum('amount')??0;
           return $data;
            }else if($type =='variance' ){
              $data = master::where('method','variance')->where('created_at','=>',Carbon::now())->sum('amount')??0;
              return $data;
            }

           }
           
           
           function getBusinessStatMonthly($type){
            if($type == 'deposit'){
              $depositToday = master::where('method','deposit')->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->sum('amount');
               return $depositToday;
                }else if($type == 'transfer'){
                  $transferToday = master::where('method','transfer')->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->sum('amount');
                  return $transferToday;
                }else if($type == 'withdrawal'){
                  $withdrawalToday = master::where('method','withdrawal')->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->sum('amount');
                  return $withdrawalToday;
                }else if($type =='capex' ){
              $capex = Expensestype::where('category','capex')->get('id');
           $data = Expenses::whereIn('expenses_type',$capex)->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->sum('amount')??0;
             return $data;
            }else if($type =='opex' ){
              $opex = Expensestype::where('category','opex')->get('id');
          $data = Expenses::whereIn('expenses_type',$opex)->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->sum('amount')??0;
            return $data;
            }else if($type =='salary' ){
              $data = accounttransactions::where('account_id',6)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->sum('deposit')??0;
              
             
              }else if($type =='ammortization' ){
               $ammortization = ammortization::where('status',1)->whereMonth('created_at',Carbon::now()->month)->whereyear('created_at',Carbon::now()->year)->sum('ammortized_amount');
                return $ammortization;
              }else if($type =='revenue' ){
           $data = master::where('method','revenue')->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->sum('amount')??0;
           return $data;
            }else if($type =='variance' ){
              $data = master::where('method','variance')->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->sum('amount')??0;
              return $data;
            }

           }     
           
           function getBusinessStatYearly($type){
            if($type == 'deposit'){
              $depositToday = master::where('method','deposit')->whereYear('created_at',Carbon::now()->year)->sum('amount');
               return $depositToday;
                }else if($type == 'transfer'){
                  $transferToday = master::where('method','transfer')->whereYear('created_at',Carbon::now()->year)->sum('amount');
                  return $transferToday;
                }else if($type == 'withdrawal'){
                  $withdrawalToday = master::where('method','withdrawal')->whereYear('created_at',Carbon::now()->year)->sum('amount');
                  return $withdrawalToday;
                }else if($type =='capex' ){
              $capex = Expensestype::where('category','capex')->get('id');
           $data = Expenses::whereIn('expenses_type',$capex)->whereYear('created_at',Carbon::now()->year)->sum('amount')??0;
             return $data;
            }else if($type =='opex' ){
              $opex = Expensestype::where('category','opex')->get('id');
          $data = Expenses::whereIn('expenses_type',$opex)->whereYear('created_at',Carbon::now()->year)->sum('amount')??0;
            return $data;
            }else if($type =='salary' ){
              $data = accounttransactions::where('account_id',6)->whereYear('created_at',Carbon::now()->year)->orderBy('created_at','desc')->first()->balance??0;
            return $data;
            }else if($type =='ammortization' ){
               $ammortization = ammortization::where('status',1)->whereyear('created_at',Carbon::now()->year)->sum('ammortized_amount');
                return $ammortization;
              }else if($type =='revenue' ){
           $data = master::where('method','revenue')->whereYear('created_at',Carbon::now()->year)->sum('amount')??0;
           return $data;
            }else if($type =='variance' ){
              $data = master::where('method','variance')->whereYear('created_at',Carbon::now()->year)->sum('amount')??0;
              return $data;
            }

           }


          function getTotalLien(){
            $lien = lien::sum('amount');

            return number_format($lien)??0;
          }
?>
