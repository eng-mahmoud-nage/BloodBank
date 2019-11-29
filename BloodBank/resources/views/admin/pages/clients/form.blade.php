@inject('role', "Spatie\Permission\Models\Role")
@inject('permission', "Spatie\Permission\Models\Permission")
<div class="form-group">
    {{Form::label('name', 'Name' )}}
    {{Form::text('name', $record->name, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('email', 'E_mail' )}}
    {{Form::text('email', $record->email, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('image', 'Image' )}}
    {{Form::file('image', ['class' => 'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('password', 'Password' )}}
    {{Form::password('password', ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="role_list">Roles</label>
    <div class="row">
        @foreach($role->all() as $p)
            <div class="col-md-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="role_list" value="{{$p->id}}" name="role_list[]"
                                   @if($record->hasRole($p->name))
                                       checked
                                    @endif
                        >
                        {{$p->name}}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="form-group">
    <label for="permission_list">Permissions</label>
    <div class="row">
        @foreach($permission->all() as $p)
            <div class="col-md-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="permission_list" value="{{$p->id}}" name="permission_list[]"
                           @if($record->hasPermissionTo($p->name))
                               checked
                            @endif
                        >
                        {{$p->name}}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>
