<?php if($this->uri->segment(1) == "dashboard" && $this->uri->segment(2) == ""): ?>
<script>
    $('#csiswa').dataTable({
    bPaginate:      false,
        ajax:           '<?= site_url('dashboard/list/') ?>',
        scrollY:        250,
        deferRender:    true,
        scroller:       true,
        searching:      true,
        info:           false,
    });
    $(".dataTables_filter").addClass("d-none");

    var table = $('#csiswa').DataTable();
    
    $('#search').on( 'keyup', function () {
        table.search( this.value ).draw();
    } );
</script>

<?php elseif($this->uri->segment(1) == "csiswa" && $this->uri->segment(2) == NULL): ?>
<script>
    $('#csiswa').dataTable({
        dom: 'Bflrtip',
        buttons: [ 
            {
            extend: "copy",
            text: "<i class='fas fa-copy'></i> Copy",
            className: "btn-sm btn-default",
            exportOptions: {
                columns: [ 0, 1, 2, 3 ]
            }
            },
            {
            extend: "csv",
            text: "<i class='fas fa-file-excel'></i> Csv",
            className: "btn-sm btn-default",
            exportOptions: {
                columns: [ 0, 1, 2, 3 ]
            }
            },
            {
            extend: "print",
            text: "<i class='fas fa-print'></i> Print",
            className: "btn-sm btn-default",
            exportOptions: {
                columns: [ 0, 1, 2, 3 ]
            }
            },
        ],
        bPaginate:      false,
        ajax:           '<?= site_url('csiswa/list/') ?>',
        scrollY:        250,
        deferRender:    true,
        scroller:       true,
        searching:      true,
        info:           false,
    });
    $(".dataTables_filter").addClass("d-none");
    $('.buttons-html5').removeClass('btn-secondary');
    $('.dt-buttons').addClass("mt-3 ml-3 mb-2 text-right");

    var table = $('#csiswa').DataTable();
    
    $('#search').on( 'keyup', function () {
        table.search( this.value ).draw();
    } );
</script> 
<?php endif; ?>