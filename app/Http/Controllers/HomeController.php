<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function room_details($id){
        $room = Room::findOrFail($id);
         return view('home.details', compact('room'));
    }//End Method


    public function room_booking($id){
        return view('home.room-booking',['id' => $id]);
    }//End Methods

    public function add_booking(Request $request, $id){

        if (!Auth::check()) {

            return back()->with('error', 'Please log in to continue with your booking.');
        }

            $request->validate([
                'room_id'    => 'required',
                'name'       => 'required',
                'phone'      => 'required',
                'email'      => 'required|email',
                'start_date' => 'required|date|after_or_equal:today',
                'end_date'   => 'required|date|after:start_date',
            ]);


            $booking = new Booking;
            $booking->room_id = $id;
            $booking->name = $request->name;
            $booking->phone = $request->phone;
            $booking->email = $request->email;
            $booking->start_date = $request->start_date;
            $booking->end_date = $request->end_date;
            $booking->save();

            return back()->with('success', 'Reservation successful!');
        }

}