@extends('backend.template.template')
@section('title', 'Add User')
@section('main')
    @php
        if(isset($role)){
             $role_permissions= $role->permissions->pluck('id')->toArray();
             //dd($permission);
        }
    @endphp
    <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">  {{(!isset($role))? "Add New" :'Edit'}} Role</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> {{isset($role)? 'Edit' :'Add New'}} Role
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <a href="{{route('role-permission.index')}}" class="btn btn-outline-primary"><span><i class="feather icon-list"></i>&nbsp; List All</span></a>
                </div>
            </div>
        </div>
    </section>
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="post" action="{{isset($role) ? route('role-permission.update',$role->id) : route('role-permission.store')}}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="full_name">Role Name</label>
                                                <input type="text" id="full_name" class="form-control" name="name" placeholder="Role Name" value="{{isset($role)? $role->name :old('name') }}">
                                            </div>
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <h2>Assign Permission</h2>
                                    <div class="row">
                                        @foreach($permission_group as $group)
                                            <div class="col-lg-3 col-md-6 col-sm-12 text-capitalize ">
                                                <div class="card border-warning  bg-transparent" style="height: 80%">
                                                    <div class="card-content">
                                                        <div class="card-header">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"   id="customCheck1{{$group->permission_group}}">
                                                                    <label class="custom-control-label" for="customCheck1{{$group->permission_group}}"><b>{{$group->permission_group}}</b></label>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        @php
                                                            $permissions = App\Models\User::getPermission($group->permission_group);
                                                            //dd( $permissions);
                                                        @endphp
                                                            <div class="card-body mx-5">
                                                                <fieldset>
                                                                    @foreach($permissions as $permission)
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" @if(isset($role) && in_array($permission->id,$role_permissions)) checked @endif  name="permission[]" value="{{$permission->id}}" id="customCheck{{$permission->id}}">
                                                                            <label class="custom-control-label" for="customCheck{{$permission->id}}">{{$permission->name}}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </fieldset>
                                                            </div>
                                                       </div>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">{{(!isset($role) ? 'Submit':'Update')}}</button>
                                                @if(!isset($role))
                                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                @endif
                                            </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
