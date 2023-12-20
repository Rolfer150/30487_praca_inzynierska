<?php

namespace App\Http\Controllers;

use App\Enums\EducationalStage;
use App\Enums\ProgrammingSkills;
use App\Enums\SkillLevel;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Brand;
use App\Models\Skill;
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
            'skills' => ProgrammingSkills::cases(),
            'skillLevel' => SkillLevel::cases(),
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

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->education = $request->education;

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
//dd($request->skills);

        if ($request->skills)
        {
            Skill::query()
                ->where('user_id', '=', $request->user()->id)
                ->delete();
            foreach ($request->skills as $skill)
            {
//            dd($skill);
                $skillModel = new Skill;
                $skillModel->skill = $skill['skill'];
                $skillModel->skill_level = $skill['skillLevel'];

//            dd($skillModel);
                $request->user()->skills()->save($skillModel);
            }
        }

        if ($request->brands)
        {
//            $request->user()->brands()->detach($request->brands);
            foreach ($request->brands as $brand)
            {
                $brands = Brand::query()
                    ->where('name', '=', $brand)
                    ->pluck('id')
                    ->all();
                $request->user()->brands()->attach($brands);
            }
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

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
