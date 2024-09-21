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
					<?php echo ('Emploi du temps');?>
                    	</a></li>
		</ul>

    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane active" id="list">
				<div class="panel-group joined" id="accordion-test-2">
                	
                        
                
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                		<h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php echo $row['class_id'];?>">
                                        <i class="entypo-rss"></i> Classe <?php echo $row['class_id'];?>
                                    </a>
                                    </h4>
                                </div>
                
                                <div id="collapse" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <table cellpadding="0" cellspacing="0" border="0"  class="table table-bordered table-hover table-striped">
                                            <tbody>
                                                <?php 
                                                for($d=1;$d<=5;$d++):
                                                
                                                if($d==1)$day='Dimanche';
                                                else if($d==2)$day='Lundi';
                                                else if($d==3)$day='Mardi';
                                                else if($d==4)$day='Mercredi';
                                                else if($d==5)$day='Jeudi';
                                               
                                                ?>
                                                <tr class="gradeA">
                                                    <td width="100"><?php echo strtoupper($day);?></td>
                                                    <td>
                                                    	<?php
														$this->db->order_by("time_start", "asc");
														$this->db->where('day' , $day);
														$this->db->where('class_id' , $row['class_id']);
														$routines	=	$this->db->get('class_routine')->result_array();
														foreach($routines as $row2):
														?>
															<button class="btn btn-primary" >
                                                         <?php echo $this->crud_model->get_subject_name_by_id($row2['subject_id']);?>
																<?php echo '('.$row2['time_start'].':30-'.$row2['time_end'].':30)';?>
                                                            </button>
														<?php endforeach;?>

                                                    </td>
                                                </tr>
                                                <?php endfor;?>
                                                
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
  				</div>
			</div>
            <!----TABLE LISTING ENDS-->
            
            
			
            
		</div>
	</div>
</div>
<?php endforeach;?>
