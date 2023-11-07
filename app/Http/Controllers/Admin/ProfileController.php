<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    private $repo;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->repo = $profileRepository;
    }

    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function resetPassword(PasswordResetRequest $request)
    {
        return $this->repo->resetPassword($request->all());
    }
}
