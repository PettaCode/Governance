<?php

namespace App\Models;

use Database\ORM\Model as BaseModel;


class GroupAccountToApprovedCustomerUser extends BaseModel
{

	protected $fillable = ['group_account_id','customer_id','group_account_category_id','created_customer_id','created'];
	public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public $timestamps = false;
}
