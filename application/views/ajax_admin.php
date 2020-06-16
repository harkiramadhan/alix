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
        $(document).ready(function(){
            $.ajax({
                url: '<?= site_url('csiswa/list') ?>',
                type: 'get',
                success: function(html){
                    $('.table_csiswa').html(html);
                }
            })
        });
    </script> 

<?php elseif($this->uri->segment(1) == "csiswa" && $this->uri->segment(2) == "all"): ?>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: '<?= site_url('csiswa/list2/?j=conf') ?>',
                type: 'get',
                success: function(html){
                    $('.table_konfrim').html(html);
                }
            });
            $.ajax({
                url: '<?= site_url('csiswa/list2/?j=not') ?>',
                type: 'get',
                success: function(html){
                    $('.table_belum').html(html);
                }
            });
            $.ajax({
                url: '<?= site_url('csiswa/list2/?j=del') ?>',
                type: 'get',
                success: function(html){
                    $('.table_deleted').html(html);
                }
            });
        });
    </script> 
   
<?php endif; ?>