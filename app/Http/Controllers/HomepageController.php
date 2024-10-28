<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        return view('index');
    }
    public function tour_package(){
        return view('tour-package-details');
    }
    public function rentals(){
        return view('transport-booking');
    }
    public function hotel_resevation(){
        return view('hotel-reservation');
    }
    public function flights(){
        return view('flights');
    }

    public function login(){
        return view('login');
    }  
    public function register(){
        return view('register');
    }
    public function user_dashboard(){
        return view('user-dashboard');
    }
}



