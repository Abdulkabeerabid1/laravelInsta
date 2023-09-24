<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;
use File;

class ProfileController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('profiles/index',[
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        // $this->authorize('update', $user->profile);
        return view('/profiles/edit', compact('user'));
    }

    public function update(User $user)
    {
        // $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => '',
            'description' => '',
            'url' => '',
        ]);

        $checkUser = Profile::where("user_id","=",Auth()->id())->first();
        if($checkUser){
            // If user already have profile details 
            auth()->user()->profile()->update($data);
        }else{
            // If user do not have profile details 
            auth()->user()->profile()->create($data);
            // auth()->user()->profile->store($data);
        }

        return redirect("/profile/".$user->id);
    }

    public function store(User $user)
    {
        $data = request()->validate([
            "image" =>  'required',
            "imageOldPath" => '',
        ]);
        // dd(profileimageFld);
        $imagePath = request('image')->store('profilePictures', 'public');
        
        $checkUser = Profile::where("user_id","=",Auth()->id())->first();
        $LoggedInId = Auth::user()->id;
        if($checkUser){
            if($data['imageOldPath'] != ''){
                $imgPath = public_path('/storage/'.$data['imageOldPath']);
                if(File::exists($imgPath)){
                    File::delete($imgPath);
                }
            }
            // If user already have profile details 
            Auth()->user()->profile()->update([
                "image" => $imagePath,
            ]);

        }else{
            // If user do not have profile details 
            Auth()->user()->profile()->create([
                "image" => $imagePath,
            ]);
        }

        return redirect("/profile/".Auth()->id());
    }
    public function destroy(){
        $data = request()->validate([
            "imagefldName" =>  'required',
        ]);

        Auth()->user()->profile()->update([
            "image" => NULL,
        ]);
        $imgPath = public_path('/storage/'.$data['imagefldName']);
        if(File::exists($imgPath)){
            File::delete($imgPath);
        }
        return redirect("/profile/".Auth()->id());
    }
}
