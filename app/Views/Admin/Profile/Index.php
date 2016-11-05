<style>
    .btn-black {
    color: #fff;
    background-color: #333;
    border-color: #111;
    }
    .btn-black:hover, .btn-black:focus, .btn-black:active, .btn-black.active, .open .dropdown-toggle.btn-black {
    color: #fff;
    background-color: #111;
    border-color: #000;
    }
    .is-admin-flag{
        color:#8AC756;
    }

    #contact li.checkbox {
        line-height: 11px;
    }

    #contact li.checkbox input {
        height: auto;
        width: auto;
    }

    #contact li.checkbox span {
        padding-left: 6px;
    }

    #contact li.checkbox label {
        line-height: 12px;
    }

    .accountData li.checkbox {
        line-height: 11px;
    }

    .accountData li.checkbox input {
        height: auto;
        width: auto;
    }

    .accountData li.checkbox span {
        padding-left: 6px;
    }

    .accountData fieldset {
        padding: 20px;
        border : 1px solid #eee;
        -webkit-border-radius:5px;
    }

    .accountData legend {
        border: 1px solid #EEEEEE;
        color: #555555;
        font-family: open sans;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.25px;
        margin-bottom: 0 !important;
        padding: 7px 10px;
        text-align: center;
    }

    .accountData li.checkbox label {
        line-height: 19px;
    }
    .line {
        height: 1px;
        background-color: #B2B2B2;
        margin: 30px 50px 20px 50px;
    }

    .cc-expired {
        color: red;
    }

    table.cc-container>tbody>tr, table.cc-container>tbody>tr>td,table.cc-container>thead>tr,table.cc-container>thead>tr>th {
        border-top: none !important;
        border-bottom: none !important;
    }

    table.table-responsive {
        width: 100%;
    }

    .cc-span {
        width: 100%;
        background: #F5F5F5;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        padding: 10px 5px;
        display: inline-block;
        vertical-align: middle;
        line-height: 30px;
    }

    .cc-header {
        background: none;
        border: none;
        border-radius: 0;
        line-height: 10px;
    }
    .cc-span > span {
        float: left;
    }

    .card-title {
        width: 60%;
    }

    .card-expiry {
        width: 20%;
    }

    .title-head {
        font-size: 14px;
        width: 20%;
        text-align: center;
    }

    .card-remove {
        width: 20%;
        text-align: center;
        font-size: 15px;
    }

    .no-cards {
        text-align: center;
        font-size: 30px;
    }

    .modal {
        top: 70px;
    }

    #modal {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 )
                    url('/theme/LimeSuperDashboard/images/loading1.gif')
                    50% 50%
                    no-repeat;
    }

        /* When the body has the loading class, we turn
        the scrollbar off with overflow:hidden */
    body.loading {
        overflow: hidden;
    }

        /* Anytime the body has the loading class, our
           modal element will be visible */
    body.loading #modal {
        display: block;
    }

    .existingUserLabel {
        float:left;
        margin:11px;
        width:100px;
    }
    .multiContainer{
        background-color:#0099cc;
        clear: both;
        color: #FCFCFC;
        display: block;
        float: left;
        font-family: pt sans;
        font-size: 20px;
        font-weight: 600;
        line-height: 16px;
        margin: 0;
        padding: 15px;
        position: relative;
        text-align: left;
        width: 100%;
        z-index: 88;

    }

    .DocumentList {
        overflow-x:hidden;
        overflow-y:scroll;
        height:150px;
        width:100%;
        padding: 0 15px;
    }

    .DocumentItem {
        border:1px solid black;
        padding:0;
        height:200px;
    }
    .xeroDrop{
        border: 1px solid #EBEBEB;
        color: #444444;
        /* float: right; */
        font-family: pt sans;
        font-size: 22px;
        margin-right: 10px;
        text-align: center;
        width: 100px;
    }

    .xeroList{
        border: 1px solid #444444;
        color: #444444;
        /* float: right; */
        font-family: pt sans;
        font-size: 22px;
        text-align: center;
    }
</style>
<section class="content-header">
    <h1><?= __d('system', 'User Profile : {0}', $user->username); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('users/dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('system', 'Dashboard'); ?></a></li>
        <li><a href='<?= site_url('admin/users'); ?>'><?= __d('system', 'Users'); ?></a></li>
        <li><?= __d('system', 'User Profile'); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<?= Session::getMessages(); ?>

<div  class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __d('system', 'Change Password'); ?></h3>
    </div>

    <div class="box-body">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <form method='post' role="form">

            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'Current Password'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                    <input name="current_password" id="current_password" type="password" class="form-control" value="" placeholder="<?= __d('system', 'Insert the current Password'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'New Password'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                    <input name="password" id="password" type="password" class="form-control" value="" placeholder="<?= __d('system', 'Insert the new Password'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'Confirm Password'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                    <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" value="" placeholder="<?= __d('system', 'Verify the new Password'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <font color='#CC0000'>*</font><?= __d('system', 'Required field'); ?>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="submit" name="submit" class="btn btn-success col-sm-3 pull-right" value="<?= __d('system', 'Save'); ?>">
                </div>
            </div>
            <br>

            <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />

            </form>
        </div>
    </div>
</div>

<div  class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __d('system', 'Users'); ?></h3>
    </div>

    <div class="box-body">
        <div class="col-md-6">
            <div class="about-us">
                <h3>EXISTING <i>USERS</i></h3>
                <?php $count = 0;
                    if (isset($groupData) && !empty($groupData)) {
                        foreach ($groupData as $groupUsers) {
                        // pr($groupUsers);exit;
                                $count++;?>
                                <p>
                                    <strong><?php echo ucfirst($groupUsers->username); ?></strong><span>&nbsp;&nbsp;(<a href="mailto:<?php echo $groupUsers->email; ?>" target='_blank'><?php echo $groupUsers->email; ?></a>)</span>
                                        <?php if ($groupUsers->admin) { ?>
                                    <span class='is-admin-flag'>&nbsp;&nbsp;<i class='fa fa-check'></i>&nbsp;Admin</span>
                                    <?php } ?>
                                    <br>
                                    <?php  if ($isAdmin) { ?>
                                    <button type="submit" class="btn btn-xs btn-black removeUserBtn" data-account-id="<?php echo $groupUsers->id; ?>">Remove this user</button>
                                    <button type="submit" class="btn btn-xs <?php echo $groupUsers->admin? 'btn-danger':'btn-primary'; ?> makeAdmin" data-user-id="<?php echo $groupUsers->id; ?>" data-admin-id="<?php echo $groupUsers->admin; ?>" data-group-id="<?php echo $groupUsers->group_account_id; ?> " style="width:100px"><?php echo $groupUsers->admin? 'Remove Admin':'Make Admin'; ?></button>
                                    <?php }  ?>
                                </p>
                                <?php
                        }
                        if($count == 0){?>
                            <p><strong>There are no users connected to this account</strong></p>
                        <?php }
                    } else {
                    ?>
                    <p><strong>There are no users connected to this account</strong></p>
                    <?php } ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12" id='addNewUseBtnDiv' style='margin-top:66px;'>
                <div class="header-post" id="intro2">
                    <a href="#" id='addNewUseBtn' title="">Add New User <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
                    <!-- Form 1 Data -->
            <div class='accountData' id="form1" style='display:none;'>

                <div id="message"></div>

                
                <fieldset>

                <legend id='addEditFormTitle1'>Please fill in the following form to add new user</legend>
                    <div class="my-cart calc-shipping-sec">
                        <div class="cart-heading">
                        </div>
                        <form action="javascript:void(0)" class="form-horizontal" method='POST' role="form">
                                <input name="group_account_id" id="group_account" type="hidden" class="form-control" value="<?php echo $userGroupAccountId ; ?>" placeholder="<?= __d('users', 'Email'); ?>">
                                <input name="username" id="username" type="text" class="form-control" value="" placeholder="Enter User Name" style="display: none;">
                                <input name="email" id="email" type="email" class="form-control" value="" placeholder="<?= __d('users', 'Email'); ?>">
                                <input name="password" id="passwordid" type="password" class="form-control" value="" placeholder="Enter Password" style="display: none;">
                                <input name="password_confirmation" id="passwordIdConform" type="password" class="form-control" value="" placeholder="Enter Password Again" style="display: none;">
                                <input type="submit" name="submit" id="add_new_user"class="btn btn-success col-sm-3 pull-right" value="<?= __d('users', 'Add New User'); ?>">
                                <input type="button" name="cancel" id="cancelForm1"class="btn btn-danger col-sm-3 pull-right" value="Cancel" style="display: none;">
                                <input type="button" name="conform" id="conformForm2"class="btn btn-success col-sm-3 pull-right" value="ConForm" style="display: none;">
                                <input type="button" name="addNew" id="createAndAddUser"class="btn btn-success col-sm-3 pull-right" value="Add New User" style="display: none;">
                                <!-- <a href="#" title="" id='addForm1Data' class="green">Add New User</a>

                                <a title=""  class="processEnable green" style='background-color:#8AC756;color:#ffffff; margin-right:10px;background-image:none;border: 1px solid #8AC756;display:none;'>Processing..</a>

                                <a href="#" title="" id='cancelForm1' class="gray" style='color:#ffffff; margin-right:10px;'>Cancel</a>
                                <a href="#" title="" id='conformForm2' class="gray" style='color:#ffffff; margin-right:10px;'>conform</a>
 -->
                            <!-- </li> -->
                        </ul>
                    </div>

                </fieldset>

            </div>


    


        </div>
    </div>
</div>

<div  class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __d('system', 'Account Contact Information'); ?></h3>
    </div>

    <div class="box-body">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <form method='post' role="form">

            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'Account Name'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                    <input name="account_name" id="account_name" type="text" class="form-control" value="" placeholder="<?= __d('system', 'Account Name'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'Postal Address Line 1'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                    <input name="postal_address_1" id="postal_address_1" type="text" class="form-control" value="" placeholder="<?= __d('system', 'Postal Address Line 1'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'Postal Address Line 2 '); ?> <font color='#CC0000'></font></label>
                <div class="col-sm-8">
                    <input name="postal_address_2" id="postal_address_2" type="text" class="form-control" value="" placeholder="<?= __d('system', 'Postal Address Line 2'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'Town/Suburb'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                <input name="Town" id="town" type="text" class="form-control" value="" placeholder="<?= __d('system', 'town'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'State'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                    <input name="State" id="State" type="text" class="form-control" value="" placeholder="<?= __d('system', 'State'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'Postcode'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                    <input name="Postcode" id="Postcode" type="text" class="form-control" value="" placeholder="<?= __d('system', 'Postcode'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="name"><?= __d('system', 'Phone'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                    <input name="password_confirmation" id="password_confirmation" type="text" class="form-control" value="" placeholder="<?= __d('system', 'Phone'); ?>">
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <font color='#CC0000'>*</font><?= __d('system', 'Required field'); ?>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="submit" name="submit" class="btn btn-success col-sm-3 pull-right" value="<?= __d('system', 'Save'); ?>">
                </div>
            </div>
            <br>

            <input type="hidden" name="csrfToken1" value="<?= $csrfToken; ?>" />

            </form>
        </div>
    </div>
</div>
</section>
<?php 
Assets::js([
    template_url('js/profile.js', 'AdminLte'),
]);
echo isset($js) ? $js : '';
?>