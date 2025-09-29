<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\Code\Test;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/login', [AuthController::class,  'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// About Us Routes
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/glance', function () {
        return view('module.about.glance');
    })->name('glance');
    Route::get('/history', function () {
        return view('module.about.history');
    })->name('history');
    Route::get('/why-study', function () {
        return view('module.about.why_study');
    })->name('why-study');
    Route::get('/infrastructure', function () {
        return view('module.about.infrastructure');
    })->name('infrastructure');
    Route::get('/achievements', function () {
        return view('module.about.achievements');
    })->name('achievements');
    Route::get('/news-events', function () {
        return view('module.about.news_events');
    })->name('news-events');
});

// admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/governing-body', function () {
        return view('module.admin.governing_body');
    })->name('governing-body');
    Route::get('/chairman-message', function () {
        return view('module.admin.chairman_message');
    })->name('chairman-message');
    Route::get('/principal-message', function () {
        return view('module.admin.principal_message');
    })->name('principal-message');
    Route::get('/ex-chairmans', function () {
        return view('module.admin.ex_chairmans');
    })->name('ex-chairmans');
    Route::get('/ex-principals', function () {
        return view('module.admin.ex_principals');
    })->name('ex-principals');
    Route::get('/teacher-info', function () {
        return view('module.admin.teachers');
    })->name('teachers');
    Route::get('/staff-info', function () {
        return view('module.admin.staffs');
    })->name('staffs');
});

// Academic Routes
Route::prefix('academic')->name('academic.')->group(function () {
    Route::get('/calendar', function () {
        return view('module.academic.calendar');
    })->name('calendar');
    Route::get('/routine', function () {
        return view('module.academic.routine');
    })->name('routine');
    Route::get('/syllabus', function () {
        return view('module.academic.syllabus');
    })->name('syllabus');
    Route::get('/suggestion', function () {
        return view('module.academic.suggestion');
    })->name('suggestion');
    Route::get('/exam-routine', function () {
        return view('module.academic.exam-routine');
    })->name('exam-routine');
    Route::get('/notice', function () {
        return view('module.academic.notice');
    })->name('notice');
    Route::get('/result', function () {
        return view('module.academic.result');
    })->name('result');
});

// Admission Routes
Route::prefix('admission')->name('admission.')->group(function () {
    Route::get('/circular', function () {
        return view('module.admission.circular');
    })->name('circular');
    Route::get('/prospectus', function () {
        return view('module.admission.prospectus');
    })->name('prospectus');
    Route::get('/form', function () {
        return view('module.admission.form');
    })->name('form');
    Route::get('/admission-result', function () {
        return view('module.admission.result');
    })->name('admission-result');
    Route::get('/waiting-list', function () {
        return view('module.admission.waiting-list');
    })->name('waiting-list');
    Route::get('/course-program', function () {
        return view('module.admission.course-program');
    })->name('courses');
    Route::get('/admit-card', function () {
        return view('module.admission.admit-card');
    })->name('admit-card');
});

// Co-curricular Routes
Route::prefix('co-curricular')->name('co-curricular.')->group(function () {
    Route::get('/sports', function () {
        return view('module.co-curricular.sports');
    })->name('sports');
    Route::get('/tour', function () {
        return view('module.co-curricular.tour');
    })->name('tour');
    Route::get('/scout', function () {
        return view('module.co-curricular.scout');
    })->name('scout');
    Route::get('/bncc', function () {
        return view('module.co-curricular.bncc');
    })->name('bncc');
});

// Club & Society Routes
Route::prefix('club')->name('club.')->group(function () {
    Route::get('/ict', function () {
        return view('module.club.ict');
    })->name('ict');
    Route::get('/science', function () {
        return view('module.club.science');
    })->name('science');
    Route::get('/debate', function () {
        return view('module.club.debate');
    })->name('debate');
    Route::get('/photography', function () {
        return view('module.club.photography');
    })->name('photography');
    Route::get('/cultural', function () {
        return view('module.club.cultural');
    })->name('cultural');
    Route::get('/language', function () {
        return view('module.club.language');
    })->name('language');
    Route::get('/quiz', function () {
        return view('module.club.quiz');
    })->name('quiz');
});

// Digital Contents Routes
Route::prefix('digital-contents')->name('digital.')->group(function () {
    Route::get('/six', function () {
        return view('module.digital.six');
    })->name('six');
    Route::get('/seven', function () {
        return view('module.digital.seven');
    })->name('seven');
    Route::get('/eight', function () {
        return view('module.digital.eight');
    })->name('eight');
    Route::get('/nine-ten', function () {
        return view('module.digital.nine-ten');
    })->name('nine-ten');
});

// Gallery Routes
Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/photo', function () {
        return view('module.gallery.photo');
    })->name('photo');
    Route::get('/video', function () {
        return view('module.gallery.video');
    })->name('video');
});

Route::get('/test', [TestController::class, 'test'])->name('test');

// Admin Panel Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('panel')->name('panel.')->group(function () {
        Route::get('/index', function () {
            return view('panel.index');
        })->name('index');

        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Resource routes for each section
         Route::resource('teachers', TeacherController::class);
         Route::resource('staffs', StaffController::class);
         Route::resource('contents', ContentController::class);
         Route::resource('notices', NoticeController::class);
         Route::resource('gallery-images', GalleryImageController::class);
        // Route::resource('others', OtherController::class);

    });
    // Set dashboard as home for admin
    // Route::redirect('/', '/panel/dashboard');
});

?>

