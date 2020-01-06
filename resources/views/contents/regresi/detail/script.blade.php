<script>
    
jQuery(document).ready(function($) {

    $('#file').popover({
        html: true,
        content: function(){
            let url = '<img class="img-fluid" src="{{URL::asset('assets/images/uploadexcel.PNG')}}" />';
            let ket = '<p>keterangan : kolom A sebagai data variabel X dan B sebagai data variabel Y </p>';
            return url + ket;
        }
    });
    
    $('.tabedit').click(function(){
        
        if($('#edit').hasClass('show')){

            $('#edit-datax').val($(this).data('datax'));
            $('#edit-datay').val($(this).data('datay'));

            let url = "{{URL::to('detail/:id')}}";
            url = url.replace(':id', $(this).data('id'));
            $("#edit-form").attr('action', url);

        }else{

            //trigger button tab edit
            $('#edit-tab').click();

            $('#edit-datax').val($(this).data('datax'));
            $('#edit-datay').val($(this).data('datay'));
            
            let url = "{{URL::to('detail/:id')}}";
            url = url.replace(':id', $(this).data('id'));
            $("#edit-form").attr('action', url);
            
            // $("#edit-form").attr('action', '/detail/' + $(this).data('id'));
        }

    });
});
</script>