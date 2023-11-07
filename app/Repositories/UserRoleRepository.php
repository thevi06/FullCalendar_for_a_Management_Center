<?php

namespace App\Repositories;

use App\Helpers\APIResponseMessage;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserRoleRepository
{

    public function createUserRole($requestData)
    {
        try {
            DB::beginTransaction();

            $role = new Role();
            $role->name = str_replace(' ', '-', strtolower($requestData['name']));
            $role->guard_name = 'web';
            $role->save();

            //save permissions
            $role->givePermissionTo($requestData['permission_id']);

            DB::commit();
            return redirect()->route('role.roles')->with('success', APIResponseMessage::CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('role.roles')->with('error', APIResponseMessage::ERROR_EXCEPTION);
        }
    }

    public function updateUserRole($requestData, $id)
    {
        try {
            $role = Role::find($id);
            DB::beginTransaction();

            $role->name = str_replace(' ', '-', strtolower($requestData['name']));
            $role->update();

            //save permissions
            $role->syncPermissions($requestData['permission_id']);

            DB::commit();
            return redirect()->route('role.roles')->with('success', APIResponseMessage::UPDATED);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('role.roles')->with('error', APIResponseMessage::ERROR_EXCEPTION);
        }
    }
}
