<?php

namespace App\Http\Controllers;

use App\Regresi;
use App\RegresiDetail;
use App\Alpha;
use Illuminate\Http\Request;
use Exception;

class PerhitunganController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Regresi $regresi)
    {
        if($regresi->id_user == auth()->user()->id){

            $detail = RegresiDetail::where('id_regresi', '=', $regresi->id)->get();
            $detailOrder = RegresiDetail::where('id_regresi', '=', $regresi->id)->orderBy('datax', 'ASC')->get();
            if($regresi->countDetail() != 0){
                return view('contents.perhitungan.index', compact('regresi', 'detail', 'detailOrder'),[
                    'content'=>'contents.perhitungan.showdeskriptif',
                    'title'=>'Perhitungan Secara Deskriptif',
                    'script'=>'contents.perhitungan.script',
                    'url'=>'perhitungan/show',
                    'id'=>$regresi->id,
                    'export'=> 'perhitungan.export_deskriptif'
                ]);
    
            }else{
                abort(404, 'Page not found');
            }
        }else{
            abort(404, 'Page not found');
        }

    }

    public function showTable(Regresi $regresi){
        
        if($regresi->id_user == auth()->user()->id){

            $detail = RegresiDetail::where('id_regresi', '=', $regresi->id)->get();
            $detailOrder = RegresiDetail::where('id_regresi', '=', $regresi->id)->orderBy('datax', 'ASC')->get();
            
            if($regresi->countDetail() != 0){
                return view('contents.perhitungan.index', compact('regresi', 'detail', 'detailOrder'),[
                    'content'=>'contents.perhitungan.showtable',
                    'title'=>'Perhitungan Secara Tabel',
                    'script'=>'contents.perhitungan.script',
                    'url'=>'perhitungan/show',
                    'id'=>$regresi->id,
                    'export'=> 'perhitungan.export_table'
                ]);
    
            }else{
                abort(404, 'Page not found');
            }
        }else{
            abort(404, 'Page not found');
        }
    }

    public function export_deskriptif(Regresi $regresi){

        if($regresi->id_user == auth()->user()->id){

            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('phpword/template/deskriptif.docx'));

            $detail = RegresiDetail::where('id_regresi', '=', $regresi->id)->get();
            $detailOrder = RegresiDetail::where('id_regresi', '=', $regresi->id)->orderBy('datax', 'ASC')->get();
            
            if($regresi->countDetail() != 0){
                $template->setValue('nama_kasus', $regresi->nama_kasus);
                $template->setValue('h1', $regresi->h1);
                $template->setValue('h0', $regresi->h0);

                //Tabel Penolong
                $values = array();
                $i = 0;
                foreach($detail as $d){
                    $values[$i]['no']= $i+1;
                    $values[$i]['datax'] = $d->datax;
                    $values[$i]['datay']= $d->datay;
                    $values[$i]['datax2'] = $d->powX2();
                    $values[$i]['datay2'] = $d->powY2();
                    $values[$i]['dataxy'] = $d->XY();
                    $i++;
                }

                $template->setValue('sumno', $regresi->countDetail());
                $template->setValue('sumx', $regresi->countX());
                $template->setValue('sumy', $regresi->countY());
                $template->setValue('sumx2', $regresi->countPowX2());
                $template->setValue('sumy2', $regresi->countPowY2());
                $template->setValue('sumxy', $regresi->countXY());

                $template->setValue('a', $regresi->prediksiB());
                $template->setValue('b', $regresi->konstantaA());
                
                $template->cloneRowAndSetValues('no', $values);

                //~~~~~~~~~~~Linieritas
                $template->setValue('linierjke', $regresi->linierJKe());
                $template->setValue('linierjktc', $regresi->linierJKtc());
                $template->setValue('linierrjktc', $regresi->linierRJKtc());
                $template->setValue('linierrjke', $regresi->linierRJKe());
                $template->setValue('linierf', $regresi->linierF());
                $template->setValue('tabelf', $regresi->tabelF());
                if($regresi->linierSimpulan()){
                    $template->setValue('liniersimpulan', "Kesimpulan: karena Fhitung ≤ Ftabel atau ". $regresi->linierF() ." ≤ ". $regresi->tabelF() .", maka terima H0. Dengan demikian metode regresi Y atas X adalah LINIER");
                }else{
                    $template->setValue('liniersimpulan', "Kesimpulan: karena Fhitung > Ftabel atau ". $regresi->linierF() ." > ". $regresi->tabelF() .", maka terima H1. Dengan demikian metode regresi Y atas X adalah TIDAK LINIER");

                }

                //~~~~~~~signifikansi
                
                $template->setValue('sigrjka', $regresi->sigRJKa());
                $template->setValue('sigrjkb', $regresi->sigRJKb());
                $template->setValue('sigjkres', $regresi->sigJKres());
                $template->setValue('sigrjkres', $regresi->sigRJKres());
                $template->setValue('sigf', $regresi->sigF());
                $template->setValue('sigftabel', $regresi->sigFTabel());
                if($regresi->sigSimpulan()){
                    $template->setValue('sigsimpulan', "Kesimpulan: karena Fhitung ≥ Ftabel atau ". $regresi->sigF() ." ≥ ". $regresi->sigFTabel() .", maka terima H1 dengan demikian terdapat pengaruh yang signifikan antara ". $regresi->labelx ." terhadap ". $regresi->labely .".");

                }else{
                    $template->setValue('sigsimpulan', "Kesimpulan: karena Fhitung < Ftabel atau ". $regresi->sigF() ." < ". $regresi->sigFTabel() .", maka terima H0 dengan demikian tidak terdapat pengaruh yang signifikan antara ". $regresi->labelx ." terhadap ". $regresi->labely .".");

                }

                try {
                    $template->saveAs(public_path('assets/export/export.docx'));
                } catch (Exception $e) {
                    dd($e);
                }
        
                return response()->download(public_path('assets/export/export.docx'));


            }else{
                abort(404, 'Page not found');
            }
        }else{
            abort(404, 'Page not found');
        }

        // $pdf = PDF::loadView('contents.perhitungan.exportPDF.index');

        // return $pdf->download('testing.pdf');
    }

    public function export_table(Regresi $regresi){

        if($regresi->id_user == auth()->user()->id){

            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('phpword/template/tabel.docx'));

            $detail = RegresiDetail::where('id_regresi', '=', $regresi->id)->get();
            $detailOrder = RegresiDetail::where('id_regresi', '=', $regresi->id)->orderBy('datax', 'ASC')->get();
            
            if($regresi->countDetail() != 0){
                $template->setValue('nama_kasus', $regresi->nama_kasus);
                $template->setValue('h1', $regresi->h1);
                $template->setValue('h0', $regresi->h0);

                //Tabel Penolong
                $values = array();
                $i = 0;
                foreach($detail as $d){
                    $values[$i]['no']= $i+1;
                    $values[$i]['datax'] = $d->datax;
                    $values[$i]['datay']= $d->datay;
                    $values[$i]['datax2'] = $d->powX2();
                    $values[$i]['datay2'] = $d->powY2();
                    $values[$i]['dataxy'] = $d->XY();
                    $i++;
                }

                $template->setValue('sumno', $regresi->countDetail());
                $template->setValue('sumx', $regresi->countX());
                $template->setValue('sumy', $regresi->countY());
                $template->setValue('sumx2', $regresi->countPowX2());
                $template->setValue('sumy2', $regresi->countPowY2());
                $template->setValue('sumxy', $regresi->countXY());

                $template->setValue('a', $regresi->prediksiB());
                $template->setValue('b', $regresi->konstantaA());
                
                $template->cloneRowAndSetValues('no', $values);

                //~~~~~~~~~~~Linieritas
                $template->setValue('tuna_cocokdb', $regresi->linierK()-2);
                $template->setValue('kesalahandb', $regresi->countDetail()-$regresi->linierK());
                $template->setValue('totaldb', ($regresi->linierK()-2)+($regresi->countDetail()-$regresi->linierK()));

                $template->setValue('tuna_cocokjk', $regresi->linierJKtc());
                $template->setValue('kesalahanjk', $regresi->linierJKe());
                $template->setValue('totaljk', $regresi->linierJKtc()+$regresi->linierJKe());
                
                $template->setValue('tuna_cocokrjk', $regresi->linierRJKtc());
                $template->setValue('kesalahanrjk', $regresi->linierRJKe());
                $template->setValue('totalrjk', $regresi->linierRJKe() +$regresi->linierRJKtc());
                
                $template->setValue('linierf', $regresi->linierF());
                $template->setValue('tabelf', $regresi->tabelF());

                if($regresi->linierSimpulan()){
                    $template->setValue('liniersimpulan', "Kesimpulan: karena Fhitung ≤ Ftabel atau ". $regresi->linierF() ." ≤ ". $regresi->tabelF() .", maka terima H0. Dengan demikian metode regresi Y atas X adalah LINIER");
                }else{
                    $template->setValue('liniersimpulan', "Kesimpulan: karena Fhitung > Ftabel atau ". $regresi->linierF() ." > ". $regresi->tabelF() .", maka terima H1. Dengan demikian metode regresi Y atas X adalah TIDAK LINIER");

                }

                //~~~~~~~signifikansi
                
                
                $template->setValue('totaldb', $regresi->countDetail());
                $template->setValue('residudb', $regresi->countDetail()-2);
                
                $template->setValue('totaljk', $regresi->sigRJKa()+$regresi->sigRJKb()+$regresi->sigJKres());
                $template->setValue('regresiajk', $regresi->sigRJKa());
                $template->setValue('regresiabjk', $regresi->sigRJKb());
                $template->setValue('residujk', $regresi->sigJKres());
                
                $template->setValue('totalrjk', $regresi->sigRJKa()+$regresi->sigRJKb()+$regresi->sigJKres());
                $template->setValue('regresiarjk', $regresi->sigRJKa());
                $template->setValue('regresiabrjk', $regresi->sigRJKb());
                $template->setValue('residurjk', $regresi->sigJKres());

                $template->setValue('sigf', $regresi->sigF());
                $template->setValue('sigftabel', $regresi->sigFTabel());
                
                if($regresi->sigSimpulan()){
                    $template->setValue('sigsimpulan', "Kesimpulan: karena Fhitung ≥ Ftabel atau ". $regresi->sigF() ." ≥ ". $regresi->sigFTabel() .", maka terima H1 dengan demikian terdapat pengaruh yang signifikan antara ". $regresi->labelx ." terhadap ". $regresi->labely .".");

                }else{
                    $template->setValue('sigsimpulan', "Kesimpulan: karena Fhitung < Ftabel atau ". $regresi->sigF() ." < ". $regresi->sigFTabel() .", maka terima H0 dengan demikian tidak terdapat pengaruh yang signifikan antara ". $regresi->labelx ." terhadap ". $regresi->labely .".");

                }

                try {
                    $template->saveAs(public_path('assets/export/export.docx'));
                } catch (Exception $e) {
                    dd($e);
                }
        
                return response()->download(public_path('assets/export/export.docx'));


            }else{
                abort(404, 'Page not found');
            }
        }else{
            abort(404, 'Page not found');
        }

        // $pdf = PDF::loadView('contents.perhitungan.exportPDF.index');

        // return $pdf->download('testing.pdf');
    }
    

}
