<script>
    
        jQuery(document).ready(function($) {
            
            $('.tabedit').click(function(){
                if($('#edit').hasClass('show')){
                    
                    $('#edit-alpha').val($(this).data('alpha')).change();
                    $('#edit-pembilang').val($(this).data('pembilang'));
                    $('#edit-penyebut').val($(this).data('penyebut'));
                    $('#edit-nilai').val($(this).data('nilai'));
                    
                    let url = "{{URL::to('tabelf/:id')}}";
                    url = url.replace(':id', $(this).data('id'));
                    $("#edit-form").attr('action', url);

                }else{
                    
                    //trigger button tab edit
                    $('#edit-tab').click();
                    $('#edit-alpha').val($(this).data('alpha')).change();
                    $('#edit-pembilang').val($(this).data('pembilang'));
                    $('#edit-penyebut').val($(this).data('penyebut'));
                    $('#edit-nilai').val($(this).data('nilai'));
                    
                    let url = "{{URL::to('tabelf/:id')}}";
                    url = url.replace(':id', $(this).data('id'));
                    $("#edit-form").attr('action', url);
        
                }
        
            });
        });
        </script>