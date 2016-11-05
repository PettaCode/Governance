<?php
/**
* 
*/
namespace App\Controllers\Admin;

use App\Core\BackendController;
use Auth;
use Hash;
use Input;
use Redirect;
use Validator;
use View;
use DB;

class My extends BackendController
{
	
	public function index()
	{
		$user = Auth::user();
		# code...
		$myuser = DB::table('users')
		->select('*')
		->where('id','=',$user->id)
		->get();
		//pr($myuser);exit;
		return $this->getView()
			->with('user', $user)
            ->shares('title',  __d('family', 'My Profile'))
            ->shares('myuser',$myuser);
	}
}
?>