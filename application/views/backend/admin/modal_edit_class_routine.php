<?php 
$edit_data		=	$this->db->get_where('class_routine' , array('class_routine_id' => $param2) )->result_array();
?>
<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/class_routine/do_update/'.$row['class_routine_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Classe');?></label>
                    <div class="col-sm-5">
                        <select name="class_id" class="form-control">
                            <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row2):
                            ?>
                                <option value="<?php echo $row2['class_id'];?>" <?php if($row['class_id']==$row2['class_id'])echo 'selected';?>>
                                    <?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Matiére');?></label>
                    <div class="col-sm-5">
                        <select name="subject_id" class="form-control">
                            <?php 
                            $subjects = $this->db->get('subject')->result_array();
                            foreach($subjects as $row2):
                            ?>
                                <option value="<?php echo $row2['subject_id'];?>" <?php if($row['subject_id']==$row2['subject_id'])echo 'selected';?>>
                                    <?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Jour');?></label>
                    <div class="col-sm-5">
                        <select name="day" class="form-control">
                            <option value="Dimanche" 	<?php if($row['day']=='Dimanche')echo 'selected="selected"';?>>Dimanche</option>
                            <option value="Lundi" 		<?php if($row['day']=='Lundi')echo 'selected="selected"';?>>Lundi</option>
                            <option value="Mardi" 		<?php if($row['day']=='Mardi')echo 'selected="selected"';?>>Mardi</option>
                            <option value="Mercredi" 	<?php if($row['day']=='Mercredi')echo 'selected="selected"';?>>Mercredi</option>
                            <option value="Jeudi" 	    <?php if($row['day']=='Jeudi')echo 'selected="selected"';?>>Jeudi</option>
                          
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Heure de début');?></label>
                    <div class="col-sm-5">
                        <?php 
                            if($row['time_start'] < 13)
                            {
                                $time_start		=	$row['time_start'];
                                $starting_ampm	=	1;
                            }
                            else if($row['time_start'] > 12)
                            {
                                $time_start		=	$row['time_start'] - 12;
                                $starting_ampm	=	2;
                            }
                            
                        ?>
                        <select name="time_start" class="form-control">
                            <?php for($i = 0; $i <= 12 ; $i++):?>
                                <option value="<?php echo $i;?>" <?php if($i ==$time_start)echo 'selected="selected"';?>>
                                    <?php echo $i.":30";?></option>
                            <?php endfor;?>
                        </select>
                        <select name="starting_ampm" class="form-control">
                            <option value="1" <?php if($starting_ampm	==	'1')echo 'selected="selected"';?>>am</option>
                            <option value="2" <?php if($starting_ampm	==	'2')echo 'selected="selected"';?>>pm</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ('Heure de fin');?></label>
                    <div class="col-sm-5">
                        
                        
                        <?php 
                            if($row['time_end'] < 13)
                            {
                                $time_end		=	$row['time_end'];
                                $ending_ampm	=	1;
                            }
                            else if($row['time_end'] > 12)
                            {
                                $time_end		=	$row['time_end'] - 12;
                                $ending_ampm	=	2;
                            }
                            
                        ?>
                        <select name="time_end" class="form-control">
                            <?php for($i = 0; $i <= 12 ; $i++):?>
                                <option value="<?php echo $i;?>" <?php if($i ==$time_end)echo 'selected="selected"';?>>
                                    <?php echo $i.":30"?></option>
                            <?php endfor;?>
                        </select>
                        <select name="ending_ampm" class="form-control">
                            <option value="1" <?php if($ending_ampm	==	'1')echo 'selected="selected"';?>>am</option>
                            <option value="2" <?php if($ending_ampm	==	'2')echo 'selected="selected"';?>>pm</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-info"><?php echo ('Modifier l\'emploi du temps');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>