<?php
/**
 * Dasboard - Implements a simple Administration Dashboard.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Controllers\Admin;

use App\Core\BackendController;

use App\Models\LogData;

use Auth;
use Hash;
use Input;
use Redirect;
use Validator;
use View;
use DB;


class Report extends BackendController
{

    public function index()
    {
        $logs = LogData::all();
        return $this->getView()
            ->shares('title', __d('system', 'Report'))
            ->with('logs', $logs);
    }
}
