@inject('permission', "Spatie\Permission\Models\Permission")
<div class="form-group">
    {{Form::label('name', 'Name' )}}
    {{Form::text('name', $record->name, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('guard_name', 'Guard Name' )}}
    {{Form::text('guard_name', $record->guard_name, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    <label for="role_list">Permissions</label>
    <div class="row">
        @foreach($permission->all() as $p)
            <div class="col-md-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="role_list" value="{{$p->id}}" name="permission_list[]"
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
