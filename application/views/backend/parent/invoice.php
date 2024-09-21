<?php 
    $child_of_parent = $this->db->get_where('student' , array(
        'student_id' => $student_id
    ))->result_array();
    foreach ($child_of_parent as $row):
?>
<hr />
<div class="label label-primary pull-right" style="font-size: 14px;">
    <i class="entypo-user"></i> <?php echo $row['name'];?>
</div>
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo ('Paiements');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table  class="table table-bordered table-hover table-striped datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div><?php echo ('Elève');?></div></th>
                    		<th><div><?php echo ('Titre');?></div></th>
                    		<th><div><?php echo ('Description');?></div></th>
                    		<th><div><?php echo ('Montant');?></div></th>
                    		<th><div><?php echo ('Statut');?></div></th>
                    		<th><div><?php echo ('Date');?></div></th>
                    		
						</tr>
					</thead>
                    <tbody>
                    	<?php 
                            $invoices = $this->db->get_where('invoice' , array(
                                'student_id' => $row['student_id']
                            ))->result_array();
                            foreach($invoices as $row2):
                        ?>
                        <tr>
							<td><?php echo $this->crud_model->get_type_name_by_id('student',$row2['student_id']);?></td>
							<td><?php echo $row2['title'];?></td>
							<td><?php echo $row2['description'];?></td>
							<td><?php echo $row2['amount'];?></td>
							<td>
								<span class="label label-<?php if($row2['status']=='paid')echo 'success';else echo 'secondary';?>"><?php echo $row2['status'];?></span>
							</td>
							<td><?php echo date('d M,Y', $row2['creation_timestamp']);?></td>
						
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS-->
            
            
			
            
		</div>
	</div>
</div>
<?php endforeach;?>
