<?php
/**
* Family_relation 
* id for each varity of relation
*/
namespace App\Models;

use Database\ORM\Model as BaseModel;

class Family_relation extends BaseModel
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