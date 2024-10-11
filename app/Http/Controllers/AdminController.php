<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Laravel\Facades\Image;

class AdminController extends Controller
{
    public function index(){
        $usertype=Auth()->user()->usertype;

        if($usertype == 'user'){
            return $this->home();
        }
        else if($usertype == 'admin'){
            return view('admin.index');
        }
    }//End Method

    public function home() {
        $data = Room::all();
        return view('home.index', compact('data'));
    }//End Method

    public function create_room(){
        return view('admin.create-room');
    }//End Method

    public function add_room(Request $request){

        $request->validate([
            'room_title' => 'required|string|max:255',
            'description' => 'required|string',
            'regular_price' => 'required',
            'discount_price' => 'nullable',
            'room_status' => 'required',
            'room_type' => 'required|string',
            'wifi' => 'nullable',
            'food' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $room = new Room();
        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->regular_price = $request->regular_price;
        $room->discount_price = $request->discount_price;
        $room->room_status = $request->room_status;
        $room->room_type = $request->room_type;
        $room->wifi = $request->wifi;
        $room->food = $request->food;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_extention = $image->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extention;
            $this->GenerateBrandThumbailsImage($image, $file_name);
            $room->image = $file_name;
        }

        $room->save();

        return redirect()->route('room.list')->with('success', 'Room created successfully!');
    }//End Method

    public function room_list(){
        $data=Room::all();
        return view('admin.room-list',compact('data'));
    }//End Method

    public function room_edit($id){
        $data=Room::find($id);
        return view('admin.room-edit',compact('data'));
    }//End Method


    public function room_update(Request $request, $id)
    {

        $room = Room::findOrFail($id);
        $request->validate([
            'room_title' => 'required|string|max:255',
            'description' => 'required|string',
            'regular_price' => 'required',
            'discount_price' => 'nullable',
            'room_status' => 'required',
            'room_type' => 'required|string',
            'wifi' => 'nullable',
            'food' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->regular_price = $request->regular_price;
        $room->discount_price = $request->discount_price;
        $room->room_status = $request->room_status;
        $room->room_type = $request->room_type;
        $room->wifi = $request->wifi;
        $room->food = $request->food;


        if ($request->hasFile('image')) {
            if ($room->image && \Storage::exists('uploads/images/rooms/' . $room->image)) {
                \Storage::delete('uploads/images/rooms/' . $room->image);
            }


            $image = $request->file('image');
            $file_extention = $image->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extention;
            $this->GenerateBrandThumbailsImage($image, $file_name);
            $room->image = $file_name;
        }


        $room->save();

        return redirect()->route('room.list')->with('success', 'Room updated successfully!');
    }



    public function room_delete($id){
        $data=Room::find($id);
        $data->delete();
        return redirect()->back()->with('status','Room Has Been delete Successfully');
    }//End Method


    public function admin_booking(){
        $data=Booking::all();
        return view('admin.booking',compact('data'));
    }//End Method

    public function admin_booking_delete($id){
        $data=Booking::find($id);
        $data->delete();
        return redirect()->back()->with('status','Room Has Been delete Successfully');
    }




    public function GenerateBrandThumbailsImage($image, $imageName){
        $destinationPath =public_path('uploads/images/rooms');
        $img=Image::read($image->path());
        $img->cover(124,124,'top');
        $img->resize(124,124, function($constraint){
        $constraint->aspectRatio();

    })->save($destinationPath.'/'.$imageName);


    }//End Methiod

}
