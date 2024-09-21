<div class="mail-header" style="padding-bottom: 27px ;">
    <!-- title -->
    <h3 class="mail-title">
        <?php echo ('Ecrire un nouveau message'); ?>
    </h3>
</div>

<div class="mail-compose">

    <?php echo form_open(base_url() . 'index.php?student/message/send_new/', array('class' => 'form', 'enctype' => 'multipart/form-data')); ?>


    <div class="form-group">
        <label for="subject"><?php echo ('Destinataire'); ?>:</label>
        <br><br>
        <select class="form-control select2" name="reciever" required>

            <option value=""><?php echo ('Selectionner un utilisateur'); ?></option>
            <optgroup label="<?php echo ('Admin'); ?>">
                <?php
                $admins = $this->db->get('admin')->result_array();
                foreach ($admins as $row):
                    ?>

                    <option value="admin-<?php echo $row['admin_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
            </optgroup>
            <optgroup label="<?php echo ('Enseignant'); ?>">
                <?php
                $teachers = $this->db->get('teacher')->result_array();
                foreach ($teachers as $row):
                    ?>

                    <option value="teacher-<?php echo $row['teacher_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
            </optgroup>
        </select>
    </div>


    <div class="compose-message-editor">
        <textarea row="5" class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css" 
            name="message" placeholder="<?php echo ('Écrivez votre message'); ?>" 
            id="sample_wysiwyg"></textarea>
    </div>

    <hr>

    <button type="submit" class="btn btn-success btn-icon pull-right">
        <?php echo ('Evnoyer'); ?>
        <i class="entypo-mail"></i>

    </button>
</form>

</div>