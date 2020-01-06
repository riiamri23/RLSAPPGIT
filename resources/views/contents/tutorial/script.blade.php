<!-- MathJax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-AMS_HTML-full"></script>


<script>
        
$(document).ready(function(){
    
    MathJax.Hub.Config({
        jax: ["input/TeX","output/HTML-CSS"],
        displayAlign: "left",
        "HTML-CSS": { linebreaks: { automatic: true } },
         SVG: { linebreaks: { automatic: true } }
    });

    
    $('#contohJKe').popover({
        html: true,
        content: function(){
            let url = '<img class="img-fluid" src="{{URL::asset('assets/images/contohJKe.PNG')}}" />';
            return url;
        }
    });
    
    $('#TabelF').popover({
        html: true,
        content: function(){
            let ket = '<p>Contoh mencari nilai tabel F dengan nilai alpha 0,5 df1 = 1; df2 = 9</p>';
            let url = '<img class="img-fluid" src="{{URL::asset('assets/images/tabelf.PNG')}}" />';
            return ket + url;
        }
    });

    const tabelF = @json($tabelF);

    $('#cariNilai').click(function(){
        let alpha = $("#alpha").val();
        let df1 = $("#df1").val();
        let df2 = $("#df2").val();
        let nilai = 0;
        Object.keys(tabelF).forEach(function(k){
            if(tabelF[k].id_alpha == alpha && tabelF[k].pembilang == df1 && tabelF[k].penyebut == df2){
                nilai = tabelF[k].nilai;
            }
        });
        if(nilai != 0){
            $("#text-hasil").html("Hasil Pencarian Nilai Tabel F: " + nilai);
        }else{
            $("#text-hasil").html("Hasil Pencarian Nilai Tabel F: Data tidak ditemukan");
        }

    });
    
});

</script>