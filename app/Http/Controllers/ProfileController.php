<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User; 

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $inputArr = [
            'active' => 0            
        ]; 

        $user->update($inputArr);  

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    /**
     * Display the user's profile form.
     */
    public function editAdditional(Request $request): View
    {        
        return view('profile.editadd', [
            'user' => User::find($request->id),
            'id' => $request->id
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateAdditional(Request $request): RedirectResponse
    {

        if($request->name && $request->email && $request->id && $request->role) {

            $inputArr = [
                'name' => $request->name,
                'role' => $request->role, 
                'email' => $request->email
            ]; 
    
            User::find($request->id)->update($inputArr);                         
        } else {
            return back()->with('error', 'User not updated.');
        }

        return back()->with('success', 'User ' . $request->name . ' updated.');
    }

    /**
     * Delete the user's account.
     */
    public function destroyAdditional(Request $request): RedirectResponse
    {
        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current_password'],
        // ]);

        $user = User::find($request->id);

        $inputArr = [
            'active' => 0            
        ]; 

        $user->update($inputArr);

        return Redirect::to('/view-users')->with('success', 'User ' . $request->name . ' deleted');
    }
}
