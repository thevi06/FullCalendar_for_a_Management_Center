<div class="card-body">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label" for="name">Role
                Name</label>
            <input type="text" class="form-control" id="name" name="name" @if(isset($role)) value="{{$role->name}}"
                   @endif required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-lg-3 pt-3">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" type="checkbox" id="selectAll" style="cursor: pointer;">
                    <label class="form-check-label" for="selectAll" style="cursor: pointer;">Select All</label>
                </div>
            </div>
        </div>
        @if(isset($userPermission) && count($userPermission) > 0)
            @foreach($userPermission as $key=>$cp)
                @if(str_contains($cp['name'], 'management'))
                    <div class="col-lg-3 @if($key != 0) pt-4 @endif">
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" type="checkbox" id="permission_id_{{$cp['id']}}"
                                   name="permission_id[]" value="{{$cp['id']}}"
                                   @if(isset($role['hasRole']) && in_array($cp['id'], $permissions)) checked @endif>
                            <label class="form-check-label" for="permission_id_{{$cp['id']}}">{{$cp['name']}}</label>
                        </div>
                    </div>
                @else
                    <div class="col-lg-3">
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input" type="checkbox" id="permission_id_{{$cp['id']}}"
                                   name="permission_id[]" value="{{$cp['id']}}"
                                   @if(isset($role['hasRole']) && in_array($cp['id'], $permissions)) checked @endif>
                            <label class="form-check-label" for="permission_id_{{$cp['id']}}">{{$cp['name']}}</label>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
</div>
