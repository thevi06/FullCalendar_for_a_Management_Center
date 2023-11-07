<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserManagementController extends Controller
{

    private $repo;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('can:user-view', ['only' => ['index', 'show', 'getAjaxUserData']]);
        $this->middleware('can:user-create', ['only' => ['create', 'store']]);
        $this->middleware('can:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:user-delete', ['only' => ['destroy']]);
        $this->repo = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        return $this->repo->createUser($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.user_edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserEditRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UserEditRequest $request, $id)
    {
        return $this->repo->updateUser($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        return $this->repo->deleteUser($id);
    }

    /**
     * user data list for datatable
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function getAjaxUserData(Request $request)
    {
        $model = User::query()->with(['role'])->orderBy('id', 'desc');

        return DataTables::eloquent($model)
            ->editColumn('name', function ($user) {
                return $user['name'];
            })
            ->editColumn('email', function ($user) {
                return $user['email'];
            })
            ->editColumn('role', function ($user) {
                return $user['role']->name;
            })
            ->addColumn('action', function ($user) {
                return view('admin.user.partials._action', compact('user'));
            })
            ->toJson();
    }
}
