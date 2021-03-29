<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentCommission extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }
    public function nullified_by()
    {
        return $this->belongsTo('App\User');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function subscription()
    {
        return $this->belongsTo('App\Subscription');
    }
    public function tier()
    {
        return $this->belongsTo('App\Tier');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    // Children
}
