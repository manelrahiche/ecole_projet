<<div class="row">
	<div class="col-md-12">
		<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
				<a href="#list" data-toggle="tab">
					<i class="entypo-menu"></i> 
					<?php echo ('Gestion des notes');?>
				</a>
			</li>
		</ul>
		<!------CONTROL TABS END------>
	
		<!----TABLE LISTING STARTS-->
		<div class="tab-pane <?php if(!isset($edit_data) && !isset($personal_profile) && !isset($academic_result)) echo 'active';?>" id="list">
			<center>
				<?php echo form_open(base_url() . 'index.php?teacher/marks'); ?>
				<table border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover table-striped">
					<tr>
						<td><?php echo ('Sélectionner une saison');?></td>
						<td><?php echo ('Sélectionner une classe');?></td>
						<td><?php echo ('Sélectionner une matière');?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
							<select name="exam_id" class="form-control">
								<option value=""><?php echo ('Sélectionner une saison');?></option>
								<?php 
								$exams = $this->db->get('exam')->result_array();
								foreach($exams as $row):
								?>
									<option value="<?php echo $row['exam_id'];?>"
										<?php if($exam_id == $row['exam_id']) echo 'selected';?>>
										<?php echo $row['name'];?>
									</option>
								<?php endforeach; ?>
							</select>
						</td>
						<td>
							<select name="class_id" class="form-control" onchange="show_subjects(this.value)">
								<option value=""><?php echo ('Sélectionner une classe');?></option>
								<?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
								?>
									<option value="<?php echo $row['class_id'];?>"
										<?php if($class_id == $row['class_id']) echo 'selected';?>>
										<?php echo $row['name'];?>
									</option>
								<?php endforeach; ?>
							</select>
						</td>
						<td>
							<!-----SELECT SUBJECT ACCORDING TO SELECTED CLASS-------->
							<?php foreach($classes as $row): ?>
								<select name="<?php if($class_id == $row['class_id']) echo 'subject_id'; else echo 'temp';?>"
									id="subject_id_<?php echo $row['class_id'];?>" 
									style="display:<?php if($class_id == $row['class_id']) echo 'block'; else echo 'none';?>;" 
									class="form-control">
									<option value="">Matière pour la classe <?php echo $row['name'];?></option>
									<?php 
									$subjects = $this->crud_model->get_subjects_by_class($row['class_id']); 
									foreach($subjects as $row2): ?>
										<option value="<?php echo $row2['subject_id'];?>"
											<?php if(isset($subject_id) && $subject_id == $row2['subject_id']) echo 'selected="selected"'; ?>>
											<?php echo $row2['name'];?>
										</option>
									<?php endforeach; ?>
								</select> 
							<?php endforeach; ?>
							
							<select name="temp" id="subject_id_0" 
								style="display:<?php if(isset($subject_id) && $subject_id > 0) echo 'none'; else echo 'block';?>;" 
								class="form-control">
								<option value="">Sélectionnez une classe d'abord</option>
							</select>
						</td>
						<td>
							<input type="hidden" name="operation" value="selection" />
							<input type="submit" value="<?php echo ('Gérer les notes');?>" class="btn btn-info" />
						</td>
					</tr>
				</table>
				<?php echo form_close(); ?>
			</center>
			<br /><br />

			<?php if($exam_id > 0 && $class_id > 0 && $subject_id > 0): ?>
				<?php 
				// Créer les entrées de notes si elles n'existent pas
				$students = $this->crud_model->get_students($class_id);
				foreach($students as $row):
					$verify_data = array(
						'exam_id' => $exam_id,
						'class_id' => $class_id,
						'subject_id' => $subject_id,
						'student_id' => $row['student_id']
					);
					$query = $this->db->get_where('mark', $verify_data);
					if($query->num_rows() < 1)
						$this->db->insert('mark', $verify_data);
				endforeach;
				?>

				<?php echo form_open(base_url() . 'index.php?teacher/marks/' . $exam_id . '/' . $class_id . '/' . $subject_id); ?>
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<td><?php echo ('Élève');?></td>
							<td><?php echo ('Devoir');?> (/10)</td>
							<td><?php echo ('Composition');?> (/10)</td>
							<td><?php echo ('Commentaire');?></td>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach($students as $row):
							$verify_data = array(
								'exam_id' => $exam_id,
								'class_id' => $class_id,
								'subject_id' => $subject_id,
								'student_id' => $row['student_id']
							);
							$query = $this->db->get_where('mark', $verify_data); 
							$marks = $query->result_array();
							foreach($marks as $row2):
						?>
							<tr>
								<td><?php echo $row['name'];?></td>
								<td>
									<input type="float" value="<?php echo $row2['devoir'];?>" name="marks[<?php echo $row2['mark_id']; ?>][devoir]" class="form-control" />
								</td>
								<td>
									<input type="float" value="<?php echo $row2['exam'];?>" name="marks[<?php echo $row2['mark_id']; ?>][exam]" class="form-control" />
								</td>
								<td>
									<textarea name="marks[<?php echo $row2['mark_id']; ?>][comment]" class="form-control"><?php echo $row2['comment'];?></textarea>
								</td>
							</tr>
						<?php 
							endforeach;
						endforeach;
						?>
					</tbody>
				</table>

				<input type="hidden" name="operation" value="update_all" />
				<button type="submit" class="btn btn-primary">Mettre à jour toutes les notes</button>

				<?php echo form_close(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>


<script type="text/javascript">
    function show_subjects(class_id) {
        for(i = 0; i <= 100; i++) {
            try {
                document.getElementById('subject_id_' + i).style.display = 'none';
                document.getElementById('subject_id_' + i).setAttribute("name", "temp");
            } catch(err) {}
        }
        document.getElementById('subject_id_' + class_id).style.display = 'block';
        document.getElementById('subject_id_' + class_id).setAttribute("name", "subject_id");
    }
</script>
