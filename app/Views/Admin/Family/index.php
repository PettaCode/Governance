<?php
//use DB;
$namez = array();
for ($i=0; $i <count($familyGroup) ; $i++){
	$name= DB::table('users')
->select('username')
->where('id','=',$familyGroup[$i]->secondUserID)
->get();
array_push($namez, $name['0']->username);

}
//pr($namez);exit;


?>
<section class="content-header">
<h1>My Family - <a class='btn btn-sm btn-info' href='#' data-toggle='modal' data-target='#confirm' title='" .__d('users', 'Reject this Form') ."' role='button'><i class='fa fa-upload'></i></a></h1>
<ol class="breadcrumb">
	<li>
		<a href='<?= site_url('admin/dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('system', 'Dashboard'); ?></a>
	</li>
	<li>
		Pages
	</li>
</ol>
</section>
<section class="content">
<div class="box box-primary">
	<div class="box-body">
	<?= Session::getMessages(); ?>
	<table id="left" class="table table-striped table-hover responsive">
            <thead>
                <tr class="bg-navy disabled">
                    <th style="text-align: center; vertical-align: middle;">Name</th>
                    <th style="text-align: center; vertical-align: middle;">Second Person</th>
                    <th style="text-align: center; vertical-align: middle;">Relation</th>
                    <th style="text-align: center; vertical-align: middle;">Action</th>
                </tr>
<?php
for ($i=0; $i <count($familyGroup) ; $i++) { 
	# code...
	echo "<tr><td>".$familyGroup[$i]->username ."</td>
                <td>".$namez[$i]."</td>
                <td>".$familyGroup[$i]->name_relation."</td>";

                echo "<td style='float:right'><a class='btn btn-sm btn-success' style='margin-right:5px;' href=".site_url('admin/profile')." title='" .__d('users', 'Edit this User') ."' role='button'><i class='fa fa-pencil'></i></a>";
                echo "<a class='btn btn-sm btn-info' href='#' data-toggle='modal' data-target='#confirm_".$namez[$i]."' title='" .__d('users', 'Reject this Form') ."' role='button'><i class='fa fa-upload'></i></a></td>";
                echo "</tr>";
}
?>
                
            </thead>
            <tbody>
                            </tbody>

        </table>
		
	</div>
</div>
	
</section>
<?php 
for ($i=0; $i <count($familyGroup) ; $i++) { 
echo "<div class='modal modal-default' id='confirm_".$namez[$i]."' >"
?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?= __d('forms', 'Upload Address Proof?'); ?></h4>
            </div>
            <div class="modal-body">
            	<p>You are uploading for <b><?php echo $namez[$i];?></b></p>
                <input type="file" name="datafile" size="40">

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" style="flost:right" class="btn btn-primary pull-left col-md-3" type="button"><?= __d('users', 'Cancel'); ?></button>
                <button data-dismiss="modal" style="flost:right" class="btn btn-primary pull-left col-md-3" id="upload" type="button"><?= __d('users', 'Upload'); ?></button>
                    <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<?php }?>
<div class='modal modal-default' id='confirm'>
 	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?= __d('forms', 'Upload Address Proof?'); ?></h4>
            </div>
            <div class="modal-body">
            	<p>You are uploading for <b>Whole Family</b></p>
                <input type="file" name="datafile" size="40">

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" style="flost:right" class="btn btn-primary pull-left col-md-3" type="button"><?= __d('users', 'Cancel'); ?></button>
                <button data-dismiss="modal" style="flost:right" class="btn btn-primary pull-left col-md-3" id="upload" type="button"><?= __d('users', 'Upload'); ?></button>
                    <input type="hidden" name="csrfToken" value="<?= $csrfToken; ?>" />
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click','#upload',function(){
			alert('File Upload Scuccess')
		});
	});
</script>