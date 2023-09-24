<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Post;
use Auth;
use File;
use DB;

class PostsController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store(User $user)
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required','image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $LoggedInId = Auth::user()->id;
        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        // $image->save(); 

        Auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);


        return redirect('/profile/'.$LoggedInId);
    }

    public function show(Request $request,Post $post){
        return view('posts/show', compact('post'));
    }

    public function destroy(User $user){
        $data = request()->validate([
            "imgId" => '',
            "imgPath" => '',
        ]);

        Auth()->user()->posts()->delete($data['imgPath']);
        $imgPaths = public_path('/storage/'.$data['imgPath']);
        if(File::exists($imgPaths)){
            File::delete($imgPaths);
        }

        return redirect('/profile/'.Auth()->id());
    }
}
