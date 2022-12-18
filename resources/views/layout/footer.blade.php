    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.esm.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.esm.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script>
        @if ($message = Session::get('sukses'))
        // Notifikasi
        swal ( "Berhasil" ,  "<?php echo $message ?>" ,  "success" )
        @endif

        @if ($message = Session::get('warning'))
        // Notifikasi
        swal ( "Oops.." ,  "<?php echo $message ?>" ,  "warning" )
        @endif
    </script>
    
</body>
</html>