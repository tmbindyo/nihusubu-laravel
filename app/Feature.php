<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
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

    // Children
    public function user_type_features()
    {
        return $this->hasMany('App\UserTypeFeature');
    }
    public function role_user_type_features()
    {
        return $this->hasMany('App\RoleUserTypeFeature');
    }
}
