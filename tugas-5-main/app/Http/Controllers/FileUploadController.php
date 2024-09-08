<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function FormAvatar(Request $request, Profile $profile)
    {
        $user = $request->session()->get('user');
        $profile = DB::table('profiles')->where('email', $user->email)->select('profiles.*')->first();

        return view('upload-avatar', compact('user', 'profile'));
    }

    public function store(Request $request, Profile $profile)
    {
        $request->validate([
            'file' => 'nullable|file|mimes:png,jpg,jpeg,pdf|max:2048'
        ]);
    
        $filePath = $profile->avatar;
    
        if ($request->hasFile('file')) {
            
            if ($profile->avatar) {
                Storage::disk('public')->delete($profile->avatar);
            }
    
            $file = $request->file('file');
            $fileName = time() . '.' . $file->extension();
            $filePath = $file->storeAs('avatars', $fileName, 'public');

            $profile->update([
                'avatar' => $filePath,
            ]);
            
            return redirect('/profile')->with("success", "Mengubah foto profil berhasil!");
        } else {
            return back()->withErrors(['file' => 'File upload failed!']);
        }
    }
    



    // public function store(Request $request, Profile $profile)
    // {
    //     $request->validate([
    //         'file' => 'required|file|mimes:png,jpg,pdf,jpeg|max:2048'
    //     ]);

    //     if ($request->hashFile('avatar')) {
    //         if ($request->file('avatar')) {
    //             Storage::delete($profile->avatar);
    //             $file = $request->file('avatar');
    
    //             $fileName = time().'.'.$request->file->extension();
        
    //             $fileName = $file->storeAs("avatars", $fileName);
    
    //         } else {
    //             $fileName = $profile->avatar;
    //         }
            
    //         $attr = $request->all();
    //         $attr['avatar'] = $fileName;
    
    //         $profile->update($attr);
    
    //         return redirect('/profile')->with("success", "Mengubah foto profile berhasil!");
    //     } else {
    //         return back()->withErrors(["file" => "File Upload Failed!"]);
    //     }
        
    // }
}
