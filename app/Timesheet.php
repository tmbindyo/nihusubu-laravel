<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timesheet extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
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
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
    public function issue()
    {
        return $this->belongsTo('App\Issue');
    }
    public function timesheetApprover()
    {
        return $this->belongsTo('App\User', 'approved_by', 'id');
    }



}
