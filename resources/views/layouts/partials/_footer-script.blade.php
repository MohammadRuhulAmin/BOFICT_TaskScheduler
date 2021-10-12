
<script src="{{asset('js/app.js')}}"></script>

<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>

{{-- admin Opertation --}}

{{-- sweet alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $('.datatable').DataTable({
        "responsive":true,
        "autoWidth":false,
    });
    
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  
    $("#selectEmployee").select2({
          placeholder: "Select Employee",
          allowClear: true
      });
</script>
<script>
    $("#selectTask").select2({
          placeholder: "Select Task",
          allowClear: true
      });
</script>



