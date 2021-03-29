<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentTierChange extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }
    public function changedBy()
    {
        return $this->belongsTo('App\User', 'id', 'changed_by');
    }
    public function newTier()
    {
        return $this->belongsTo('App\Tier', 'id', 'new_tier_id');
    }
    public function previousTier()
    {
        return $this->belongsTo('App\Tier', 'id', 'previous_tier_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    // Children
}
