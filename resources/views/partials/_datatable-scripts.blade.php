{{-- <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>   --}}


<script>
    $(function () {
      $(".mDataTable").DataTable({
        // "responsive": true,
        // "autoWidth": false,
        "ordering" : false,
      });
    });
  </script>