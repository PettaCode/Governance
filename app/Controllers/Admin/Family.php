<?php
/**
* family controller
*/
namespace App\Controllers\Admin;

use App\Core\BackendController;

use App\Models\Family_tree_group; //family group id collection
use App\Models\Family_relation_join; //family relation join
use App\Models\Family_relation; //family relation description idea

use Auth;
use Hash;
use Input;
use Redirect;
use Validator;
use View;
use DB;

class Family extends BackendController
{
	
	public function index()
	{
	$user = Auth::user();
		# code...
	$familyGroup = DB::table('users')
	->join('family_tree_groups','users.family_id' ,'=','family_tree_groups.treeID')
	->join('family_relation_joins','users.family_id','=','family_relation_joins.family_id')
	->join('family_relations','family_relation_joins.relationID','=','family_relations.id')
	//->leftJoin('users','users.username','=','family_relation_joins.secondUserID')
	->select('users.username','family_relation_joins.secondUserID','family_relations.name_relation')
	->where('users.family_id','=',$user->family_id)
	->groupBy('family_relation_joins.secondUserID')
	->get();
	//pr($familyGroup);
	
	
	$arrayobj = DB::table('users')
	->select('username')
	->where('id','=',$familyGroup['0']->secondUserID)
	->get();


	

	//pr($arrayobj['0']->username);exit;

		return $this->getView()
		->with('user', $user)
            ->shares('title',  __d('family', 'Family Management'))
            ->shares('familyGroup',$familyGroup)
            ->shares('arrayobj',$arrayobj);
	}
}
?>