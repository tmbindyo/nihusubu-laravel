<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function agentCommissions()
    {
        return $this->hasMany('App\AgentCommission');
    }
    public function agentPayments()
    {
        return $this->hasMany('App\AgentPayment');
    }
    public function agentInstitutions()
    {
        return $this->hasMany('App\Institution');
    }
    public function agentTierChanges()
    {
        return $this->hasMany('App\AgentTierChange');
    }
    public function agentUsers()
    {
        return $this->hasMany('App\UserAccount');
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
    public function approvedBy()
    {
        return $this->belongsTo('App\User', 'approved_by', 'id');
    }
    public function registeredBy()
    {
        return $this->belongsTo('App\User', 'registered_by', 'id');
    }
    public function disabledBy()
    {
        return $this->belongsTo('App\User', 'disabled_by', 'id');
    }
    public function tier()
    {
        return $this->belongsTo('App\Tier');
    }
}
