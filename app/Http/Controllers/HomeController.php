<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
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

            return redirect()->route('booking.confirmation')->with('success', 'Your booking has been successfully submitted!');
        }//End Method


        public function about(){
            return view('home.about');
        }//End Method


        public function our_room(){
            $data =Room::all();
            return view('home.our-room',compact('data'));
        }//End Method


        public function gallery(){
            $gimage =Gallary::all();
            return view('home.gallery',compact('gimage'));
        }//End Method


        public function contact_us(){
            $data =Contact::all();
            return view('home.contact-us',compact('data'));
        }//End Method


        public function resrvation_list(){
            $data = Booking::with('room')->get();
            return view('home.reservation-list', compact('data'));
        }//End Method


        public function booking_confarmation(){
            return view('home.booking-confirmation');
        }//End Method


        public function booking_confarmation_delete($id){
            $data=Booking::find($id);
            $data->delete();
            return redirect()->back()->with('success','Booking Cancle successfully');
        }//End Method





}
