<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Announcement;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
  
    public function index()
    {
       
        $posts = Post::all();

       
        return view('user.posts.index', compact('posts'));
    }

  
    public function create()
    {
      
        $posts = Post::latest()->get();  
        return view('admin.announcement.create', compact('posts'));
    }

  
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $description = str_replace('src="upload/', 'src="' . asset('upload/') . '/', $request->input('description'));

        try {
          
            Post::create([
                'title' => $request->input('title'),
                'description' => $description,
            ]);

            return redirect()->back()->with('success', 'Announcement posted successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to save announcement: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save announcement.');
        }
    }

   
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
    
            if ($file->isValid()) {
                try {
                 
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    
                 
                    $fileName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . time() . '_' . uniqid() . '.' . $extension;
                
                    $filePath = $file->move(public_path('upload/category'), $fileName);
    
                
                    $url = asset('upload/category/' . $fileName);
    
                   
                    return response()->json([
                        'fileName' => $fileName,
                        'uploaded' => 1,
                        'url' => $url
                    ]);
                } catch (\Exception $e) {
                    Log::error('File upload failed: ' . $e->getMessage());
                    return back()->withErrors(['image' => 'File upload failed. Please try again.']);
                }
            } else {
                return back()->withErrors(['image' => 'The uploaded file is not valid.']);
            }
        }

        return back()->withErrors(['image' => 'No file uploaded.']);
    }

    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);  
            $post->delete();  

            return redirect()->route('admin.announcement.create')->with('success', 'Post deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to delete post: ' . $e->getMessage());
            return redirect()->route('admin.announcement.create')->with('error', 'Failed to delete post.');
        }
    }

    
    public function applications()
    {
        $posts = Post::all(); 
        return view('admin.applications', compact('posts'));
    }
   
}
    

    
    
