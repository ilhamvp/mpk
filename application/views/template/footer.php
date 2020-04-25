</div>

<!-- Javascript default -->
<script src="<?= base_url();?>assets/bundles/libscripts.bundle.js"></script>    
<script src="<?= base_url();?>assets/bundles/vendorscripts.bundle.js"></script>

<script src="<?= base_url();?>assets/bundles/mainscripts.bundle.js"></script>
<script src="<?= base_url();?>assets/bundles/morrisscripts.bundle.js"></script>

<!-- validation -->
<script src="<?= base_url();?>assets/vendor/parsleyjs/js/parsley.min.js"></script>


<!-- kanban awal -->
<script src="<?= base_url();?>assets/js/pages/ui/sortable-nestable.js"></script>
<script src="<?= base_url();?>assets/js/pages/ui/dialogs.js"></script>

<script src="<?= base_url();?>assets/vendor/nestable/jquery.nestable.js"></script> <!-- Jquery Nestable -->
<script src="<?= base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js --> 
<script src="<?= base_url();?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script><!-- bootstrap datepicker Plugin Js --> 
<!-- kanban akhir -->
<!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->

<script>
    $('.sparkbar').sparkline('html', { type: 'bar' });
</script>


<!-- Advanced Form Elements  -->
<script src="<?= base_url();?>assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> <!-- Bootstrap Colorpicker Js --> 
<script src="<?= base_url();?>assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js"></script> <!-- Input Mask Plugin Js --> 
<script src="<?= base_url();?>assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="<?= base_url();?>assets/vendor/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js -->
<script src="<?= base_url();?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?= base_url();?>assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> <!-- Bootstrap Tags Input Plugin Js --> 
<script src="<?= base_url();?>assets/vendor/nouislider/nouislider.js"></script> <!-- noUISlider Plugin Js --> 


<script src="<?= base_url();?>assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>

<script src="<?= base_url();?>assets/vendor/jquery-knob/jquery.knob.min.js"></script> <!-- Jquery Knob Plugin Js --> 
<script src="<?= base_url();?>assets/js/pages/charts/jquery-knob.js"></script>


<!-- datatable -->
<script src="<?= base_url();?>assets/bundles/datatablescripts.bundle.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="<?= base_url();?>assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="<?= base_url();?>assets/js/pages/tables/jquery-datatable.js"></script>

<!-- dasboard -->
<script src="<?= base_url();?>assets/js/index.js"></script>
<script src="<?= base_url();?>assets/bundles/chartist.bundle.js"></script>
<script src="<?= base_url();?>assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
<script src="<?= base_url();?>assets/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js --> 
<script src="<?= base_url();?>assets/vendor/flot-charts/jquery.flot.selection.js"></script>



<!-- calender -->
<script src="<?= base_url();?>assets/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts --> 
<!-- <script src="<?= base_url();?>assets/js/pages/calendar.js"></script> -->

<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>

<script>
    // progress bars
    $('.progress .progress-bar').progressbar({
            display_text: 'none'
    });
</script>

<script>
$(function() {
    $('#progress-format1 .progress-bar').progressbar({
        display_text: 'fill'
    });

    $('#progress-format2 .progress-bar').progressbar({
        display_text: 'fill',
        use_percentage: false
    });

    $('#progress-custom-format .progress-bar').progressbar({
        display_text: 'fill',
        use_percentage: false,
        amount_format: function(p, t) {
            return p + ' of ' + t;
        }
    });

    $('#progress-striped .progress-bar, #progress-striped-active .progress-bar, #progress-stacked .progress-bar').progressbar({
        display_text: 'fill'
    });

    $('.progress.vertical .progress-bar').progressbar();
    $('.progress.vertical.wide .progress-bar').progressbar({
        display_text: 'fill'
    });

});
</script>

<script>
    $(document).ready(function () {
        $('.star').on('click', function () {
            $(this).toggleClass('star-checked');
        });

        $('.ckbox label').on('click', function () {
            $(this).parents('tr').toggleClass('selected');
        });

        $('.btn-filter').on('click', function () {
            var $target = $(this).data('target');
            if ($target != 'all') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
            }
        });
    });
</script>


<!-- calender -->

<script>
    "use strict";
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        defaultDate: '2019-08-12',
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function () {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },
        eventLimit: true, // allow "more" link when too many events
        events: [
            
            <?php foreach ($kegiatan as $listkegiatan) :?>
            {
                title: '<?=$listkegiatan['nama_kegiatan']?>',
                start: '<?=$listkegiatan['tgl_mulai_kegiatan']?>',
                end: '<?=$listkegiatan['tgl_rencanaselesai']?>',
                className: '<?php 
                if($listkegiatan['id_status_kegiatan']=="1"){
                    echo "bg-danger";
                    } elseif($listkegiatan['id_status_kegiatan']=="2"){
                        echo "bg-primary";
                        }else{echo "bg-success";} ?>',

            },
            <?php endforeach;?>
        ]
    });
</script>

</body>
</html>