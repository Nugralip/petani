</html>

<script src="{{ asset('adminn/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminn/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminn/plugins/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('adminn/plugins/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('adminn/plugins/DataTables/datatables.js') }}"></script>
<script src="{{ asset('adminn/plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('adminn/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminn/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
<script src="{{ asset('adminn/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('adminn/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
<script src="{{ asset('adminn/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('adminn/plugins/toaster/toastr.min.js') }}"></script>
<script src="{{ asset('adminn/js/mono.js') }}"></script>
<script src="{{ asset('adminn/js/chart.js') }}"></script>
<script src="{{ asset('adminn/js/map.js') }}"></script>
<script src="{{ asset('adminn/js/custom.js') }}"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    @if ($message = Session::get('sukses'))
    // Notifikasi
    Swal.fire( "Berhasil" ,  "<?php echo $message ?>" ,  "success" )
    @endif

    @if ($message = Session::get('warning'))
    // Notifikasi
    Swal.fire( "Oops.." ,  "<?php echo $message ?>" ,  "warning" )
    @endif
</script>






                    {{-- <script>
                      jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });
                    </script> --}}
                    
                    
                    
                    
                    
                    
                    
                    