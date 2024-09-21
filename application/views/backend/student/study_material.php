<table class="table table-bordered table-hover table-striped table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo ('Date');?></th>
            <th><?php echo ('Titre');?></th>
            <th><?php echo ('Description');?></th>
            <th><?php echo ('Classe');?></th>
            <th><?php echo ('Télécharger');?></th>
        </tr>
    </thead>

    <tbody>
        <?php 
        $count = 1;
        foreach ($study_material_info as $row) { ?>   
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo date("d M, Y", $row['timestamp']); ?></td>
                <td><?php echo $row['title']?></td>
                <td><?php echo $row['description']?></td>
                <td>
                    <?php $name = $this->db->get_where('class' , array('class_id' => $row['class_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td>
                    <a href="<?php echo base_url().'uploads/document/'.$row['file_name']; ?>" class="btn btn-blue btn-icon icon-left">
                        <i class="entypo-download"></i>
                        Télécharger
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    jQuery(window).load(function () {
        var $ = jQuery;

        $("#table-2").dataTable({
            "sPaginationType": "bootstrap",
            // Suppression de l'élément 'T' qui représente les options d'exportation
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

        // Highlighted rows
        $("#table-2 tbody input[type=checkbox]").each(function (i, el) {
            var $this = $(el),
                $p = $this.closest('tr');

            $(el).on('change', function () {
                var is_checked = $this.is(':checked');

                $p[is_checked ? 'addClass' : 'removeClass']('highlight');
            });
        });

        // Replace Checboxes
        $(".pagination a").click(function (ev) {
            replaceCheckboxes();
        });
    });
</script>
