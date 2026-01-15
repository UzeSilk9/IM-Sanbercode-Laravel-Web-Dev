<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function getProfile(){

    $currentUser = Auth::user();
    $user = User::find($currentUser->id);
    // dd($user);
    if($user->profile){
        $profile = Profile::where('user_id', $user->id)->first();
        return view('profile.update', ['profile' => $profile]);
        }
        else{
        return view('profile.add');
    }
    }
    public function store(Request $request){
        $request->validate([
        'Age' => 'require',
        'bio' => 'required',
    ]);

        $currentUser = Auth::user();
        $profile = new Profile;
        $profile->age= $request->input('age');
        $profile->bio= $request->input('bio');
        $profile->user_id= $currentUser->id;
        $profile->save();
        return redirect('/profile')->with('success', 'Berhasil Update Profile!');
    }

    public function update(Request $request){
         $request->validate([
        'Age' => 'require',
        'bio' => 'required',
        ]);
    $currentUser = Auth::user();
    $profile = Profile::where('user_id', $currentUser->id)->first();
    
    $profile->age= $request->input('age');
        $profile->bio= $request->input('bio');
        $profile->user_id= $currentUser->id;
        $profile->save();
        return redirect('/profile')->with('success', 'Berhasil Update Profile!');
    }

}
