<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// <?php
// // routes/web.php
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// })->name('home');

// About Us Routes
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/glance', function () { return view('module.about.glance'); })->name('glance');
    Route::get('/history', function () { return view('about.history'); })->name('history');
    Route::get('/why-study', function () { return view('about.why-study'); })->name('why-study');
    Route::get('/infrastructure', function () { return view('about.infrastructure'); })->name('infrastructure');
    Route::get('/achievements', function () { return view('about.achievements'); })->name('achievements');
    Route::get('/news-events', function () { return view('about.news-events'); })->name('news-events');
});

// admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/governing-body', function () { return view('admin.governing-body'); })->name('governing-body');
    Route::get('/chairman-message', function () { return view('admin.chairman-message'); })->name('chairman-message');
    Route::get('/principal-message', function () { return view('admin.principal-message'); })->name('principal-message');
    Route::get('/ex-chairmans', function () { return view('admin.ex-chairmans'); })->name('ex-chairmans');
    Route::get('/ex-principals', function () { return view('admin.ex-principals'); })->name('ex-principals');
    Route::get('/teacher-info', function () { return view('admin.teachers'); })->name('teachers');
    Route::get('/staff-info', function () { return view('admin.staffs'); })->name('staffs');
});

// Academic Routes
Route::prefix('academic')->name('academic.')->group(function () {
    Route::get('/calendar', function () { return view('academic.calendar'); })->name('calendar');
    Route::get('/routine', function () { return view('academic.routine'); })->name('routine');
    Route::get('/syllabus', function () { return view('academic.syllabus'); })->name('syllabus');
    Route::get('/suggestion', function () { return view('academic.suggestion'); })->name('suggestion');
    Route::get('/exam-routine', function () { return view('academic.exam-routine'); })->name('exam-routine');
    Route::get('/notice', function () { return view('academic.notice'); })->name('notice');
    Route::get('/other', function () { return view('academic.other'); })->name('other');
});

// Admission Routes
Route::prefix('admission')->name('admission.')->group(function () {
    Route::get('/circular', function () { return view('admission.circular'); })->name('circular');
    Route::get('/prospectus', function () { return view('admission.prospectus'); })->name('prospectus');
    Route::get('/form', function () { return view('admission.form'); })->name('form');
    Route::get('/result', function () { return view('admission.result'); })->name('result');
    Route::get('/waiting-list', function () { return view('admission.waiting-list'); })->name('waiting-list');
    Route::get('/course-program', function () { return view('admission.course-program'); })->name('courses');
    Route::get('/admit-card', function () { return view('admission.admit-card'); })->name('admit-card');
});

// Co-curricular Routes
Route::prefix('co-curricular')->name('co-curricular.')->group(function () {
    Route::get('/sports', function () { return view('co-curricular.sports'); })->name('sports');
    Route::get('/tour', function () { return view('co-curricular.tour'); })->name('tour');
    Route::get('/scout', function () { return view('co-curricular.scout'); })->name('scout');
    Route::get('/bncc', function () { return view('co-curricular.bncc'); })->name('bncc');
});

// Club & Society Routes
Route::prefix('club')->name('club.')->group(function () {
    Route::get('/ict', function () { return view('club.ict'); })->name('ict');
    Route::get('/science', function () { return view('club.science'); })->name('science');
    Route::get('/debate', function () { return view('club.debate'); })->name('debate');
    Route::get('/photography', function () { return view('club.photography'); })->name('photography');
    Route::get('/cultural', function () { return view('club.cultural'); })->name('cultural');
    Route::get('/language', function () { return view('club.language'); })->name('language');
    Route::get('/quiz', function () { return view('club.quiz'); })->name('quiz');
});

// Digital Contents Routes
Route::prefix('digital-contents')->name('digital.')->group(function () {
    Route::get('/six', function () { return view('digital.six'); })->name('six');
    Route::get('/seven', function () { return view('digital.seven'); })->name('seven');
    Route::get('/eight', function () { return view('digital.eight'); })->name('eight');
    Route::get('/nine-ten', function () { return view('digital.nine-ten'); })->name('nine-ten');
});

// Gallery Routes
Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/photo', function () { return view('gallery.photo'); })->name('photo');
    Route::get('/video', function () { return view('gallery.video'); })->name('video');
});

// Other Routes
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::get('/login', function () { return view('auth.login'); })->name('login');
?>
