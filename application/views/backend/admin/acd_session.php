<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo ('Liste des sessions');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo ('Ajouter une session');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table class="table table-bordered datatable table-hover table-striped" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo ('Nom ');?></div></th>
                    		<th><div><?php echo ('Est ouverte');?></div></th>
                    		<th><div><?php echo ('Date de début');?></div></th>
                            <th><div><?php echo ('Date de fin');?></div></th>
                    		<th><div><?php echo ('Options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($acdSession as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo ($row['is_open'] == '1' ? "Yes" : "No");?></td>
							<td><?php echo date('d/m/Y',strtotime($row['strt_dt']));//echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);?></td>
							<td><?php echo date('d/m/Y',strtotime($row['end_dt']));?></td>
                            <td>
                              <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_acd_session/<?php echo $row['id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo ('Modifier');?>
                                            </a>
                                            &nbsp;  &nbsp;  &nbsp;
                                              <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/acd_session/delete/<?php echo $row['id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo ('Supprimer');?>
                                            </a>
              <!--              <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                         <!--           <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_acd_session/<?php echo $row['id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo ('modifier');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>-->
                                    
                                    <!-- DELETION LINK -->
                                   <!-- <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/acd_session/delete/<?php echo $row['id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo ('supprimer');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>-->
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/acd_session/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ('Nom');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('valeur requise');?>"/>
                                </div>
                            </div>
                            
                                <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ('Date de début');?></label>
                                <div class="col-sm-5">
                                   <input type="text" class="datepicker form-control" name="strt_dt" required>
                                </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ('Date de fin');?></label>
                                <div class="col-sm-5">
                                   <input type="text" class="datepicker form-control" name="end_dt" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ('Est ouverte');?></label>
                                <div class="col-sm-5">
                                    <select name="is_open" class="form-control selectboxit visible" style="width:100%;">
                                        <option value="0">Non</option>
                                        <option value="1">Oui</option>
                                    	
                                        <?php
										//endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo ('Ajouter la session');?></button>
                              </div>
							</div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
		</div>
	</div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>