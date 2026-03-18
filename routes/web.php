<?php


use App\Models\Book;


use App\Models\User;
use App\Models\Category;
use App\Models\Borrowing;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EquipClassController;
use App\Http\Controllers\EquipPlantController;
use App\Http\Controllers\EquipGrowController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoProgressController;
use App\Http\Controllers\AccessRequestController;
use App\Http\Controllers\Fc1McRequestController;
use App\Http\Controllers\Fc2Fc3RequestController;
use App\Http\Controllers\Grade1RequestController;
use App\Http\Controllers\Grade2RequestController;
use App\Http\Controllers\Grade3RequestController;
use App\Http\Controllers\MarriageClassRequestController;


// Test route untuk memastikan Laravel berfungsi
Route::get('/test', function () {
    return response()->json(['message' => 'Laravel is working!']);
});

Route::get('/', function () {
    return redirect()->route('login');
})->name('show.login');

Route::post('login', [AuthController::class , 'login'])->name('user.login');
Route::get('login', [AuthController::class , 'showLoginForm'])->name('login');


// Forgot password & reset password
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

Route::get('/password/forgot', [ForgotPasswordController::class , 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class , 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class , 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class , 'reset'])->name('password.update');

Route::post('logout', [AuthController::class , 'logout'])->name('logout');
Route::get('signup', [AuthController::class , 'formregistrasi'])->name('member.register');
Route::post('register', [AuthController::class , 'store'])->name('store.member');

// Halaman Equip Class dapat diakses publik
Route::get('/equip-class', [EquipClassController::class , 'index'])->name('equipClass.index');
Route::get('/equip-plant', [EquipPlantController::class , 'index'])->name('equipPlant.index');
Route::get('/equip-grow', [EquipGrowController::class , 'index'])->name('equipGrow.grade1');



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');
    Route::get('/equip', [EquipController::class , 'index'])->name('equip');
    // Route dipindahkan ke luar middleware auth


    // Route::get('/home',[HomeController::class, 'index'])->name('home');

    Route::get('users', [UserController::class , 'index'])->name('users.index');
    Route::get('users/{id}/detail', [UserController::class , 'detail'])->name('users.detail');
    Route::get('users/create', [UserController::class , 'create'])->name('users.create');
    Route::post('users', [UserController::class , 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class , 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class , 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class , 'destroy'])->name('users.destroy');


    Route::get('/home', [MemberController::class , 'index'])->name('member');
    Route::get('/users/member', [MemberController::class , 'memberView'])->name('users.member');




    Route::get('books', [BookController::class , 'index'])->name('books.index');
    Route::get('books/create', [BookController::class , 'create'])->name('books.create');
    Route::post('books', [BookController::class , 'store'])->name('books.store');
    Route::get('books/{book}/edit', [BookController::class , 'edit'])->name('books.edit');
    Route::put('books/{book}', [BookController::class , 'update'])->name('books.update');
    Route::delete('books/{book}', [BookController::class , 'destroy'])->name('books.destroy');
    Route::get('/search', [BookController::class , 'search'])->name('search');
    Route::get('/books/{id}/detail', [BookController::class , 'detail'])->name('books.detail');



    Route::get('categories', [CategoryController::class , 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class , 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class , 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class , 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class , 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class , 'destroy'])->name('categories.destroy');


    Route::get('borrowings', [BorrowingController::class , 'index'])->name('borrowings.index');
    Route::get('borrowings/create', [BorrowingController::class , 'create'])->name('borrowings.create');
    Route::post('borrowings', [BorrowingController::class , 'store'])->name('borrowings.store');
    Route::get('borrowings/{borrowing}/edit', [BorrowingController::class , 'edit'])->name('borrowings.edit');
    Route::put('borrowings/{borrowing}', [BorrowingController::class , 'update'])->name('borrowings.update');
    Route::get('/borrowings/{borrowing}/detail', [BorrowingController::class , 'show'])->name('borrowings.detail');
    Route::delete('borrowings/{borrowing}', [BorrowingController::class , 'destroy'])->name('borrowings.destroy');
    Route::get('/generate-pdf', [BorrowingController::class , 'generatePDF'])->name('generate.pdf');
    Route::get('/stream-pdf', [BorrowingController::class , 'streamPDF'])->name('lihat.pdf');



    Route::get('fines', [FineController::class , 'index'])->name('fines.index');
    Route::post('fines/{fine}/pay', [FineController::class , 'pay'])->name('fines.pay');
    Route::delete('fines/{fine}', [FineController::class , 'destroy'])->name('fines.destroy');




    Route::get('settings', [SettingController::class , 'index'])->name('settings.index');

    Route::get('settings/create', [SettingController::class , 'create'])->name('settings.create');

    // Menyimpan pengaturan baru
    Route::post('settings', [SettingController::class , 'store'])->name('settings.store');

    // Form untuk mengedit pengaturan
    Route::get('settings/{setting}/edit', [SettingController::class , 'edit'])->name('settings.edit');

    // Memperbarui pengaturan
    Route::put('settings/{setting}', [SettingController::class , 'update'])->name('settings.update');

    // Menghapus pengaturan
    Route::delete('settings/{setting}', [SettingController::class , 'destroy'])->name('settings.destroy');

    // Video Progress API Routes
    Route::get('/api/video-progress', [VideoProgressController::class , 'getProgress'])->name('video.progress.get');
    Route::post('/api/video-progress', [VideoProgressController::class , 'updateProgress'])->name('video.progress.update');
    Route::get('/api/video-progress/last-watched', [VideoProgressController::class , 'getLastWatched'])->name('video.progress.last-watched');
    Route::post('/api/video-progress/reset', [VideoProgressController::class , 'resetProgress'])->name('video.progress.reset');

    Route::post('/request-access', [AccessRequestController::class , 'store'])->name('request-access.store');
    Route::post('/fc1-mc/requests', [Fc1McRequestController::class , 'store'])->middleware('auth')->name('fc1mc.requests.store');

    // Route untuk FC2 & FC3 requests (member)
    Route::post('/fc2-fc3/requests', [Fc2Fc3RequestController::class , 'store'])->middleware('auth')->name('fc2fc3.requests.store');

    // Route untuk admin melihat tabel request akses
    Route::get('/admin/access-requests', [AccessRequestController::class , 'index'])->middleware('auth')->name('admin.access-requests');
    Route::post('/admin/access-requests/{id}/approve', [AccessRequestController::class , 'approve'])->middleware('auth')->name('admin.access-requests.approve');
    Route::post('/admin/access-requests/{id}/reject', [AccessRequestController::class , 'reject'])->middleware('auth')->name('admin.access-requests.reject');
    Route::get('/admin/fc1mc-requests', [Fc1McRequestController::class , 'adminIndex'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.fc1mc-requests');
    Route::post('/admin/fc1mc-requests/{id}/approve', [Fc1McRequestController::class , 'approve'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.fc1mc-requests.approve');
    Route::post('/admin/fc1mc-requests/{id}/reject', [Fc1McRequestController::class , 'reject'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.fc1mc-requests.reject');

    // Route untuk admin melihat tabel request FC2 & FC3
    Route::get('/admin/fc2fc3-requests', [Fc2Fc3RequestController::class , 'adminIndex'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.fc2fc3-requests');
    Route::post('/admin/fc2fc3-requests/{id}/approve', [Fc2Fc3RequestController::class , 'approve'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.fc2fc3-requests.approve');
    Route::post('/admin/fc2fc3-requests/{id}/reject', [Fc2Fc3RequestController::class , 'reject'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.fc2fc3-requests.reject');

    // Route untuk member request akses Grow & Marriage Class
    Route::post('/grade1/requests', [Grade1RequestController::class , 'store'])->middleware('auth')->name('grade1.requests.store');
    Route::post('/grade2/requests', [Grade2RequestController::class , 'store'])->middleware('auth')->name('grade2.requests.store');
    Route::post('/grade3/requests', [Grade3RequestController::class , 'store'])->middleware('auth')->name('grade3.requests.store');
    Route::post('/marriage-class/requests', [MarriageClassRequestController::class , 'store'])->middleware('auth')->name('marriage-class.requests.store');

    // Route untuk admin list & setujui/tolak kelas Grow & Marriage
    Route::get('/admin/grade1-requests', [Grade1RequestController::class , 'adminIndex'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.grade1-requests');
    Route::post('/admin/grade1-requests/{id}/approve', [Grade1RequestController::class , 'approve'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.grade1-requests.approve');
    Route::post('/admin/grade1-requests/{id}/reject', [Grade1RequestController::class , 'reject'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.grade1-requests.reject');

    Route::get('/admin/grade2-requests', [Grade2RequestController::class , 'adminIndex'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.grade2-requests');
    Route::post('/admin/grade2-requests/{id}/approve', [Grade2RequestController::class , 'approve'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.grade2-requests.approve');
    Route::post('/admin/grade2-requests/{id}/reject', [Grade2RequestController::class , 'reject'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.grade2-requests.reject');

    Route::get('/admin/grade3-requests', [Grade3RequestController::class , 'adminIndex'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.grade3-requests');
    Route::post('/admin/grade3-requests/{id}/approve', [Grade3RequestController::class , 'approve'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.grade3-requests.approve');
    Route::post('/admin/grade3-requests/{id}/reject', [Grade3RequestController::class , 'reject'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.grade3-requests.reject');

    Route::get('/admin/marriage-class-requests', [MarriageClassRequestController::class , 'adminIndex'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.marriage-class-requests');
    Route::post('/admin/marriage-class-requests/{id}/approve', [MarriageClassRequestController::class , 'approve'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.marriage-class-requests.approve');
    Route::post('/admin/marriage-class-requests/{id}/reject', [MarriageClassRequestController::class , 'reject'])->middleware(['auth', \App\Http\Middleware\CheckAdminRole::class])->name('admin.marriage-class-requests.reject');
});