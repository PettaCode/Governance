<?php

namespace App\Models;

use Database\ORM\Model as BaseModel;


class Family_tree_group extends BaseModel
{
	//this table will have the collection all the family id in one place
	//each family will be given name and the family ID
	public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id');
    }
}