<section class="content-header">
    <h1><?= __d('system', 'Dashboard'); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('system', 'Dashboard'); ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<?= Session::getMessages(); ?>


<div class="box box-default">
    <div class="box-header with-border">
        <div class="box-tools">
        </div>
    </div>
    
        <div class="box-body">
        <?php if($user->id != 5){?>
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputFinancialYear" class="col-sm-4 control-label" style="text-align: right;">Account:</label>
                <div class="col-sm-8">
                    <select name="role" id="role" class="form-control select2">
                        <option >-- Select -- </option>
                        <option value="1">1 - Cochin</option>
                        <option value="2">2 - Ernakulam </option>
                        <option value="3">3 - Irinjalakuda</option>
                        <option value="4">4 - Kotta</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <br>
        <?php }?>

        <?php if($user->id == 1){?>
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputFinancialYear" class="col-sm-4 control-label" style="text-align: right;">Department:</label>
                <div class="col-sm-8">
                    <select name="role" id="role" class="form-control select2">
                        <option > -- Select -- </option>
                        <option value="1">1 - Transport </option>
                        <option value="2">2 - Panjayath </option>
                        <option value="3">3 - Vigilance </option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <br>
        <?php }?>

        <?php if($user->id == 5){?>
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputFinancialYear" class="col-sm-4 control-label" style="text-align: right;">Family Member:</label>
                <div class="col-sm-8">
                    <select name="role" id="role" class="form-control select2">
                        <option > -- Select -- </option>
                        <option value="1">1 - XXX </option>
                        <option value="2">2 - YYY </option>
                        <option value="3">3 - ZZZ </option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <br>
        <?php }?>

        <?php if($user->id != 5){?>
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputFinancialYear" class="col-sm-4 control-label" style="text-align: right;">Type:</label>
                <div class="col-sm-8">
                     <select name="role" id="role" class="form-control select2">
                        <option> -- Select -- </option>
                        <option value="1">1 - Driving Licence</option>
                        <option value="2">2 - Birth Certificate</option>
                        <option value="3">3 - Death Certificate</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <br>
        <?php }?>
    </div>

    <div class="box-body">
        <a class='btn btn-info' href='<?= site_url('admin/forms/create'); ?>'><?= __d('users', 'Create a new Form'); ?>   <i class="fa fa-plus"></i></a>
    </div>

    <div class="box-body no-padding">

        <table id='left' class='table table-striped table-hover responsive'>
            <thead>
                <tr class="bg-navy disabled">
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Application Number'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Application Type'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Name'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Created At'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Status'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($forms as $form) {
                    switch ($form->status) {
                        case '1':
                            $status = 'Draft';
                            break;

                        case '2':
                            $status = 'Queue';
                            break;

                        case '3':
                            $status = 'Process';
                            break;
                        case '4':
                            $status = 'Complete';
                            break;

                        default:
                            $status = 'Draft';
                            break;
                    }?>
                <tr>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo $form->id;?></td>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo $form->type;?></td>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo $form->name;?></td>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo date("d-m-Y", strtotime($form->created));?></td>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo $status;?></td>
                    <td style='text-align: right; vertical-align: middle;' >
                        <div class='btn-group' role='group' aria-label='...'>
                            <a class='btn btn-sm btn-warning' href='<?php echo site_url('admin/forms/'.$form->id)?>' title='". __d('users', 'Show the Details') ."' role='button'><i class='fa fa-search'></i></a>
                            <a class='btn btn-sm btn-success' href='#' title='" .__d('users', 'Edit this User') ."' role='button'><i class='fa fa-pencil'></i></a>
                            <a class='btn btn-sm btn-danger' href='#' data-toggle='modal' data-target='#confirm_<?php echo $form->id;?>' title='" .__d('users', 'Delete this Form') ."' role='button'><i class='fa fa-remove'></i></a>
                        </div>
                    </td>
                </tr>
                <?php }?>
            </tbody>

        </table>
    </div>
</div>

</section>
<?php
if (! $forms->isEmpty()) {
    foreach ($forms as $form) {
?>
<div class="modal modal-default" id="confirm_<?= $form->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?= __d('forms', 'Delete the Form?'); ?></h4>
            </div>
            <div class="modal-body">
                <p><?= __d('forms', 'Are you sure you want to delete the Form <b>{0}</b>, the operation being irreversible?', $form->name); ?></p>
                <p><?= __d('forms', 'Please click the button <b>Delete the Form</b> to proceed, or <b>Cancel</b> to abandon the operation.'); ?></p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-primary pull-left col-md-3" type="button"><?= __d('users', 'Cancel'); ?></button>
                <form action="<?= site_url('admin/forms/' .$form->id .'/destroy'); ?>" method="POST">
                    <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />
                    <input type="submit" name="button" class="btn btn btn-danger pull-right" value="<?= __d('users', 'Delete the User'); ?>">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<?php
    }
}