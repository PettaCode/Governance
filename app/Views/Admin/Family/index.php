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
<h1>My Family - </h1>
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
                echo "<td></td>";
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