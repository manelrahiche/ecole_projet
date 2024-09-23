<style>
    #chartdiv {
        width       : 100%;
        height      : 250px;
        font-size   : 11px;
    }
    .print-button {
        margin: 20px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }
    /* Styles d'impression */
    @media print {
        .print-button {
            display: none; /* Cacher le bouton d'impression lors de l'impression */
        }
        .panel-heading {
            background-color: #fff !important; /* Assurez-vous que les titres ne soient pas coupés ou mal rendus */
        }
    }
</style>

<?php
$student_info = $this->crud_model->get_student_info($param2); 
foreach ($student_info as $row1):
?>
    <center>
        <div style="font-size: 20px;font-weight: 200;margin: 10px;"><?php echo $row1['name']; ?></div>

        <div class="panel-group joined" id="accordion-test-2">
            <?php
            $toggle = true;
            $exams = $this->crud_model->get_exams();
            foreach ($exams as $row0):
                $total_grade_point = 0;
                $total_marks = 0;
                $total_subjects = 0;
                $total_moy = 0;
                $total_coef = 0;
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapse<?php echo $row0['exam_id']; ?>">
                                <i class="entypo-rss"></i>  <?php echo $row0['name']; ?>
                            </a>
                        </h4>
                    </div>

                    <div id="collapse<?php echo $row0['exam_id']; ?>" class="panel-collapse collapse <?php if ($toggle) { echo 'in'; $toggle = false; } ?>" >
                        <div class="panel-body">
                            <center>
                                <div id="printableArea">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Matière scolaire</th>
                                                <th>Devoir</th>
                                                <th>Examen</th>
                                                <th>Total</th>
                                                <th>Moyenne</th>
                                                <th>Remarque</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $subjects = $this->crud_model->get_subjects_by_class($row1['class_id']);
                                            foreach ($subjects as $row2):
                                                $total_subjects++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $row2['name']; $subject_name[] = $row2['name']; ?></td>
                                                    <td>
                                                        <?php
                                                        $verify_data = array('exam_id' => $row0['exam_id'],
                                                                            'class_id' => $row1['class_id'],
                                                                            'subject_id' => $row2['subject_id'],
                                                                            'student_id' => $row1['student_id']);

                                                        $query = $this->db->get_where('mark', $verify_data);
                                                        $marks = $query->result_array();
                                                        foreach ($marks as $row3):
                                                            echo $row3['devoir'];
                                                        endforeach;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($marks as $row4):
                                                            echo $row4['exam'];
                                                        endforeach;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($marks as $row5):
                                                            echo $row3['devoir'] + $row4['exam'] * 2;
                                                        endforeach;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($marks as $row6):
                                                            echo round(($row3['devoir'] + $row4['exam'] * 2) / 3, 2);
                                                            $total_moy += ($row3['devoir'] + $row4['exam'] * 2) / 3;
                                                            $total_coef += 1;
                                                        endforeach;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($marks as $row7):
                                                            echo $row7['comment'];
                                                        endforeach;
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <hr />
                                    Moyenne générale: <?php echo round($total_moy / $total_coef, 2); ?>
                                    <hr />
                                    <div id="chartdiv"></div>
                                </div>
                                <!-- Bouton d'impression -->
                                <button class="print-button" onclick="printReleve()">Imprimer le relevé de notes</button>

                                <script>
                                    function printReleve() {
                                        var printContents = document.getElementById('printableArea').innerHTML;
                                        var originalContents = document.body.innerHTML;
                                        document.body.innerHTML = printContents;
                                        window.print();
                                        document.body.innerHTML = originalContents;
                                        location.reload(); // recharge la page après l'impression
                                    }
                                </script>
                            </center>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </center>
<?php endforeach; ?>
