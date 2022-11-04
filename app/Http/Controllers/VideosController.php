<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;




class VideosController extends Controller
{
    public function index() {
        $directory = "img/thumbnail";
        $images = glob($directory . "/*.jpg");
       
        return view('videosIndex', ['images' => $images]);
    }
    
    public function video($codigodovideo) {

        // dd($codigodovideo);
        $directory = "videos";
        $video = glob($directory . "/*$codigodovideo*")[0];
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

    public function destroy($codigodovideo) {

        // Event::findOrFail($codigodovideo)->delete();        
        $videoDel = glob("videos/$codigodovideo.mp4");
         $imgDel= glob("img/thumbnail/$codigodovideo.jpg");
        // $this->video($videoDel);
        Storage::disk('public_uploads')->delete($videoDel);
        Storage::disk('public_uploads')->delete($imgDel);

        return redirect()->route('lambi');

    }

    public function edit($codigodovideo) { 

        $oldImg = glob("img/thumbnail/$codigodovideo.jpg")[0];

        return view('edit', ['codigodovideo' => $codigodovideo, 'oldImg' => $oldImg]);

    }

    public function update(Request $request, $codigodovideo) {
        // dd($codigodovideo);

        if ($request->has('nomeVideo') AND $request->hasFile('fileImg')) {
            
            $fileImg = $request->file('fileImg');
            
            $nomeVideo = $request->get('nomeVideo');
                        
            $extensionImg = $request->fileImg->extension();
            
            $imgDel= glob("img/thumbnail/$codigodovideo.jpg");
            $videoDel = glob("videos/$codigodovideo.mp4")[0];
            // dd($videoDel);                     
            
            $request->fileImg->storeAs('img/thumbnail', $nomeVideo . '.jpg', ['disk' => 'public_uploads']);
            Storage::disk('public_uploads')->delete($imgDel);     
            Storage::disk('public_uploads')->move($videoDel, 'videos/'. $nomeVideo . '.mp4');    
            
            
            return redirect()->route('lambi');
            
        } else { 
            echo "se fudeu";            
        }                

        }

    }
