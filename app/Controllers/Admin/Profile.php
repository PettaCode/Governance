<?php
/**
 * Users - A Controller for managing the Users Authentication.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Controllers\Admin;

use App\Core\BackendController;
use App\Models\User;
use App\Models\Group_Account;
use App\Models\GroupAccountToApprovedCustomerUser;

use Auth;
use Hash;
use Input;
use Redirect;
use Validator;
use View;
use DB;


class Profile extends BackendController
{

    protected function validate(array $data, User $user)
    {
        // Prepare the Validation Rules, Messages and Attributes.
        $rules = array(
            'current_password'      => 'required|valid_password',
            'password'              => 'required|strong_password',
            'password_confirmation' => 'required|same:password',
        );

        $messages = array(
            'valid_password'  => __d('system', 'The :attribute field is invalid.'),
            'strong_password' => __d('system', 'The :attribute field is not strong enough.'),
        );

        $attributes = array(
            'current_password'      => __d('system', 'Current Password'),
            'password'              => __d('system', 'New Password'),
            'password_confirmation' => __d('system', 'Password Confirmation'),
        );

        // Add the custom Validation Rule commands.
        Validator::extend('valid_password', function($attribute, $value, $parameters) use ($user)
        {
            return Hash::check($value, $user->password);
        });

        Validator::extend('strong_password', function($attribute, $value, $parameters)
        {
            $pattern = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";

            return (preg_match($pattern, $value) === 1);
        });

        return Validator::make($data, $rules, $messages, $attributes);
    }

    public function index()
    {
        $user = Auth::user();
        $isAdmin = false;
        if($user->group_account_id) {
            // $group_account = GroupAccountToApprovedCustomerUser::where('group_account_id','=', $user->group_account_id)->get();
            $userGroupAccountId = $user->group_account_id;
            $groupData =  DB::table('group_account_to_approved_customer_users')
                ->join('users', 'group_account_to_approved_customer_users.customer_id', '=', 'users.id')
                ->where('group_account_to_approved_customer_users.group_account_id','=',$user->group_account_id)
                ->get();

            $admin = DB::table('group_account_to_approved_customer_users')
                                    ->where('group_account_id','=', $user->group_account_id)
                                     ->Where('customer_id', $user->id)
                                     ->pluck('admin');
            if($admin) 
                $isAdmin = true;
        } else {
            
            $userGroupAccountId =  DB::table('group_account_to_approved_customer_users')
                                    ->where('customer_id','=', $user->id)->pluck('group_account_id');
            
            User::where('id', '=', $user->id)->update(array('group_account_id' => $userGroupAccountId));
            
            $groupData =  DB::table('group_account_to_approved_customer_users')
                ->join('users', 'group_account_to_approved_customer_users.customer_id', '=', 'users.id')
                ->where('group_account_to_approved_customer_users.group_account_id','=',$userGroupAccountId)
                ->get();

            $admin = DB::table('group_account_to_approved_customer_users')
                                    ->where('group_account_id','=', $user->group_account_id)
                                     ->Where('customer_id', $user->id)
                                     ->pluck('admin');
            if($admin) 
                $isAdmin = true;
        }
        return $this->getView()
            ->shares('title',  __d('system', 'User Profile'))
            ->with('user', $user)
            ->with('isAdmin', $isAdmin)
            ->with('groupData', $groupData)
            ->with('userGroupAccountId', $userGroupAccountId);
    }

    public function update()
    {
        $user = Auth::user();

        // Retrieve the Input data.
        $input = Input::only('current_password', 'password', 'password_confirmation');

        // Create a Validator instance.
        $validator = $this->validate($input, $user);

        // Validate the Input.
        if ($validator->passes()) {
            $password = $input['password'];

            // Update the password on the User Model instance.
            $user->password = Hash::make($password);

            // Save the User Model instance.
            $user->save();

            // Use a Redirect to avoid the reposting the data.
            $status = __d('system', 'You have successfully updated your Password.');

            return Redirect::back()->withStatus($status);
        }

        // Collect the Validation errors.
        $status = $validator->errors()->all();

        return Redirect::back()->withStatus($status, 'danger');
    }

    public function validateEmail() {
        // echo 'gowtham';
        // exit;
        $finalarray = array();
        $input = Input::only('group_account_id', 'email');
        $userdata = User::where('email',$input['email'])->first();
        

        $finalarray['userdata'] = json_decode($userdata,true);
         
        if (!empty($userdata)) {
            // echo $userdata;
        $finalarray['userdata']['status'] = true;
            
        }else{
        $finalarray['userdata']['status'] = false;

           
        }


        echo json_encode($finalarray['userdata']);
        // pr($userdata);
        // exit;
    }

    public function createAndAddUser()
    {
        $input = Input::only('group_account_id', 'email','username','password');  
        $input['realname'] = $input['username'];
        $input['password'] = md5($input['password']);
        $input['role_id'] = 5;
        $res =  User::create($input);
        $groupdata['group_account_id'] =$input['group_account_id'];
        $groupdata['customer_id'] =$res->id;
        $groupdata['created_customer_id'] = \Auth::user()->id;
        $groupdata['created'] = date('Y-m-d H:i:s');

        GroupAccountToApprovedCustomerUser::create($groupdata);

        if($res){
            echo true;
        }else{
            echo false;
        }
        
    }

    public function addUser()
    {
        $input = Input::only( 'email','group_account_id');  
       $userdata = User::where('email',$input['email'])->orderBy('id','desc')->first();

         $exist = GroupAccountToApprovedCustomerUser::where('customer_id',$userdata->id)
                                                    ->where('group_account_id',$input['group_account_id'])
                                                    ->where('deleted',null)
                                                    ->first();

        if(empty($exist)){
              $groupdata['group_account_id'] =$input['group_account_id'];
              $groupdata['customer_id'] =$userdata->id;
              $groupdata['created_customer_id'] = \Auth::user()->id;
              $groupdata['created'] = date('Y-m-d H:i:s');

            GroupAccountToApprovedCustomerUser::create($groupdata);

            echo json_encode(['status'=>true,'message'=>'successfully Add user']);

        }else{
            echo json_encode(['status'=>false,'message'=>'User Already Exist']);
        }

    }
}
