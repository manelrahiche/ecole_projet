<?php $class_info = $this->db->get('class')->result_array(); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo ('Ajouter un matériel d\'étude'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <?php echo form_open(base_url().'index.php?teacher/study_material/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Date'); ?></label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="date here">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ('Titre'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" name="title" class="form-control" id="field-1" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo ('Description'); ?></label>

                        <div class="col-sm-9">
                            <textarea name="description" class="form-control wysihtml5" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo ('Classe'); ?></label>

                        <div class="col-sm-5">
                            <select name="class_id" class="form-control">
                                <option value=""><?php echo ('Select class'); ?></option>
                                <?php foreach ($class_info as $row) { ?>
                                        <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo ('Fichier'); ?></label>

                        <div class="col-sm-5">

                            <input type="file" name="file_name" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo ('Type de fichier'); ?></label>

                        <div class="col-sm-5">
                            <select name="file_type" class="form-control">
                                <option value=""><?php echo ('Selectionner le type de fichier'); ?></option>
                                <option value="Image"><?php echo ('Image'); ?></option>
                                <option value="Doc"><?php echo ('Document'); ?></option>
                                <option value="PDF"><?php echo ('PDF'); ?></option>
                                <option value="Excel"><?php echo ('Excel'); ?></option>
                                <option value="Other"><?php echo ('autre'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>