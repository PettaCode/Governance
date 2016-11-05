<?php
/**
 * Dasboard - Implements a simple Administration Dashboard.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Controllers\Admin;

use App\Core\BackendController;

use App\Models\Form;
use App\Models\GroupAccount;

use View;
use Auth;
use DB;

class Dashboard extends BackendController
{

    public function index()
    {
        $user = Auth::user();
        if($user->role_id == 1) {
        	$group_accounts = DB::table('group_accounts')
                                    ->Where('deleted','=',null)
                                     ->pluck('id');
			// pr($group_accounts);exit; 
        }
        $forms = Form::where('deleted', '=', null)->get();;
        return $this->getView()
            ->shares('title', __d('system', 'Dashboard'))
            ->with('forms', $forms)
            ->with('user', $user);
    }

    private function __updateLastModified($formId = '') {
		$formId = (int) $formId;

		if (!empty($formId)) {
			$user = Auth::user();
		}
	}

}
