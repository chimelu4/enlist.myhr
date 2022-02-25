<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AccounttypeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AllcvController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\JobpostController;
use App\Http\Controllers\JobroleController;
use App\Http\Controllers\JobtypesController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserAuthController;
use App\Models\application;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


 
Route::get('/register/{type}', [UserAuthController::class, 'register'])
    ->name('user.register');
    Route::get('/login', [UserAuthController::class, 'login'])
    ->name('user.login');
Route::post('/signin', [UserAuthController::class, 'handleLogin'])
    ->name('user.signin');
Route::get('/logout', [UserAuthController::class, 'logout'])
    ->name('user.logout');
    Route::get('user/forgot-my-password', [UserAuthController::class, 'forgot']);
    Route::post('user/signup', [UserAuthController::class, 'registerUser'])
    ->name('user.signup');
    Route::post('/user/checkreg', [HomeController::class, 'checkReg']);
    Route::post('/download-cv', [AllcvController::class, 'index']);


Route::get('admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login');
Route::post('admin/register', [AdminAuthController::class, 'registerUser'])
    ->name('admin.register');
Route::post('admin/signin', [AdminAuthController::class, 'handleLogin'])
    ->name('admin.signin');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');
    Route::get('admin/forgot-my-password', [AdminAuthController::class, 'forgot']);

    Route::get('/check-username/{un}', [UsersController::class,'checkUsername']);//this checks username an id's    
    Route::get('/check-email/{em}', [UsersController::class,'checkemail']);//this checks email an id's
    Route::get('/check-phone/{ph}', [UsersController::class,'checkphone']);//this checks phone an id's

Route::middleware(['middleware'=> 'auth:web'])->group(function () {

  Route::get('/user/dashboard', [UserAuthController::class, 'home'])
  ->name('user.dashboard');
  Route::get('/user/job/apply/{id}',[ApplicationController::class,'index']);
  Route::post('/user/job/apply',[ApplicationController::class,'store']);
  Route::get('/user/notifications', [NotificationController::class,'indexUser']);
  Route::get('/user/notifications-mark-read', [NotificationController::class,'read']);
  Route::get('/user/search/{text}', [LinkController::class,'userSearch']);//this checks username an id's

  Route::get('/user/about', [UserAuthController::class,'about']);//this shows single row for staff edit
  Route::get('/user/mycompany', [UserAuthController::class,'mycompany']);//this shows single row for staff edit
  Route::post('/user/update/company', [UserAuthController::class,'updateCompany']);//this updates jobrole value

  Route::get('/user/company/hires', [UserAuthController::class,'myhires']);//this updates jobrole value

  Route::get('/user/cv', [UserAuthController::class,'cv']);//this shows single row for staff edit
  Route::post('/user/upload/cv', [AllcvController::class,'uploadCV']);//this shows single row for staff edit
  Route::post('/user/update/profile', [UserAuthController::class,'updateProfile']);//this updates jobrole value
  
 Route::post('/user/security-check-password-change', [UserAuthController::class,'passwordchange']);//this delete a user
 Route::get('/user/all-jobs', [UsersController::class,'alljobs']);//this delete a user

 Route::get('/user/raise-support', [SupportController::class,'create']);//this delete a user
 Route::post('/user/post-support', [SupportController::class,'store']);//this delete a user
 

});

 Route::middleware(['middleware'=> 'auth:webadmin'])->group(function () {  
  
  Route::get('admin/dashboard', [AdminAuthController::class, 'home'])
  ->name('admin.dashboard');
  Route::post('/admin/save-job-role', [JobroleController::class,'store']);
  Route::get('/admin/all-job-role', [JobroleController::class,'index']);
  Route::get('/admin/edit-jobrole/{id}', [JobroleController::class,'edit']);//this shows single row for edit
  Route::get('/admin/delete-jobrole/{id}', [JobroleController::class,'destroy']);//this delete an id's
  Route::any('/admin/update-jobrole', [JobroleController::class,'update']);//this updates jobrole value


  Route::any('/admin/all-employers', [AccounttypeController::class,'index']);//this updates jobrole value
  Route::any('/admin/edit-employer/{id}', [AccounttypeController::class,'editEmployer']);//this updates jobrole value
  Route::post('/admin/update/user', [AccounttypeController::class,'updateUser']);//this updates jobrole value
  Route::post('/admin/update/company', [AccounttypeController::class,'updateCompany']);//this updates jobrole value
  Route::post('/admin/create/employer', [AccounttypeController::class,'createEmployer']);//this updates jobrole value
  Route::get('/admin/delete/employer/{id}', [AccounttypeController::class,'deleteEmployer']);//this updates jobrole value
  Route::get('/admin/add/employer', [AccounttypeController::class,'addEmployer']);//this updates jobrole value
 
  //candidates
  Route::any('/admin/all-candidates', [AccounttypeController::class,'indexCandidate']);//this updates jobrole value
  Route::any('/admin/edit-candidate/{id}', [AccounttypeController::class,'editCandidate']);//this updates jobrole value
  Route::post('/admin/create/candidate', [AccounttypeController::class,'createCandidate']);//this updates jobrole value
  Route::post('/admin/create/staff', [AdminAuthController::class,'store']);//this updates jobrole value
  Route::get('/admin/delete/candidate/{id}', [AccounttypeController::class,'deleteCandidate']);//this updates jobrole value
  Route::get('/admin/add/candidate', [AccounttypeController::class,'addCandidate']);//this updates jobrole value
 Route::post('/admin/reset-user-password/{id}', [AccounttypeController::class,'reset']);//this delete a user
 Route::post('/admin/security-check-password-change', [AdminAuthController::class,'passwordchange']);//this delete a user
 Route::post('/admin/reset-admin-password/{id}', [AdminAuthController::class,'reset']);//this delete a user
  Route::get('/admin/activate-ban-user/{id}', [AccounttypeController::class,'toggleActiveUser']);//this updates jobrole value

  Route::get('/admin/activate-ban-staff/{id}', [AdminAuthController::class,'toggleActiveUser']);//this updates jobrole value
  Route::get('/admin/all-staff', [AdminAuthController::class,'all']);
  Route::get('/admin/add-staff', [AdminAuthController::class,'create']); //shows create form
  Route::get('/admin/edit-staff/{id}', [AdminAuthController::class,'editStaff']);//this shows single row for staff edit
  Route::post('/admin/update/staff', [AdminAuthController::class,'updateStaff']);//this updates jobrole value

  //industries
  Route::get('/admin/all-industries', [IndustryController::class,'index']);//this updates value
  Route::post('/admin/store-industry', [IndustryController::class,'store']);//this updates value
  Route::get('/admin/get-industry-value/{id}', [IndustryController::class,'show']);//this updates value
  Route::post('/admin/update-industry', [IndustryController::class,'update']);//this updates value
  Route::get('/admin/delete-industry/{id}', [IndustryController::class,'destroy']);//this updates value
  
  //job types
  Route::get('/admin/all-applications', [ApplicationController::class,'show']);//this updates value
  Route::get('/view-single-application/{id}', [ApplicationController::class,'showSingle']);//this updates value
  Route::get('/admin/delete-application/{id}', [ApplicationController::class,'destroy']);

  Route::get('/admin/assign-job/{id}', [ApplicationController::class,'assign']);//this updates value
  Route::get('/admin/reject-job/{id}', [ApplicationController::class,'reject']);//this updates value
  

  Route::get('/admin/all-job-types', [JobtypesController::class,'index']);//this updates value
  Route::post('/admin/store-job-type', [JobtypesController::class,'store']);//this updates value
  Route::get('/admin/get-job-type-value/{id}', [JobtypesController::class,'show']);//this updates value
  Route::post('/admin/update-job-type', [JobtypesController::class,'update']);//this updates value
  Route::get('/admin/delete-job-type/{id}', [JobtypesController::class,'destroy']);//this updates value
  
  //qualifiationsQualification
  Route::get('/admin/all-qualifications', [QualificationController::class,'index']);//this updates value
  Route::post('/admin/store-qualification', [QualificationController::class,'store']);//this updates value
  Route::get('/admin/get-qualification-value/{id}', [QualificationController::class,'show']);//this updates value
  Route::post('/admin/update-qualification', [QualificationController::class,'update']);//this updates value
  Route::get('/admin/delete-qualification/{id}', [QualificationController::class,'destroy']);//this updates value 
  
  //job posts
  Route::get('admin/all-job-posts', [JobpostController::class,'index']);//this updates value
  Route::get('/admin/post-job', [JobpostController::class,'create']);//this updates value
  Route::post('/admin/store-post', [JobpostController::class,'store']);//this updates value
  Route::get('/admin/edit-job-post/{id}', [JobpostController::class,'edit']);//this updates value
  Route::post('/admin/update-post', [JobpostController::class,'update']);//this updates value
  Route::get('/admin/delete-post/{id}', [JobpostController::class,'destroy']);

  Route::get('/admin/notifications', [NotificationController::class,'index']);
  Route::get('/admin/notifications-mark-read', [NotificationController::class,'read']);

  Route::get('/admin/search/{text}', [LinkController::class,'index']);//this checks username an id's
  Route::get('/admin/get-user-info/{id}/{type}', [LinkController::class,'getUserInfo']);//this checks username an id's


  Route::get('/admin/reviews', [SupportController::class,'index']);//this checks username an id's
  Route::get('/admin/view-ticket/{id}', [SupportController::class,'show']);//this checks username an id's


  
  Route::post('/admin/save-id-type', [IdentificationController::class,'store']);// this enters tp db, call by form
  Route::get('/admin/all-id-type', [IdentificationController::class,'index']);//this shows all id's
  Route::get('/admin/edit-id-type/{id}', [IdentificationController::class,'edit']);//this shows single row for edit
  Route::any('/admin/update-id-type', [IdentificationController::class,'update']);//this updates identity value
  Route::get('/admin/delete-id-type/{id}', [IdentificationController::class,'destroy']);//this delete an id's Route::get('/all-id-type', [IdentificationController::class,'create']);//this shows create form
 

});

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/about',[HomeController::class,'about']);
Route::get('/services',[HomeController::class,'service']);
Route::get('/pricing',[HomeController::class,'pricing']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/jobpost/{id}',[HomeController::class,'postDetails']);
Route::get('forgot-my-password', [HomeController::class,'forgotPassword']);
Route::post('/reset-password-post', [HomeController::class,'resetPassword']); //filters admin and mobile users
Route::get('/check-admin-login/{email}/{password}', [HomeController::class,'checkAdmin']); //filters admin and mobile users
//Route::POST('/check-user-reg', [HomeController::class,'checkReg']); //filters admin and mobile users
//Route::get('/change-password', function () {
  /* 

if (Auth::check()) {
  //report_it("Opened changed Password form");
   return view('auth.change-password');

}else{
 return redirect()->back();
 
}
  }); */
 

/* //auth required
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class,'redirect'])->name('dashboard');
Route::middleware(['middleware'=> 'auth'])->group(function () {  
 
  
  Route::get('/search/{text}', [HomeController::class,'search']);//this checks username an id's
 Route::post('/change-password-post', [HomeController::class,'changePassword']); //filters admin and mobile users
 Route::get('/retore-delete/{id}/{table}', [HomeController::class,'restoreDelete']); //filters admin and mobile users
 Route::get('/ignore-delete', [HomeController::class,'ignoreDelete']); //filters admin and mobile users
    Route::get('/scorecard', [HomeController::class,'showscorecard']);
    
    Route::post('/save-job-role', [JobroleController::class,'store']);
    Route::get('/all-job-role', [JobroleController::class,'index']);
    Route::get('/edit-jobrole/{id}', [JobroleController::class,'edit']);//this shows single row for edit
    Route::get('/delete-jobrole/{id}', [JobroleController::class,'destroy']);//this delete an id's
    Route::any('/update-jobrole', [JobroleController::class,'update']);//this updates jobrole value
    
    Route::post('/save-id-type', [IdentificationController::class,'store']);// this enters tp db, call by form
    Route::get('/all-id-type', [IdentificationController::class,'index']);//this shows all id's
    Route::get('/edit-id-type/{id}', [IdentificationController::class,'edit']);//this shows single row for edit
    Route::any('/update-id-type', [IdentificationController::class,'update']);//this updates identity value
    Route::get('/delete-id-type/{id}', [IdentificationController::class,'destroy']);//this delete an id's Route::get('/all-id-type', [IdentificationController::class,'create']);//this shows create form
   
    
// form
   
  
    
    
    
   
    Route::post('/security-check-password-change', [UsersController::class,'passwordchange']); //shows create form
    Route::post('/add-user', [UsersController::class,'store']); //saves a new user
    Route::post('/update-user', [UsersController::class,'update']); //updates a  user record
    Route::post('/activate-staff/{id}', [UsersController::class,'toggleActive']); //activates or ban a user
    Route::get('/check-username-email-phone/{un}/{em}/{ph}', [UsersController::class,'checkforunique']);//this checks phone an id's
   Route::get('/add-guarantor/{bid}', [UsersController::class,'add_guarantor_one']);//this redirect route from create user
    Route::get('/delete-user/{id}', [UsersController::class,'destroy']);//this delete a user
    Route::post('/reset-user-password/{id}', [UsersController::class,'reset']);//this delete a user
    Route::get('/restore-user/{id}', [UsersController::class,'restore']);//this delete an id's 
    
    
 
  }); */

//Route::get('/', [HomeController::class,'index']);

Route::get('clear-cache', function () {
  Artisan::call('storage:link');
  Artisan::call('route:clear');
  Artisan::call('cache:clear');
  Artisan::call('view:clear');
  Artisan::call('config:clear');
  //Create storage link on hosting
  $exitCode = Artisan::call('storage:link', []);
  echo $exitCode; // 0 exit code for no errors.
});

Route::get('/update', function()
{
    exec('composer dump-autoload');
    echo 'app updated successfully';
});

Route::get('save-cache', function () {
  Artisan::call('route:cache');
  Artisan::call('config:cache');
  Artisan::call('view:cache');
  Artisan::call('event:clear');
});

