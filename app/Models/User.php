<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

   
    public function insert_records($request){
        try{
            $user=new User();
            $user->name=$request->name;
            $user->Country=$request->country;
            $user->email=$request->email;
            $user->mobile_number=$request->mobile;            
            $user->About_you=$request->about_you;
            $user->birthday=$request->dateOfBirth;
            $user->password=md5('admin@123');
            $user->save();    
            return array('status'=>true,'success'=>$user);
        }
        catch(\Exception $e){
            return array('status'=>false,'error'=>$e->getMessage());
        }
    }
    public function update_records($request)
    {
        try{
            $updateUser=User::find($request->id);
            if($updateUser!=null)
            {
                $updateUser->name=$request->name;
                $updateUser->country=$request->country;
                $updateUser->email=$request->email;
                $updateUser->mobile_number=$request->mobile;
                $updateUser->birthday=$request->dateOfBirth;
                $updateUser->About_you=$request->about_you;
                $updateUser->save();
            return array('status'=>true,'success'=>$updateUser);
            }else{
                return array('status'=>false,'error'=>'profile not updated');
            }
        }
        catch (\Exception $e) {
            return array('status'=>false,'error'=>$e->getMessage()); 
        }
    }
    public function getlist()
    {
        $user=User::get();
        return array('status'=>true, 'data'=>$user);

    }
    public function find_by_id($user_id)
    { 
        try{
                $user=User::find($user_id);
                if(isset($user->id) && !empty($user))
                {
                    return array('status'=>true,'success'=>$user);
                }else{
                    return array('status'=>false,'error'=>"No data found");
                }
        }catch (\Exception $e) {
            return array('status'=>false,'error'=>$e->getMessage());
        }  
    }
}
