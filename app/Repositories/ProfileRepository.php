<?php

namespace App\Repositories;

use App\Helpers\APIResponseMessage;
use App\Models\User;
use App\Models\UserRoleHasPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ProfileRepository
{

    public function resetPassword($request)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $user->password = bcrypt($request['password']);
            $user->update();

            DB::commit();

            return redirect()->route('profile')->with('success', APIResponseMessage::UPDATED);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('profile')->with('error', APIResponseMessage::ERROR_EXCEPTION);
        }
    }
}
