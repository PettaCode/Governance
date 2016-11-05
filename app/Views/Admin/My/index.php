<section class="content-header">
<h1>My Profile </h1>
<ol class="breadcrumb">
	<li>
		<a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('system', 'Dashboard'); ?></a>
	</li>
	<li>
		Profile
	</li>
</ol>
</section>
<section class="content">
<div class="box box-primary">
	<div class="box-body">
	<?= Session::getMessages(); ?>
	<table id="left" class="table table-striped table-hover responsive">
            <thead>
            <tr >
            	<td style="text-align: center; vertical-align: middle;">User Name</td>
            	<td><a href='<?= site_url('admin/profile'); ?>'><?= $myuser['0']->username ?></a></td>
            </tr>
                <tr >
                    <td style="text-align: center; vertical-align: middle;">Name</td>
                    <td><?= $myuser['0']->realname ?></td>
                </tr>
                <tr>
                	<td style="text-align: center; vertical-align: middle;">E-mail</td>
                	<td><?= $myuser['0']->email ?></td>
                </tr>
                <tr>
                	<td style="text-align: center; vertical-align: middle;">Family Code</td>
                	<td><a href='<?= site_url('admin/family'); ?>'>Happy Family</a></td>
                </tr>
                <tr>
                	<td style="text-align: center; vertical-align: middle;">Created At</td>
                	<td><a href='<?= site_url('admin/dashboard'); ?>'>This Wheek</a></td>
                </tr>
			</thead>
	</table>
	
	</div>
	</div>
	</section>