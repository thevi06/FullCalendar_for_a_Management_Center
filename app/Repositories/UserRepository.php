<?php

namespace App\Repositories;

use App\Helpers\APIResponseMessage;
use App\Models\User;
use App\Models\UserRoleHasPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserRepository
{

    public function createUser($requestData)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'password' => bcrypt($requestData['password']),
                'userRoleId' => $requestData['userRoleId'],
                'createdBy' => Auth::id()
            ]);

            //assign role
            $user->assignRole($requestData['userRoleId']);

            DB::commit();

            return redirect()->route('users.all')->with('success', APIResponseMessage::CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.all')->with('error', APIResponseMessage::ERROR_EXCEPTION);
        }
    }

    public function updateUser($requestData, $id)
    {
        try {
            $user = User::find($id);
            DB::beginTransaction();

            $data = [
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'userRoleId' => $requestData['userRoleId'],
                'editedBy' => Auth::id()
            ];

            $user->update($data);

            $user->syncRoles($requestData['userRoleId']);
            $role = Role::findById($requestData['userRoleId']);
            $permissions = UserRoleHasPermission::with([])
                ->where('role_id', '=', $requestData['userRoleId'])
                ->pluck('permission_id');
            $role->syncPermissions($permissions);

            DB::commit();

            return redirect()->route('users.all')->with('success', APIResponseMessage::UPDATED);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.all')->with('error', APIResponseMessage::ERROR_EXCEPTION);
        }
    }

    public function deleteUser($id)
    {
        try {
            DB::beginTransaction();

            User::with([])->find($id)->update(['deletedBy' => Auth::id()]);
            User::with([])->find($id)->delete();

            DB::commit();

            return redirect()->route('users.all')->with('success', APIResponseMessage::DELETED);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.all')->with('error', APIResponseMessage::ERROR_EXCEPTION);
        }
    }
}
