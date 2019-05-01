<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SandType extends Model
{
    //
    use SoftDeletes;

    public function farms()
    {
        return $this->hasMany('App\Farm');
    }
}
