<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Regresi extends Model
{
    protected $guarded = [];
    
    public function alpha(){
        return $this->belongsTo('App\Alpha', 'id_alpha');
    }

    public function countDetail(){
        return RegresiDetail::first()->where('id_regresi', $this->id)->count();
    }

    public function countX(){
        return round(RegresiDetail::where('id_regresi', $this->id)->sum('datax') / 1, 2);
    }
    
    public function countY(){

        return round(RegresiDetail::where('id_regresi', $this->id)->sum('datay') / 1, 2);
    }

    public function countPowX2(){
        return round(RegresiDetail::selectRaw('sum(pow(datax,2)) as col')->where('id_regresi', $this->id)->get()[0]['col'] / 1, 2);
    }

    public function countPowY2(){
        return round(RegresiDetail::selectRaw('sum(pow(datay,2)) as col')->where('id_regresi', $this->id)->get()[0]['col'] / 1, 2);
    }
    
    public function countXY(){
        return round(RegresiDetail::selectRaw('sum(datax * datay) as col')->where('id_regresi', $this->id)->get()[0]['col'] / 1, 2);
    }

    public function prediksiB(){
        $b = (($this->countDetail() * $this->countXY()) - ($this->countX()* $this->countY())) / (($this->countDetail() * $this->countPowX2()) - pow($this->countX(), 2));

        return round($b, 2);
    }

    public function konstantaA(){
        $a = ($this->countY() - ($this->prediksiB() * $this->countX())) / ($this->countDetail());

        return round($a, 2);
    }

    public function sigRJKa(){
        return round(pow($this->countY(), 2) / $this->countDetail(), 2);
    }

    public function sigRJKb(){
        return round($this->prediksiB() * ($this->countXY() - ($this->countX() * $this->countY() / $this->countDetail())), 2);
    }

    public function sigJKres(){
        return round($this->countPowY2() - $this->sigRJKb() - $this->sigRJKa(), 2);
    }

    public function sigRJKres(){
        return round($this->sigJKres() / ($this->countDetail() - 2), 2);
    }

    public function sigF(){
        return round($this->sigRJKb() / $this->sigRJKres(), 2);
    }

    public function sigFTabel(){
        $pembilang = 1;
        $penyebut = $this->countDetail() - 2;
        $alpha = $this->id_alpha;
        $nilaiAlpha = $this->alpha->nilai;

        if($penyebut == 0 OR $pembilang == 0){
            $fetchNilai = 0;
        }else{
            if(!empty(TabelF::select('nilai as col')
            ->where('id_alpha', $alpha)
            ->where('pembilang', $pembilang)
            ->where('penyebut', $penyebut)
            ->get()[0]['col'])){
            //nilai F ditabel
            $fetchNilai = TabelF::select('nilai as col')
                            ->where('id_alpha', $alpha)
                            ->where('pembilang', $pembilang)
                            ->where('penyebut', $penyebut)
                            ->get()[0]['col'];
            
            }else{
                $fetchNilai = 'Data tidak ditemukan di Tabel F';
            }
        }
            return $fetchNilai;
    }

    public function sigSimpulan(){
        if($this->sigF() >= $this->sigFTabel()){
            return true;
        }else{
            return false;
        }
    }

    public function linierK(){
        $detail = RegresiDetail::where('id_regresi', $this->id)->groupBy('datax');
        $k =DB::table(DB::raw("({$detail->toSql()}) as detail"))
            ->mergeBindings($detail->getQuery())
            ->count();
        return round($k, 2);
    }

    public function linierJKe(){
        $sum = 0;
        $data = RegresiDetail::selectRaw('(SUM(POW(datay,2)))- (POW(SUM(datay),2)/count(datay)) as col')->where('id_regresi', $this->id)->groupBy('datax')->get();
        foreach($data as $item){
            $sum += $item->col;
        }

        return round($sum, 2);
    }

    public function linierJKtc(){
        return $this->sigJKres() - $this->linierJKe();
    }

    public function linierRJKtc(){
        if($this->linierK() - 2 != 0){
            $RJKtc = $this->linierJKtc() / ($this->linierK() - 2);
        }else{
            $RJKtc = 0;
        }
        return round($RJKtc, 2);
    }

    public function linierRJKe(){
        if($this->countDetail() - $this->linierK() != 0){
            
            $RJKe = $this->linierJKe() / ($this->countDetail() - $this->linierK());
        }else{
            $RJKe = 0;
        }
        return round($RJKe, 2);
    }

    public function linierF(){
        if($this->linierRJKe() != 0){
            $linierF =$this->linierRJKtc() / $this->linierRJKe();
        }else{
            $linierF = 0;
        }
        return round($linierF, 2);
    }

    public function tabelF(){
        $pembilang = $this->linierK() - 2;
        $penyebut = $this->countDetail() - $this->linierK();
        $alpha = $this->id_alpha;
        $nilaiAlpha = $this->alpha->nilai;
        if($penyebut == 0 OR $pembilang == 0){
            $fetchNilai = 0;
        }else{
            if(!empty(TabelF::select('nilai as col')
            ->where('id_alpha', $alpha)
            ->where('pembilang', $pembilang)
            ->where('penyebut', $penyebut)
            ->get()[0]['col'])){
                $fetchNilai = TabelF::select('nilai as col')
                ->where('id_alpha', $alpha)
                ->where('pembilang', $pembilang)
                ->where('penyebut', $penyebut)
                ->get()[0]['col'];
            }else{
                $fetchNilai = 'Data tidak ditemukan di Tabel F';
            }
        }
        return $fetchNilai;
       
    }

    public function linierSimpulan(){
        if($this->linierF() <= $this->tabelF()){
            return true;
        }else{
            return false;
        }
        
    }
}
