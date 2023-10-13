<?php

namespace App\Http\Controllers\Backend;

use App\CustomeClasses\OwnClasses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;
use App\Models\User;

class RoleAndPermissionController extends Controller
{
        public function index(Request $request){
            if(request()->ajax()){
                $roles = Role::with('permissions')->where('name', '!=', 'superadmin')->latest()->get();
                $query = $request->query('q');
                if (!empty($query)) {
                    $roles = $roles->where('name', 'LIKE', '%' . $query . '%');
                }

                return DataTables::of($roles)
                    ->addColumn('permissions', function ($role) {
                        return view('backend.pages.role_and_permission.permission', compact('role'))->render();
                    })
                    ->escapeColumns([])
                    ->rawColumns(['permissions'])
                    ->addColumn('action','backend.pages.role_and_permission.action')
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('backend.pages.role_and_permission.index');
        }

        public function add_edit($id=null){
            $permission_group = User::getPermissionGroup();
            if($id==null){
                return view('backend.pages.role_and_permission.add_edit',compact('permission_group'));
            }
            else{
                $role= Role::find($id);
                $permissions = Permission::all();
                return view('backend.pages.role_and_permission.add_edit',compact('permission_group','role','permissions'));
            }

        }

        public function store(Request $request){
            $request->validate([
                'name'=>'required',
            ]);
            $role = new Role;
            $role->name= $request->name;
            $role->save();
            //$permission = new Permission;
            $role->syncPermissions($request->permission);
            $role->save();
            if($role){
                OwnClasses::ActivityLoger('success','adminstration','role create','User role create successfully',Auth::user()->id);
                return redirect()->route('role-permission.index')->with('message','User Role Create Successfully');
            }
            else{
                OwnClasses::ActivityLoger('error','adminstration','role create','User role create failed',Auth::user()->id);
                return redirect()->route('role-permission.index')->with('error','!Opps Something wrong Try again');
            }
        }

        public function update(Request $request,$id){
            $request->validate([
                'name'=>'required',
            ]);

            $role = Role::find($id);
            $role->name = $request->name;
            $role->update();
            $role->syncPermissions($request->permission);
            if($role){
                OwnClasses::ActivityLoger('success','adminstration','role update','User role update successfully',Auth::user()->id);
                return redirect()->route('role-permission.index')->with('message','User Role Update Successfully');
            }
            else{
                OwnClasses::ActivityLoger('error','adminstration','role update','User role update failed',Auth::user()->id);
                return redirect()->route('role-permission.index')->with('error','!Opps Something wrong Try again');
            }


        }
}
