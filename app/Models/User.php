<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'user_name',
        'slug',
        'status',
        'email',
        'password',
        'photo',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function creator() {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updator() {
        return $this->belongsTo(User::class,'updated_by');
    }

    public static function getPermissionGroup(){
        $permission_group = DB::table('permissions')->select('permission_group')->groupBy('permission_group')->orderBy('created_at','ASC')->get();
        return $permission_group;
    }

    public static function getPermission($group_name){
        $permissions = DB::table('permissions')->where('permission_group',$group_name)->get();
        return $permissions;
    }
}
