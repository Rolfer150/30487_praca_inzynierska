<?php

namespace App\Http\Controllers;

use App\Enums\EducationalStage;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function show(User $user): View
    {
        return view('profile.show', compact('user'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'education' => EducationalStage::cases(),
            'brands' => Brand::query()
                ->pluck('name')
                ->all()
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->education = $request->education;

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('image_path'))
        {
            $file = $request->file('image_path');
            $fileName = $file->getClientOriginalName();
            $filePath = 'user/' . $fileName;
            $file->storeAs('public/user', $fileName);
            $request->user()->image_path = $filePath;
        }

        $addressArray = [
            'city' => $request->address['city'],
            'street' => $request->address['street'],
            'home_nr' => $request->address['home_nr'],
            'zip_code' => $request->address['zip_code']
        ];
        $request->user()->address = $addressArray;

        foreach ($request->brands as $brand)
        {
            $brands = Brand::query()
                ->where('name', '=', $brand)
                ->pluck('id')
                ->all();
            $request->user()->brands()->attach($brands);
        }

//        dd($brandArray);
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

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
