@foreach($role->permissions as $permission)
    <span class="badge badge-primary text-capitalize">{{$permission->name}}</span>
@endforeach
