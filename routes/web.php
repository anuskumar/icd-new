<?php

use App\Exports\SampleExport;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/college-details/{id?}', [HomeController::class, 'collegeDetails'])->name('website.college-details');
Route::get('/course-details/{id?}', [HomeController::class, 'courseDetails'])->name('website.course-details');
Route::get('/exam-details/{id?}', [HomeController::class, 'examDetails'])->name('website.exam-details');
Route::get('/contact-us', [ContactController::class, 'showContactForm'])->name('contact.show');
Route::post('/contact-us', [ContactController::class, 'submitContactForm'])->name('contact.submit');


// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// CKEditor upload route
Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');


// Route::get('/studentlist', [StudentController::class, 'studentlist'])->name('admin_panel.studentlist');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_panel.dashboard');
Route::get('/userlist', [AdminController::class, 'userlist'])->name('admin_panel.userlist');
Route::get('/get-userlist', [AdminController::class, 'get_userlist'])->name('admin_panel.get-userlist');
Route::any('/users/{id?}', [AdminController::class, 'users'])->name('admin_panel.users');
Route::any('/del-user/{id}', [AdminController::class, 'delUser'])->name('admin_panel.del-user');



Route::get('/student/dashboard', [StudentController::class, 'sdashboard'])->name('student_panel.student_dashboard');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin_panel.showLoginForm');
Route::post('login', [LoginController::class, 'login'])->name('admin_panel.login');
Route::any('logout', [LoginController::class, 'logout'])->name('logout');
Route::any('/signup', [LoginController::class, 'showRegistrationForm'])->name('admin_panel.signup');
Route::any('register', [LoginController::class, 'register'])->name('register');
Route::any('test', [LoginController::class, 'test'])->name('test');


Route::get('/category', [CategoryController::class, 'category'])->name('admin_panel.category');
Route::get('/get-category', [CategoryController::class, 'get_category'])->name('admin_panel.get-category');
Route::any('/manage-category/{id?}', [CategoryController::class, 'manageCategory'])->name('admin_panel.manage-category');
Route::any('/del-category/{id}', [CategoryController::class, 'delCategory'])->name('admin_panel.del-category');

Route::get('/subcategory', [SubcategoryController::class, 'subcategory'])->name('admin_panel.subcategory');
Route::get('/get-subcategory', [SubcategoryController::class, 'get_subcategory'])->name('admin_panel.get-subcategory');
Route::any('/manage-subcategory/{id?}', [SubcategoryController::class, 'manageSubcategory'])->name('admin_panel.manage-subcategory');
Route::any('/del-subcategory/{id}', [SubcategoryController::class, 'delSubcategory'])->name('admin_panel.del-subcategory');

Route::get('/exam-accepted', [ExamController::class, 'exam_accepted'])->name('admin_panel.exam-accepted');
Route::get('/get-exam-accepted', [ExamController::class, 'get_exam_accepted'])->name('admin_panel.get-exam-accepted');
Route::any('/manage-exam/{id?}', [ExamController::class, 'manageExam'])->name('admin_panel.manage-exam');
Route::any('/del-exam/{id}', [ExamController::class, 'delExam'])->name('admin_panel.del-exam');
Route::get('/category/{categoryId}/subcategory/{subcategoryId}/exam', [ExamController::class, 'showExamBySubcategory'])->name('subcategory.exam');


Route::get('/courselist', [CourseController::class, 'courselist'])->name('admin_panel.courselist');
Route::get('/get-courselist', [CourseController::class, 'get_courselist'])->name('admin_panel.get-courselist');
Route::any('/courses/{id?}', [CourseController::class, 'courses'])->name('admin_panel.courses');
Route::any('/del-course/{id}', [CourseController::class, 'delCourse'])->name('admin_panel.del-course');
Route::get('/category/{categoryId}/subcategory/{subcategoryId}/courses', [CourseController::class, 'showCoursesBySubcategory'])->name('subcategory.courses');
Route::get('course/{courseId}/exams', [CourseController::class, 'getExamsByCourse']);

Route::get('/collegelist', [CollegeController::class, 'collegelist'])->name('admin_panel.collegelist');
Route::get('/get-collegelist', [CollegeController::class, 'get_collegelist'])->name('admin_panel.get-collegelist');
Route::any('/colleges/{id?}', [CollegeController::class, 'colleges'])->name('admin_panel.colleges');
Route::any('/del-college/{id}', [CollegeController::class, 'delCollege'])->name('admin_panel.del-college');
Route::any('/edit-college-image', [CollegeController::class, 'editCollegeImage'])->name('admin_panel.college-image-edit');
Route::any('/edit-college-brochure', [CollegeController::class, 'editCollegeBrochure'])->name('admin_panel.brochure-edit');
Route::get('/get-state/{countryId}', [CollegeController::class, 'getState'])->name('getState');
Route::get('/get-cities/{stateId}', [CollegeController::class, 'getCities'])->name('getCity');
Route::post('/get-subcategories', [CollegeController::class, 'getSubcategories'])->name('getSubcategories');
Route::get('/category/{categoryId}/subcategory/{subcategoryId}/colleges', [CollegeController::class, 'showCollegesBySubcategory'])->name('subcategory.colleges');
Route::get('/get-institutetype', [CollegeController::class, 'getInstitutetype'])->name('getInstitutetype');

Route::delete('/delete-collagecourse', [CollegeController::class, 'delete_collagecourse'])->name('collagecourse.delete');


Route::get('/studentlist', [StudentController::class, 'studentlist'])->name('admin_panel.studentlist');
Route::get('/get-studentlist', [StudentController::class, 'get_studentlist'])->name('admin_panel.get-studentlist');
Route::any('/students/{id?}', [StudentController::class, 'students'])->name('admin_panel.students');
Route::any('/del-student/{id}', [StudentController::class, 'delStudent'])->name('admin_panel.del-student');
Route::any('/student-import', [StudentController::class, 'studentimport'])->name('admin_panel.student-import');




Route::get('/download-sample-file', [StudentController::class, 'downloadSampleFile'])->name('download-sample-file');
Route::post('/import-students', [StudentController::class, 'importStudents'])->name('import-students');




// web.php (Routes)
Route::post('/enroll', [EnrollmentController::class, 'enroll'])->name('enroll');
Route::get('/enrollmentDetails', [EnrollmentController::class, 'enrollmentDetails'])->name('enrollments.details');
Route::get('/student/enrollmentDetails', [EnrollmentController::class, 'studentEnrollmentDetails'])->name('student.enrollment.details');
Route::post('/enrollment/send-request', [EnrollmentController::class, 'sendRequest'])->name('enrollment.sendRequest');
Route::post('/enrollment/update-status', [EnrollmentController::class, 'updateStatus'])->name('enrollment.updateStatus');
Route::post('/student/confirm-upload/{enrollmentId}', [EnrollmentController::class, 'confirmUpload'])->name('student.confirmUpload');









Route::get('/testProfile', [StudentController::class, 'testing'])->name('profile.test');


//fetching states from ajax
Route::get('/getStates/{country_id}', [StudentController::class, 'getStates']);


//upload certificates

Route::get('/certificates/{student_id?}', [StudentController::class, 'certificates'])->name('student.certificates');
Route::get('/qualification/{qualificationId}/files', [StudentController::class, 'getQualificationFiles'])->name('student.qualification.files');
Route::post('/upload-certificate', [StudentController::class, 'uploadCertificate'])->name('student.upload.certificate');
Route::get('/download/certificate/{id}', [StudentController::class, 'downloadCertificate'])->name('student.download.certificate');
Route::delete('/delete/certificate/{id}', [StudentController::class, 'deleteCertificate'])->name('student.delete.certificate');



//admin viewing documents

Route::get('/admin/documents', [AdminController::class, 'documents'])->name('admin.documents');
Route::get('/admin/download/certificate/{id}', [AdminController::class, 'downloadCertificate'])->name('admin.download.certificate');



// Route::get('/college/{id?}', [CollegeController::class, 'showCollege'])->name('college.show');
Route::get('/college/{id}/{name?}', [CollegeController::class, 'showCollege'])->name('college.show');


// Route for filtered college data
Route::get('/list/colleges/{countryId}/{name?}', [CollegeController::class, 'listingCollege'])->name('listing.colleges');
// Route::post('/colleges/filter', [CollegeController::class, 'filterColleges'])->name('colleges.filter');
Route::get('/colleges/{id}/brochure', [CollegeController::class, 'downloadBrochure'])->name('college.brochure');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile.update');
    Route::post('/settings/password', [SettingsController::class, 'changePassword'])->name('settings.password.change');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/blog', [AdminBlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog', [AdminBlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/{id}/edit', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blog/{id}', [AdminBlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog/{id}', [AdminBlogController::class, 'destroy'])->name('admin.blog.destroy');

    Route::get('/courselist', [CourseController::class, 'courselist'])->name('admin_panel.courselist');
    Route::get('/get-courselist', [CourseController::class, 'get_courselist'])->name('admin_panel.get-courselist');
    Route::any('/courses/{id?}', [CourseController::class, 'courses'])->name('admin_panel.courses');
    Route::any('/del-course/{id}', [CourseController::class, 'delCourse'])->name('admin_panel.del-course');
});


Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function () {
    Route::get('/', [NotificationController::class, 'index'])->name('index');
    Route::get('/mark-as-read/{notification}', [NotificationController::class, 'markAsRead'])->name('mark-as-read');
    Route::get('/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('markAllAsRead');
});


Route::get('/clear-all', function () {
    // Clear application cache
    Artisan::call('cache:clear');

    // Clear route cache
    Artisan::call('route:clear');

    // Clear config cache
    Artisan::call('config:clear');

    // Clear compiled views
    Artisan::call('view:clear');

    // Clear compiled classes
    Artisan::call('clear-compiled');

    // Rebuild config cache (optional)
    Artisan::call('config:cache');

    return "<h3>✅ All caches cleared successfully!</h3>";
});









// Route::get('/admission', [AdmissionController::class, 'admission'])->name('admin_panel.admission');
// Route::get('/get-admission', [AdmissionController::class, 'get_admission'])->name('admin_panel.get-admission');
// Route::any('/manage-admission/{id?}', [AdmissionController::class, 'manageAdmission'])->name('admin_panel.manage-admission');
// Route::any('/del-admission/{id}', [AdmissionController::class, 'delAdmission'])->name('admin_panel.del-admission');
