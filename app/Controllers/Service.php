<?php
/**
* santhohs for codepack 1.0
*/
namespace App\Controllers;

use App\Core\Controller;

use View;

use DB;

class Service extends Controller
{
	
	/**
	fetch function will all the forms and sub function
	*/
	public function fetch()
	{
		$countform =  DB::table('forms_details')->count();
		$forms = DB::table('forms_details')->get();
		# code...
		return View::make('Welcome/Service')
            ->shares('title', __('Service'))
            ->shares('countform',$countform)
            ->shares('forms',$forms);
	}
	public function fetchme($code)
	{
		# connect to the database 

		$codes = $code;
		return View::make('Welcome/Form')
            ->shares('title', __('Form'))
            ->shares('countform',$codes);

		
	}
}
?>