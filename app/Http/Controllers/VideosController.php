<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;




class VideosController extends Controller
{
    public function index() {
        $directory = "img/thumbnail";
        $images = glob($directory . "/*.jpg");
       
        return view('videosIndex', ['images' => $images]);
    }
    
    public function video($codigodovideo) {
        $directory = "videos";
        $video = glob($directory . "/*$codigodovideo*")[0];
        dd($video);
        return  view('video', ['video' => $video]);
    } 
    
    public function upload() {
        return view('upload');
     }

    public function store(Request $request) {
        
        if ($request->hasFile('fileVideo') AND $request->has('nomeVideo') AND $request->hasFile('fileImg')) {

            $file = $request->file('fileVideo');

            $fileImg = $request->file('fileImg');
            
            $nomeVideo = $request->get('nomeVideo');
            
            $extension = $request->fileVideo->extension();

            $extensionImg = $request->fileImg->extension();
            
            $request->fileVideo->storeAs('videos', $nomeVideo . '.mp4', ['disk' => 'public_uploads']);
            
            $request->fileImg->storeAs('img/thumbnail', $nomeVideo . '.jpg', ['disk' => 'public_uploads']);          
            
            
            return back();
        } else { 
            echo "se fudeu";            
        }                
    }

    public function delete() {

        // $video;
        // Storage::delete(['file.jpg', 'file2.jpg']);

    }
}