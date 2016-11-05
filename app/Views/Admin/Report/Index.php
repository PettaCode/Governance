<section class="content-header">
    <h1><?= __d('system', 'Report'); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('system', 'Report'); ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<?= Session::getMessages();?>

<div class="box box-default">
    <div class="box-header with-border">
        <div class="box-tools">
        </div>
    </div>
    <br>
    <br>

    <div class="box-body no-padding">
        
        <table id='left' class='table table-striped table-hover responsive'>
            <thead>
                <tr class="bg-navy disabled">
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Id'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Form Id'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Action'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'User Id'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'Notes'); ?></th>
                    <th style='text-align: center; vertical-align: middle;'><?= __d('users', 'updated At'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($logs as $log) {
                    ?>
                <tr>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo $log->id;?></td>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo $log->form_id;?></td>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo $log->action;?></td>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo $log->user_id;?></td>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo $log->note;?></td>
                    <td style='text-align: center; vertical-align: middle;' ><?php echo date("d-m-Y", strtotime($log->updated_at));?></td>
                </tr>
                <?php }?>
            </tbody>

        </table>
    </div>
</div>

</section>
