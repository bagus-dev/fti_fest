            <br><br>
            <footer class="main-footer" style="width:100%;margin-left:0;">
                <div class="pull-right">
                    <b>Version</b> 1.0
                </div>
                <strong>Admin Area</strong>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url().'assets/js/admin/chart.js/Chart.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/fastclick/lib/fastclick.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/adminlte.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/jquery-slimscroll/jquery.slimscroll.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/dataTables.bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/dataTables.fixedHeader.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.responsive.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/responsive.bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/summernote/summernote-bs4.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/sweetalert2.all.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/moment.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/bootstrap-datetimepicker.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/admin/id.js'; ?>"></script>
    <script>
        $(function (){
            $("#datepicker").datetimepicker({
                format: "DD/MM/YYYY",
                locale: "id",
                showClear: true,
                showTodayButton: true
            });
        });

        $(function (){
            $("#datepicker2").datetimepicker({
                format: "DD/MM/YYYY",
                locale: "id",
                showClear: true,
                showTodayButton: true
            });
        });
    </script>
    <script>
        $(document).ready(function (){
            var table = $("#table-datatable").DataTable({
                responsive: true
            });

            new $.fn.dataTable.FixedHeader(table);
        });

        $(document).ready(function (){
            var table = $("#table-datatable2").DataTable({
                responsive: true
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
    <script>
        $(function () {
            $('.summernote').summernote();
        });
    </script>
    <script src="<?php echo base_url().'assets/js/lightgallery.min.js'; ?>"></script>
    <script>
        $(document).ready(function (){
            $("#lightgallery").lightGallery();
        });
    </script>
</body>
</html>