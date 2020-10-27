<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
{
    use HasPermissions, HasApiTokens, HasRoles, HasFactory, Searchable, HasMeta;
    protected $fillable = ['user_id', 'church_id', 'member_since'];
    protected $casts    = [];
    protected $searches = [];
    protected $guard_name = ['api'];

    public function church(){
      return $this->belongsTo(Church::class, 'church_id');
    }
    public function user(){
      return $this->belongsTo(User::class, 'user_id');
    }
    public function groups(){
      return $this->hasMany(Group::class);
    }
}
