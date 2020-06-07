<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTypeFeature extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function userType()
    {
        return $this->belongsTo('App\UserType');
    }
    public function feature()
    {
        return $this->belongsTo('App\Feature');
    }

    // Children
    public function roleUserTypeFeature()
    {
        return $this->hasMany('App\RoleUserTypeFeature');
    }
}
