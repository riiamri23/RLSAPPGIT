<script>
    
jQuery(document).ready(function($) {
    
    $('.tabedit').click(function(){
        if($('#edit').hasClass('show')){
            $('#edit-nilai').val($(this).data('nilai'));
            
            let url = "{{URL::to('alpha/:id')}}";
            url = url.replace(':id', $(this).data('id'));
            $("#edit-form").attr('action', url);
        }else{
            
            //trigger button tab edit
            $('#edit-tab').click();
            $('#edit-nilai').val($(this).data('nilai'));

            let url = "{{URL::to('alpha/:id')}}";
            url = url.replace(':id', $(this).data('id'));
            $("#edit-form").attr('action', url);
        }

    });
});
</script>