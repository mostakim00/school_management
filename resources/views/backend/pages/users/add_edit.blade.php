@extends('backend.template.template')
@section('title', 'Add User')
@section('main')
    @php
        if(isset($user)){
            $user_role = $user->roles->pluck('id')->toArray();
        }
    @endphp
    <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">{{(isset($user)? 'Update':'Add New')}} User </h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> {{(isset($user)? 'Update':'Add New')}} User
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <a href="{{route('users.index')}}" class="btn btn-outline-primary"><span><i class="feather icon-list"></i>&nbsp; List All</span></a>
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
                            <form class="form form-vertical" method="post" action="{{ isset($user) ? route('users.store_update',$user->id): route('users.store_update')}}">
                                @csrf
                                <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="full_name">Full Name</label>
                                                    <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Full Name" value="{{(isset($user)) ? $user->full_name :old('full_name')}}">
                                                </div>
                                                @error('full_name')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="user_name">User Name</label>
                                                    <input type="text" id="user_name" class="form-control" name="user_name" placeholder="EX:jonedue" value="{{(isset($user))? $user->user_name :old('user_name')}}">
                                                </div>
                                                @error('user_name')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" class="form-control" name="email" placeholder="exampole@gmail.com" value="{{(isset($user))? $user->email :old('email')}}">
                                                </div>
                                                @error('email')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                                @if(!isset($user))
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" id="password" class="form-control" name="password" placeholder="password">
                                                        <span class="text-warning">password must contain  minimum  8 characters, including at least one uppercase letter, one lowercase letter, and one special symbol</span>
                                                    </div>
                                                    @error('password')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                @else
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" class="form-control" name=""  value="{{(isset($user))? $user->password:null}}" disabled>
                                                </div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select class="select2 form-control" multiple="multiple" id="role" name="roles[]">
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}" @if(isset($user) && in_array($role->id,$user_role)) selected @endif >{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('roles')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select class="select form-control" name="status">
                                                        <option value="0" {{(isset($user) && $user->status==0)?'selected':''}}>Inactive</option>
                                                        <option value="1" {{(isset($user) && $user->status==1)?'selected':''}}>Active</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">{{(isset($user)? 'Update':'Submit')}}</button>
                                                @if(!isset($user))
                                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                @endif
                                            </div>
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
@push('script')
   <script>

   </script>
@endpush
