<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tier extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes, UuidTrait;
    public $incrementing = false;


    // Children
    public function agents()
    {
        return $this->hasMany('App\Agent');
    }
    public function agentCommissions()
    {
        return $this->hasMany('App\AgentCommission');
    }
    public function agentTierChanges()
    {
        return $this->hasMany('App\Tier');
    }

    // Parents
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

}
