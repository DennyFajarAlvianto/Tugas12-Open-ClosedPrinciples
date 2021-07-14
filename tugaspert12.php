<?php

interface Kalkulator {
    public function hitungBangunRuang($satuan);
}

class PersegiPanjang implements Kalkulator {
    public $panjang;
    public $lebar;

    public function hitungBangunRuang($satuan) {
        $this->panjang = $satuan['panjang'];
        $this->lebar = $satuan['lebar'];
        return ('Bangun Ruang : Persegi Panjang<br>'.
                'Panjang : '.$this->panjang.' <br>'.
                'Lebar : '.$this->lebar.' <br>'.
                'Luas Persegi Panjang : '.$this->panjang * $this->lebar.' m2');
    }
}

class Bola implements Kalkulator {
    public $jarijari;

    public function hitungBangunRuang($satuan) {
        $this->jarijari = $satuan['jarijari'];
        return ('Bangun Ruang : Bola<br>'.
                'Jari - jari : '.$this->jarijari.' <br>'.
                'Volume Bola : '.(4/3) * pi() * $this->jarijari * $this->jarijari * $this->jarijari.' m3');
    }
}

class Kerucut implements Kalkulator {
    public $tinggi;
    public $jarijari;

    public function hitungBangunRuang($satuan) {
        $this->tinggi = $satuan['tinggi'];
        $this->jarijari = $satuan['jarijari'];
        return ('Bangun Ruang : Kerucut<br>'.
                'Tinggi : '.$this->tinggi.' <br>'.
                'Jari - jari : '.$this->jarijari.' <br>'.
                'Volume Kerucut : '.(1/3) * pi() * $this->jarijari * $this->jarijari * $this->jarijari.' m3');
    }
}

class Kubus implements Kalkulator {
    public $rusuk;

    public function hitungBangunRuang($satuan) {
        $this->rusuk = $satuan['rusuk'];
        return ('Bangun Ruang : Kubus<br>'.
                'Panjang Rusuk : '.$this->rusuk.' <br>'.
                'Volume Kubus : '.$this->rusuk * $this->rusuk * $this->rusuk.' m3');
    }
}

class Lingkaran implements Kalkulator {
    public $jarijari;
    public function hitungBangunRuang($satuan) {
        $this->jarijari = $satuan['jarijari'];
        return ('Bangun Ruang : Lingkaran<br>'.
                'jari - jari  : '.$this->jarijari.' <br>'.
                'Keliling Lingkaran : '.(2 * pi() * $this->jarijari.' m'));
    }
}

class KalkulatorBangunRuangFactory {
    public function initializeKalkulatorBangunRuang($menu) {
        if ($menu === 'luasPersegiPanjang') {
            return new PersegiPanjang();
        }
        if ($menu == 'volumeBola') {
            return new Bola();
        }
        if ($menu === 'volumeKerucut') {
            return new Kerucut();
        }
        if ($menu === 'volumeKubus') {
            return new Kubus();
        }
        if ($menu === 'kelilingLingkaran') {
            return new Lingkaran();
        }

        throw new Exception("Tidak ada pilihan tersebut!");
    }
}

$satuan = ['rusuk'=> 16, 'panjang'=> 8, 'lebar'=> 15, 'jarijari'=> 100, 'tinggi'=>4];
class Json {
    public static function form($data){
        return json_encode($data);
    }
}
echo'<center><b>TUGAS PRPL PERTEMUAN 12</b></center><br><br><br>';
echo'=====================================<br>';
$pilihanKalkulatorBangunRuang = 'volumeBola';
$kalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$kalkulatorBangunRuang = $kalkulatorBangunRuangFactory->initializeKalkulatorBangunRuang($pilihanKalkulatorBangunRuang);
$hasilKalkulatorBangunRuang = $kalkulatorBangunRuang->hitungBangunRuang($satuan);
print_r($hasilKalkulatorBangunRuang);
echo'<br>=====================================<br>';
$pilihanKalkulatorBangunRuang = 'luasPersegiPanjang';
$kalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$kalkulatorBangunRuang = $kalkulatorBangunRuangFactory->initializeKalkulatorBangunRuang($pilihanKalkulatorBangunRuang);
$hasilKalkulatorBangunRuang = $kalkulatorBangunRuang->hitungBangunRuang($satuan);
print_r($hasilKalkulatorBangunRuang);
echo'<br>=====================================<br>';
$pilihanKalkulatorBangunRuang = 'kelilingLingkaran';
$kalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$kalkulatorBangunRuang = $kalkulatorBangunRuangFactory->initializeKalkulatorBangunRuang($pilihanKalkulatorBangunRuang);
$hasilKalkulatorBangunRuang = $kalkulatorBangunRuang->hitungBangunRuang($satuan);
print_r($hasilKalkulatorBangunRuang);
echo'<br>=====================================<br>';