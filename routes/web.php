<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperinceController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessorController;
use App\Http\Controllers\DepartmentCoordinatorController;
use App\Http\Controllers\CollegeCoordinatorController;
use App\Http\Controllers\AcceptedApplicantsController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\InterviewScheduleController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CredentialController;
use App\Http\Controllers\Admin\ApplicantController;




use App\Models\Post;
use App\Models\Slider;



    // applicants pages
   
   // 1. Anonymous function version (with no data)
Route::get('/', function () {
    return view('homepage');
});

// 2. Controller version
Route::get('/', [HomeController::class, 'index'])->name('home');

// 3. Redundant
Route::get('/homepage', [HomeController::class, 'showHomePage'])->name('homepage');

    Route::view('/mission-vision', 'pages.mission-vision')->name('mission.vision');
    Route::view('/admission-requirements', 'pages.admission-requirements')->name('admission.requirements');
    Route::view('/qualification', 'pages.qualification')->name('qualification');
    Route::view('/procedures', 'pages.procedures')->name('procedures');
    Route::view('/courses-offered', 'pages.courses-offered')->name('courses.offered');
    
    Route::middleware(['auth', 'verified'])->group(function ()  {
    Route::get('/terms', function () {
        return view('auth.terms');
    })->middleware('guest')->name('terms');

    Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('register');
    Route::post('/register', [UserController::class, 'store'])->middleware('guest');
    Route::get('/posts', [AnnouncementController::class, 'index'])->name('posts.index');

    Route::get('/information', [InformationController::class, 'show'])->name('information');
    Route::get('/education', [EducationController::class, 'show'])->name('education');
    Route::get('/experince', [ExperinceController::class, 'show'])->name('experince');
    Route::get('/awards', [AwardsController::class, 'show'])->name('awards');
    Route::get('/work', [WorkController::class, 'show'])->name('work');

     // Authenticated user routes
  
    // User Application
    Route::get('/application', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('/application/store', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/application/{id}/edit', [ApplicationController::class, 'edit'])->name('application.edit');
    Route::put('/application/{id}', [ApplicationController::class, 'update'])->name('application.update');
    Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::get('/application/view/{id}', [ApplicationController::class, 'view'])->name('application.view');
    Route::post('/upload-requirement', [RequirementController::class, 'upload'])->name('requirement.upload');
    Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');



    // Requirements
    Route::post('/requirement/upload', [RequirementController::class, 'upload'])->name('requirement.upload');
    Route::post('/upload-requirement', [RequirementController::class, 'upload'])->name('upload.requirement');

    // Profile
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User dashboard
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/applications', [UserController::class, 'index'])->name('user.index');

    });

    // Admin routes
    Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/applications', [AdminController::class, 'applications'])->name('admin.applications');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index'); // <- fixed the route name
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
    Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/home', [AdminController::class, 'adminHome'])->name('admin.home');
    //edit admin account
    // routes/web.php
    Route::get('admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');

    //post delete
    Route::resource('admin/announcement', AnnouncementController::class);
    Route::delete('admin/announcement/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcement.destroy');
    
    // create store slider
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('slider', SliderController::class);
 
        Route::get('/', [SliderController::class, 'index'])->name('index'); // <--- THIS IS WHAT YOU NEED
        Route::get('/create', [SliderController::class, 'create'])->name('create');
        Route::post('/', [SliderController::class, 'store'])->name('store');
        Route::delete('/{id}', [SliderController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/edit', [SliderController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SliderController::class, 'update'])->name('update');
        Route::delete('admin/slider/{id}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
        Route::resource('admin/slider', App\Http\Controllers\Admin\SliderController::class);
    });
    
 
    


    // Admin application management
    Route::get('/application/{id}', [AdminController::class, 'view'])->name('admin.application.view');
    Route::put('/application/{id}/accept', [AdminController::class, 'accept'])->name('admin.application.accept');
    Route::put('/application/{id}/reject', [AdminController::class, 'reject'])->name('admin.application.reject');
    Route::put('/application/{id}/unreject', [AdminController::class, 'unreject'])->name('admin.application.unreject');

    // Schedule management
    
    Route::get('/admin/schedule/reschedule/{id}', [InterviewScheduleController::class, 'showRescheduleForm'])->name('schedule.reschedule');
    Route::get('/schedule/reschedule/{id}', [InterviewScheduleController::class, 'form'])->name('schedule.reschedule.form');

    Route::get('/admin/schedule/form/{id}', [InterviewScheduleController::class, 'form'])->name('interview.schedule.form');
    Route::get('/admin/accepted-applicants', [AcceptedApplicantsController::class, 'index'])->name('accepted_applicants.index');
Route::put('/schedule/reschedule/{id}', [InterviewScheduleController::class, 'updateReschedule'])->name('schedule.updateReschedule');
        
    
    // Accepted applicants
    Route::get('/accepted-applicants', [AcceptedApplicantsController::class, 'index'])->name('admin.accepted.applicants');
    
    // Announcement
    Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('admin.announcement.create');
    Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('admin.announcement.store');
    Route::post('/announcement/upload-image', [AnnouncementController::class, 'uploadImage'])->name('admin.announcement.uploadImage');

    // Image upload (ckeditor)
    Route::post('/ckeditor/upload', [AnnouncementController::class, 'upload'])->name('ckeditor.upload');

    // edit admin user
    
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/update/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    });

    // Interview schedule
    Route::resource('schedule', InterviewScheduleController::class);
    Route::post('/schedule/bulk', [InterviewScheduleController::class, 'bulkSchedule'])->name('schedule.bulk');

    // Assessor routes
    Route::middleware(['auth'])->prefix('assessor')->group(function () {
    Route::get('/dashboard', [AssessorController::class, 'index'])->name('assessor.dashboard');
    Route::get('/application/{id}', [AssessorController::class, 'view'])->name('assessor.application.view');
    Route::put('/application/{id}/accept', [AssessorController::class, 'accept'])->name('assessor.application.accept');
    Route::put('/application/{id}/reject', [AssessorController::class, 'reject'])->name('assessor.application.reject');
    });

    // Department Coordinator
    Route::middleware(['auth'])->prefix('department')->group(function () {
    Route::get('/dashboard', [DepartmentCoordinatorController::class, 'index'])->name('department.dashboard');
    Route::get('/application/{id}', [DepartmentCoordinatorController::class, 'view'])->name('department.application.view');
    Route::put('/application/{id}/accept', [DepartmentCoordinatorController::class, 'accept'])->name('department.application.accept');
    Route::put('/application/{id}/reject', [DepartmentCoordinatorController::class, 'reject'])->name('department.application.reject');
    });

    // College Coordinator
    Route::middleware(['auth'])->prefix('college')->group(function () {
    Route::get('/dashboard', [CollegeCoordinatorController::class, 'index'])->name('college.dashboard');
    Route::get('/application/{id}', [CollegeCoordinatorController::class, 'view'])->name('college.application.view');
    Route::put('/application/{id}/accept', [CollegeCoordinatorController::class, 'accept'])->name('college.application.accept');
    Route::put('/application/{id}/reject', [CollegeCoordinatorController::class, 'reject'])->name('college.application.reject');
    });

    // Auth routes (login, register, forgot password, etc)

    //credentials
    Route::get('/admin/credentials/view/{id}', [CredentialController::class, 'show'])->name('credentials.view');

    // Route::post('/admin/applicants/{id}/degree-program', [ApplicantController::class, 'updateDegreeProgram'])->name('admin.applicants.updateDegreeProgram');

    Route::put('/admin/applications/{id}/update-degree', [\App\Http\Controllers\Admin\ApplicantController::class, 'updateDegree'])->name('applications.updateDegree');

    require __DIR__.'/auth.php';
