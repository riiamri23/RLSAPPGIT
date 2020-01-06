    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{URL::asset('assets/plugins/common/common.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/custom.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/settings.js')}}"></script>
    <script src="{{URL::asset('assets/js/gleek.js')}}"></script>
    <script src="{{URL::asset('assets/js/styleSwitcher.js')}}"></script>

    <script>
        $(document).ready(function(){
  
          $("#Cari").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tbody tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
          $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          });
  
          $('')
          
        });
      </script>