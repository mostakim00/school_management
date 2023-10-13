<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\Facades\DataTables;
use App\CustomeClasses\OwnClasses;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function index(Request $request){
        if(request()->ajax()){
            $users= User::with(['creator:id,full_name','updator:id,full_name','roles:id,name'])
                ->where('slug', '!=', 'super-admin');

            $query = $request->query('q');
            if (!empty($query)) {
                $users = $users->where('user_name', 'LIKE', '%' . $query . '%');
            }
            return DataTables::of($users)
                ->addColumn('roles', function ($users) {
                return view('backend.pages.users.roles', compact('users'))->render();
                 })
                ->escapeColumns([])
                ->rawColumns(['roles'])
                ->addColumn('actions', 'backend.pages.users.action')
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('backend.pages.users.index');

       /* if ($request->ajax()) {
            $data = $this->getFilteredUserData($request);

            return DataTables::of($data)
                ->addColumn('actions', 'backend.pages.users.action')
                ->rawColumns(['actions'])
                ->make(true);
        }*/

        return view('backend.pages.users.index');
    }

    // query data

    /*private function getFilteredUserData(Request $request)
    {
        $users = User::with(['creator:id,full_name', 'updator:id,full_name'])
            ->where('slug', '!=', 'super-admin');

        $query = $request->query('q');
        if (!empty($query)) {
            $users = $users->where('user_name', 'LIKE', '%' . $query . '%');
        }

        return $users->get();
    }*/










    public function add_edit($id=null){
        $roles = Role::where('name', '!=', 'superadmin')->get();
        if($id==null){
            return view('backend.pages.users.add_edit',compact('roles'));
        }
        else{
            $user = User::find($id);
            return view('backend.pages.users.add_edit',compact('user','roles'));
        }

    }

    public function store_update(Request $request,$id=null){
       if($id===null){

           $validation = $request->validate([
               'full_name'=> 'required | max:255',
               'user_name'=> 'required | max:10|unique:users,user_name,',
               'status'=> 'required',
               'roles'=> 'required',
               'email'=> 'required | unique:users,email',
               'password'=> ['required',
                        Password::min(8)->letters()->numbers()->mixedCase()->symbols(),
                   ],
           ]);

           $user = new User;
           $user->full_name = $request->full_name;
           $user->slug = Str::slug($request->full_name);
           $user->user_name = $request->user_name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->status = $request->status;
           $user->created_by= Auth::user()->id;
           $user->syncRoles($request->roles);
           $user->save();
           if($user){
               OwnClasses::ActivityLoger('success','adminstration','user create','User Create Successfully',Auth::user()->id);
               return redirect()->route('users.index')->with('message','User Create Successfully');
           }

           else{
               OwnClasses::ActivityLoger('failed','adminstration','user create','User Create failed',Auth::user()->id);
               return redirect()->back()->with('error','!Opps Something wrong Try again');

           }

       }
       else{
           $update_data = User::find($id);
           $validation = $request->validate([
               'full_name'=> 'required | max:255',
               'user_name'=> 'required | max:10|unique:users,user_name,'.$update_data->id,
               'status'=> 'required',
               'roles'=> 'required',
               'email'=> 'required | unique:users,email,'.$update_data->id,
           ]);

           $update_data->full_name = $request->full_name;
           $update_data->user_name = $request->user_name;
           $update_data->email = $request->email;
           $update_data->status = $request->status;
           $update_data->updated_by= Auth::user()->id;
           $update_data->syncRoles($request->roles);
           $update_data->update();
           if($update_data) return redirect()->route('users.index')->with('message','User Update Successfully');

           else return redirect()->back()->with('error','!Opps Something wrong Try again');

       }
    }

}
