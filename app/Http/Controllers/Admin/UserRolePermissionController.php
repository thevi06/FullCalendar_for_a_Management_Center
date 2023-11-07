<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\UserRoleRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class UserRolePermissionController extends Controller
{
    private $repo;

    public function __construct(UserRoleRepository $roleRepository)
    {
        $this->middleware('can:role-view', ['only' => ['index', 'show', 'getAjaxRoleData']]);
        $this->middleware('can:role-create', ['only' => ['create', 'store']]);
        $this->middleware('can:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:role-delete', ['only' => ['destroy']]);
        $this->repo = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        return view('admin.user.role_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $userPermission = Permission::all();
        return view('admin.user.role_create', compact('userPermission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function store(UserRoleRequest $request)
    {
        return $this->repo->createUserRole($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        $role = Role::with(['hasRole'])->where('id', '=', $id)->first();
        $userPermission = Permission::all();
        $permissions = $role['hasRole']->pluck('permission_id')->toArray();
        return view('admin.user.role_edit', compact('userPermission', 'role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRoleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRoleRequest $request, $id)
    {
        return $this->repo->updateUserRole($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * role permissions datatable
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function getAjaxRoleData(Request $request)
    {
        $model = Role::query()->with(['hasRole.permission'])->orderBy('id', 'desc');

        return DataTables::eloquent($model)
            ->editColumn('roleName', function ($role) {
                return $role['name'];
            })
            ->addColumn('permission', function ($role) {
                return view('admin.user.partials._permission_view', compact('role'));
            })
            ->addColumn('action', function ($role) {
                return view('admin.user.partials._action_role', compact('role'));
            })
            ->toJson();
    }
}
