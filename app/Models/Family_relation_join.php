<?php
/**
* Family_relation_join 
* it is like facebook relation ship table
*/


namespace App\Models;

use Database\ORM\Model as BaseModel;

class Family_relation_join extends BaseModel
{
	
	function __construct(argument)
	{
		# code...
	}
	public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id');
    }
}
?>