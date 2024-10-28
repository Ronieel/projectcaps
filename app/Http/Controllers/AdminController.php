<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Booking;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.dashboard');
    }
    public  function admin_profile(){
        return view('admin.admin-profile');
    }
    public  function create_tour(){
        return view('admin.components.create-tours');
    }
    public  function manage_tours(){
        return view('admin.components.manage-tours');
    }
    
    public  function view_destination(){
        return view('admin.components.view-destination');
    }

    public function show($id) {
        $destination = Tour::find($id);
        if (!$destination) {
            abort(404, 'Destination not found');
        }

        return view('admin.components.view-destination', compact('destination'));
    }
    public function edit($id) {
        $destination = Tour::find($id);
        if (!$destination) {
            abort(404, 'Destination not found');
        }
        return view('admin.components.view-destination-edit', compact('destination'));
    }

    // public function show_booking($id) {
    //     $booking = Booking::find($id);
    //     if (!$booking) {
    //         abort(404, 'booking not found');
    //     }

    //     return view('admin.components.view-booking-edit', compact('booking'));
    // }
    
}
