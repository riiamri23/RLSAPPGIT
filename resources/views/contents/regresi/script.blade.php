<script>
    
jQuery(document).ready(function($) {
    $('.clickable-row').click(function(){
        window.location = $(this).data("href");
    });

    //form hipotesis nol dan hipotesis alternatif
    let texth0, texth1;
    let labelx = $('#labelx');
    let labely = $('#labely');
    let h0 = $('#h0');
    let h1 = $('#h1');

    //checked
    let edith0 = $('#edit-h0');
    let edith1 = $('#edit-h1');

    edith0.on('change', function(){
        if(edith0.prop('checked')){
            h0.removeAttr("readonly");
        }else{
            h0.attr("readonly", "readonly");
        }

    });

    edith1.on('change', function(){

        if(edith1.prop('checked')){
            h1.removeAttr("readonly");
        }else{
            h1.attr("readonly", "readonly");
        }

    });
    labelx.on('change', function(){
        texth0 = 'Tidak terdapat pengaruh antara ' + labelx.val() + ' terhadap ' + labely.val();

        texth1 = 'Terdapat pengaruh antara ' + labelx.val() + ' terhadap ' + labely.val();

        //hipotesis nol
        if(edith0.prop('checked')){

        }else{
            h0.val(texth0);
        }

        //hipotesis alternatif
        if(edith1.prop('checked')){
            
        }else{
            h1.val(texth1);
        }

    });
    labely.on('change', function(){
        texth0 = 'Tidak terdapat pengaruh antara ' + labelx.val() + ' terhadap ' + labely.val();

        texth1 = 'Terdapat pengaruh antara ' + labelx.val() + ' terhadap ' + labely.val();

        //hipotesis nol
        if(edith0.prop('checked')){

        }else{
            h0.val(texth0);
        }

        //hipotesis alternatif
        if(edith1.prop('checked')){
            
        }else{
            h1.val(texth1);
        }
    });
});
</script>