<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\UploadTraits;
use Exception;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    use UploadTraits;
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function index()
    {

        return view('dashboard.admin.profile');
    }

    public function edit($adminId)
    {
        $adminData = $this->userModel::findOrFail($adminId);
        return view('dashboard.admin.edit', compact('adminData'));
    }

    public function update(UpdateUserProfileRequest $request)
    {
        $adminData = $this->userModel::findOrFail($request->adminId);

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $this->uploadFile($image, 'images/' . $request->name, $imageName, 'storage/images/' . $request->name . '/' . $adminData->image);
            }
                $adminData->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'image' => isset($imageName) ? $imageName : $adminData->image,
                ]);

            // session()->flash('message', 'Profile is Updated Successfully');
            $message = array(
                'message' => 'Profile is Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('profile.index')->with($message);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function ChangePasswordIndex()
    {
        return view('dashboard.admin.passwordChange');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        $adminData = $this->userModel::findOrFail($request->adminId);
        if (Hash::check($request->current_password, auth()->user()->password)) {
            $adminData->update([
                'password' => Hash::make($request->new_password)
            ]);
            $message = array(
                'message' => 'Password is Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('profile.index')->with($message);
        }else {
            $message = array(
                'message' => 'Old Password Does Not Match Our Records ',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($message);
        }

    }
}
