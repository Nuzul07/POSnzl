    <script src="{{ asset('Adminmart-lite-master/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('Adminmart-lite-master/src/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('Adminmart-lite-master/src/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('Adminmart-lite-master/src/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('Adminmart-lite-master/src/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('Adminmart-lite-master/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('Adminmart-lite-master/src/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('Adminmart-lite-master/src/dist/js/custom.min.js') }}"></script>

    <!-- JS Libraies -->
    @yield("scriptLibraies")

    <!-- Page Specific JS File -->
    @yield("scriptSpesific")

    <!--This page JavaScript -->
    <script src="{{ asset('Adminmart-lite-master/src/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('Adminmart-lite-master/src/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('Adminmart-lite-master/src/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('Adminmart-lite-master/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Adminmart-lite-master/src/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <script src="{{ asset('js/uploadpreview.js') }}"></script>
    <script src="{{ asset('js/modalDestroy.js') }}"></script>
    @yield("scriptCustom")