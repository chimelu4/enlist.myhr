<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AccounttypeController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\JobroleController;
use App\Http\Controllers\UserAuthController;
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
Route::get('/logout', [UserAuthController::class, 'index'])
    ->name('user.logout');
    Route::get('user/forgot-my-password', [UserAuthController::class, 'forgot']);
    Route::post('user/signup', [UserAuthController::class, 'registerUser'])
    ->name('user.signup');
    Route::post('/user/checkreg', [HomeController::class, 'checkReg']);



Route::get('admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login');
Route::post('admin/register', [AdminAuthController::class, 'registerUser'])
    ->name('admin.register');
Route::post('admin/signin', [AdminAuthController::class, 'handleLogin'])
    ->name('admin.signin');
Route::get('admin/logout', [AdminAuthController::class, 'index'])
    ->name('admin.logout');
    Route::get('admin/forgot-my-password', [AdminAuthController::class, 'forgot']);

    Route::get('/check-username/{un}', [UsersController::class,'checkUsername']);//this checks username an id's    
    Route::get('/check-email/{em}', [UsersController::class,'checkemail']);//this checks email an id's
    Route::get('/check-phone/{ph}', [UsersController::class,'checkphone']);//this checks phone an id's

Route::middleware(['middleware'=> 'auth:web'])->group(function () {  
  Route::get('/user/dashboard', [UserAuthController::class, 'home'])
  ->name('user.dashboard');

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

  Route::get('/admin/all-staff', [AdminAuthController::class,'all']);
  Route::get('/admin/add-staff', [AdminAuthController::class,'create']); //shows create form
  Route::get('/admin/edit-staff/{id}', [AdminAuthController::class,'editStaff']);//this shows single row for staff edit
  Route::post('/admin/update/staff', [AdminAuthController::class,'updateStaff']);//this updates jobrole value
    

  
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

