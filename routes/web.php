<?php

use App\Livewire\Blog\Detail as BlogDetail;
use App\Livewire\ContactUs;
use App\Livewire\Front\Blog;
use App\Livewire\Front\Index;
use App\Livewire\Gallery;
use App\Livewire\OrganizationalStructure;
use App\Livewire\RegionalBranch;
use App\Livewire\TimelineCalender;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('home');
Route::get('/blogs', Blog::class)->name('blogs');
Route::get('/blogs/{slug}/detail', BlogDetail::class)->name('blogs.detail');
Route::get('/galleries', Gallery::class)->name('galleries');
Route::get('/timeline-calender', TimelineCalender::class)->name('timeline-calender');
Route::get('/regional-branches', RegionalBranch::class)->name('regional-branches');
Route::get('/structural-organization', OrganizationalStructure::class)->name('structural-organization');
Route::get('/contact-us', ContactUs::class)->name('contactus');
