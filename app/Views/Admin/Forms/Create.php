<section class="content-header">
    <h1><?= __d('users', 'Create Form'); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('users', 'Form'); ?></a></li>
        <li><a href='<?= site_url('admin/users'); ?>'><?= __d('users', 'Users'); ?></a></li>
        <li><?= __d('users', 'Create User'); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<?= Session::getMessages(); ?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __d('users', 'Create a new Form'); ?></h3>
    </div>
    <div class="box-body">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="clearfix"></div>
            <br>

            <form class="form-horizontal" action="<?= site_url('admin/users'); ?>" method='POST' role="form">

            <div class="form-group">
                <label class="col-sm-4 control-label" for="Category"><?= __d('users', 'Category'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-8">
                    <select name="role" id="role" class="form-control select2">
                        <option value="" echo 'selected'; ?>- <?= __('Choose a Category'); ?> -</option>
                        <?php foreach ($categorys as $category) {?>
                        <option value="<?= $category->id ?>" <?php echo $category->desc; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            <div class="clearfix"></div>
            <br>
            <font color='#CC0000'>*</font><?= __d('users', 'Required field'); ?>
            <hr>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" name="submit" class="btn btn-success col-sm-3 pull-right" value="<?= __d('users', 'Save'); ?>">
                </div>
            </div>

            <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />

            </form>
        </div>
    </div>
</div>

<a class='btn btn-primary' href='<?= site_url('admin/users'); ?>'><?= __d('users', '<< Previous Page'); ?></a>

</section>
