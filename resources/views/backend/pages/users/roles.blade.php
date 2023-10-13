@foreach($users->roles as $role)
    <span class="badge badge-info">{{$role->name}}</span>
@endforeach
