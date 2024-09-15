<?php 
$edit_data		=	$this->db->get_where('acd_session' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo ('Modifier la session');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/acd_session/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Nom de session');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('À partir de la date');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="datepicker form-control" name="strt_dt" value="<?php echo $row['strt_dt'];?>"/>
                        </div>
                    </div>
                    
                        <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('À ce jour');?></label>
                        <div class="col-sm-5">
                            <input type="text" class="datepicker form-control" name="end_dt" value="<?php echo $row['end_dt'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Est ouvert');?></label>
                        <div class="col-sm-5">
                            <select name="is_open" class="form-control">
							
                                        <option <?php echo ($row['is_open']=='0')?'selected':'';?> value="0">Non</option>
										 <option <?php echo ($row['is_open']=='1')?'selected':'';?> value="1">Oui</option>
                             
                                
                            </select>
                        </div>
                    </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo ('Modifier la session');?></button>
						</div>
					</div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


