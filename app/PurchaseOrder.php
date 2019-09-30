<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
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
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function purchase_order_items()
    {
        return $this->hasMany('App\PurchaseOrderItem');
    }
    public function purchase_order_approvals()
    {
        return $this->hasMany('App\PurchaseOrderApproval');
    }
}
