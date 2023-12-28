<div class="card-body">
    <div class="row ">
        <div class="col-lg-6">
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           @if(isset($user)) value="{{$user->name}}" @endif required>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label" for="email">Username / Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           @if(isset($user)) value="{{$user->email}}" @endif required>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-6">
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label" for="userRoleId">User Role</label>
                    <select class="form-control" name="userRoleId" id="userRoleId" required>
                        <option> - Please Select User Role -</option>
                        @if(isset($roles) && count($roles) > 0)
                            @foreach($roles as $role)
                                @if($role->name != 'super-admin')
                                    <option value="{{$role->id}}"
                                            @if(isset($user) && ($user->userRoleId == $role->id)) selected @endif>{{$role->name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
</div>
