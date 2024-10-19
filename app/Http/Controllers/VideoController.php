<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function create()
    {
        return view('admin.video-create');
    }//End Method

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|file|mimes:mp4,mov,avi,mkv|max:20480', // Max size 20 MB
        ]);

        $destinationPath = public_path('uploads/videos');
        $request->file('url')->move($destinationPath, $request->file('url')->getClientOriginalName());
        $path = 'uploads/videos/' . $request->file('url')->getClientOriginalName();

        Video::create([
            'title' => $request->title,
            'url' => $path,
        ]);

        return redirect()->route('show.videos')->with('success', 'Video uploaded successfully!');
    }//End Method


    public function show_videos(){
        $data=Video::all();
        return view('admin.show-videos',compact('data'));
    }//End MEthod


    public function delete($id)
    {
        $video = Video::findOrFail($id);
        if (file_exists(public_path($video->url))) {
            unlink(public_path($video->url));
        }
        $video->delete();

        return redirect()->back()->with('success', 'Video deleted successfully!');
    }



}
