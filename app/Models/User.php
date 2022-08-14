<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ='users';
    protected $fillable=['id','name','email','sdt','id_role','hinh_anh'];
    public function loadList($params=[]){
        $query=DB::table($this->table)
        ->select($this->fillable);
        $list=$query->get();
        return $list;
    }
    public function loadListWithPager($params=[]){
        // dd($params);
        $query=DB::table('users')
        ->join('role','role.id','=','users.id_role')
        ->where('deleted_at',null)
        ->where('name','LIKE','%'.$params['search'].'%')
        ->select('users.*','role.ten_role');
        $list=$query->paginate(5);
        return $list;
    }
    public function getRoles(){
        $roles=DB::table('role')
        ->where('id','!=',2)
        ->get();
        return $roles;
    }
    public function saveNew($params){
        $data=array_merge($params['cols'],[
            'password'=>Hash::make($params['cols']['password'])
        ]);
        $res=DB::table($this->table)->insertGetId($data);
        return $res;
    }
    public function deleteUser($id){
        $delete=DB::table('users')
        ->where('id',$id)
        ->update(['deleted_at'=>date('Y-m-d')]);
        return $delete;
    }
    public function loadOne($id){
        $query=DB::table($this->table)
        ->find($id);
        $obj=$query;
        return $obj;
    }
    public function updateUser($id,$params){
        $data=array_merge($params['cols'],[
            'password'=>Hash::make($params['cols']['password'])
        ]);
        $res=DB::table($this->table)
        ->where('id','=',$id)
        ->update($data);
        return $res;

    }
    public function getUser(){
        $users=DB::table('users')
        ->get();
        return $users;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
