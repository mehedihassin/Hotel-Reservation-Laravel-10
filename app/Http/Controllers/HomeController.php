<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Video;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::findOrFail($id);
        return view('home.details', compact('room'));
    } //End Method


    public function room_booking($id)
    {
        return view('home.room-booking', ['id' => $id]);
    } //End Methods

    public function add_booking(Request $request, $id)
    {

        if (!Auth::check()) {

            return back()->with('error', 'Please log in to continue with your booking.');
        }

        $request->validate([
            'room_id'    => 'required',
            'user_id'    => 'nullable',
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
        $booking->user_id = Auth::id();
        $booking->save();

        return redirect()->route('booking.confirmation')->with('success', 'Your booking has been successfully submitted!');
    } //End Method


    public function about()
    {
        return view('home.about');
    } //End Method


    public function our_room()
    {
        $data = Room::all();
        return view('home.our-room', compact('data'));
    } //End Method


    public function gallery()
    {
        $gimage = Gallary::all();
        return view('home.gallery', compact('gimage'));
    } //End Method


    public function contact_us()
    {
        $data = Contact::all();
        return view('home.contact-us', compact('data'));
    } //End Method


    public function resrvation_list()
    {
        $userId = Auth::id();
        $data = Booking::where('user_id', $userId)->get();
        return view('home.reservation-list', compact('data'));
    } //End Method


    public function booking_confarmation()
    {
        return view('home.booking-confirmation');
    } //End Method


    public function booking_confarmation_delete($id)
    {
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Booking Cancle successfully');
    } //End Method


    public function stripe()
    {
        return view('home.stripe');
    }//End Method

    public function stripePost(Request $request)

    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 

        ]);
        Session::flash('success', 'Payment successful!');
        return back();

    }//End Method

    public function view_profile(){
        return view('home.profile-view');
    }//End Method

    public function update_profile(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|string|max:15',
        ]);
    
        // Get the authenticated user
        $user = auth()->user();
    
        // Update the user's profile
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }//End Method
    







}
