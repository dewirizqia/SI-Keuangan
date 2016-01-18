<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Output;
use App\Sub_Output;
use App\Input;
use App\Sub_Input;
use App\Detail_Usulan;
use App\Akun;
use App\Detail_Spj;
use App\SPJ_LS_Detail;
use App\SPJ_LS;
use App\SPJ_UP;
use App\SPJ_UP_Detail;
use App\Usulan;
use App\Bagian;
use App\Belanja;
use App\Pagu;
use App\Pagu_Bagian;
use Excel;

class ExcelController extends Controller
{
       public function rab($id)
    {


        Excel::create('RAB', function($excel)use($id) {

          // Set the title
          $excel->setTitle('Expot to Excel');
          // Chain the setters
          $excel->setCreator('Evan Sumangkut')
                ->setCompany('TI unlam');
          // Call them separately
          $excel->setDescription('A demonstration to change the file properties');
 
          $excel->sheet('RAB', function ($sheet)use($id) {
 


$sheet->setWidth(array(
    'A'     =>  20,
    'B'     =>  80,
    'C'     =>  30,
    'D'     =>  20,
    'E'     =>  20,
    'F'     =>  15,

 
));

$usulan = Usulan::whereId($id)->firstOrFail();
$bagian = Bagian::whereId($usulan->id_bagian)->firstOrFail();
$prodi = $usulan->tahun;
$prodi = strtoupper($prodi);

$sheet->row(1, array(
'RENCANA ANGGARAN BELANJA'));


$sheet->row(2, array(
'UNIVERSITAS LAMBUNG MANGKURAT'));

$sheet->row(3, array(
'TAHUN ANGGARAN '.$prodi));

$sheet->row(4, array(
$bagian->detail));

$sheet->cells('A1:A4', function($cells) {
     $cells->setFont(array(
    'size'       => '12',
    'bold'       =>  true
));
$cells->setAlignment('left');
});



// KOP
$sheet->row(6, array(
'KODE','PROGRAM/KEGIATAN/OUTPUT/SUBOUTPUT/KOMPONEN/SUBKOMP/AKUN/DETIL','VOLUME','SATUAN','HARGA SATUAN','JUMLAH BIAYA','SD'));

$sheet->cells('A6:F6', function($cells) {
$cells->setAlignment('center');
});
//KEGIATAN
$sheet->rows(array(
    array('5742','PENINGKATAN LAYANAN TRIDHARMA PENDIDIKAN TINGGI','','','','RP 10.406.280.000',''),
    array('5742','PENINGKATAN LAYANAN TRIDHARMA PENDIDIKAN TINGGI (PNBP)','','','','RP 10.406.280.000',''),
    array('5742','PENINGKATAN LAYANAN TRIDHARMA PENDIDIKAN TINGGI (BOPTN)','','','','RP 10.406.280.000','')
));
$sheet->setBorder('A6:G9', 'thin');

$sheet->cells('A6:F9', function($cells) {
     $cells->setFont(array(
    'bold'       =>  true
));
});

$sheet->cells('A7:A9', function($cells) {
$cells->setAlignment('right');
});



  

// gambaranya flashback
$detailusulan = Detail_Usulan::whereId_usulan($id)->orderBy('id','asc')->get();

$noS = 10; //no sheet
$a = ""; //nilai yang sama untuk pengulanagan pada if
$si = ""; //sub input
$i = ""; //input
$so = ""; //sub output
$o = ""; //output



$tso = 0; //total sub output
$to = 0; //total output
foreach ($detailusulan as $detailusulans){
$sheet->appendRow(array(
'',$detailusulans->detail,$detailusulans->nominal,$detailusulans->satuan,$detailusulans->harga_satuan,$detailusulans->jumlah,''));
$sheet->setBorder('A'.$noS.':G'.$noS, 'thin');



$subinput=Sub_Input::whereId($detailusulans->id_subinput)->firstOrFail();

if($subinput!=$si){

//--------------perhitungan sub input--------------
$pdu = Detail_Usulan::whereId_subinput($detailusulans->id_subinput)->get(); //pengulangan detail usulan
$tsi = 0; //total sub input
foreach($pdu as $pdus){

  $ndu = $pdus->jumlah; //nilai detail usulan

  $tsi = $tsi + $ndu;
}//-------------tutup perhitungan sub input-----------------

$sheet->prependRow($noS,array(
  $subinput->kode_subinput,$subinput->uraian,'','','',$tsi,''));
  $si = $subinput;

  $sheet->cells('A'.$noS.':A'.$noS, function($cells) {
  $cells->setAlignment('center');
  });   
  $sheet->cells('A'.$noS.':G'.$noS, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
  ));
  });

  $noS++;
}else{

}


$input=Input::whereId($subinput->id_input)->firstOrFail();

  
if($input!=$i){
  $noS = $noS - 1;


//----------------perhitungan input------------------------
$psi = Sub_Input::whereId_input($subinput->id_input)->get();//nilai sub input
$ti = 0; //total input
$hti=0; //hasil total input

foreach($psi as $psis){

//----------------perhitungan sub input------------------
$pdu = Detail_Usulan::whereId_subinput($psis->id)->get(); //pengulangan detail usulan
$tsi = 0; //total sub input
foreach($pdu as $pdus){

  $ndu = $pdus->jumlah; //nilai detail usulan

  $tsi = $tsi + $ndu;
}//---------------tutup perhitungan sub input------------------

  $ti = $tsi;
  $hti = $hti + $ti;

}//---------------tutup pengulangan sub input-------------------



$sheet->prependRow($noS,array(
  $input->kode_input,$input->uraian,'','','',$hti,''));
  $i = $input;

  $sheet->cells('A'.$noS.':A'.$noS, function($cells) {
$cells->setAlignment('center');
});   
$sheet->cells('A'.$noS.':G'.$noS, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

  $noS = $noS + 2;
}else{

}


$suboutput=Sub_Output::whereId($input->id_suboutput)->firstOrFail();

if($suboutput!=$so){
  $noS = $noS - 2;


//----------------perhitungan sub output------------------------ 1
$pi = Input::whereId_suboutput($input->id_suboutput)->get();//pengulangan input

$htso=0; //hasil total sub output


foreach($pi as $pis){

//----------------perhitungan input------------------------ 2
$psi = Sub_Input::whereId_input($pis->id)->get();//pengulangan sub input
$hti=0; //hasil total input
$tso = 0; //total sub output

foreach($psi as $psis){

//----------------perhitungan sub input------------------ 3
$pdu = Detail_Usulan::whereId_subinput($psis->id)->get(); //pengulangan detail usulan
$tsi = 0; //total sub input
$ti = 0; //total input

foreach($pdu as $pdus){

  $ndu = $pdus->jumlah; //nilai detail usulan

  $tsi = $tsi + $ndu;
}//---------------tutup perhitungan sub input------------------ 3 

  $ti = $tsi;
  $hti = $hti + $ti;

}//---------------tutup pengulangan sub input------------------- 2


  $tso = $hti;
  $htso = $htso + $tso;

}//---------------tutup pengulangan sub output------------------- 1


$output=Output::whereId($suboutput->id_output)->firstOrFail();
$sheet->prependRow($noS,array(
  '5742.'.$output->kode_output.'.'.$suboutput->kode_suboutput,$suboutput->uraian,'','','',$htso,''));
  $so = $suboutput;

$sheet->cells('A'.$noS.':A'.$noS, function($cells) {
$cells->setAlignment('right');
});   
$sheet->cells('A'.$noS.':G'.$noS, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

  $noS = $noS + 3;
}else{

}



$output=Output::whereId($suboutput->id_output)->firstOrFail();

if($output!=$o){
  $noS = $noS - 3;


//----------------perhitungan output------------------------ 1
$pso = Sub_Output::whereId_output($suboutput->id_output)->get();//pengulangan sub output

$hto=0; //hasil total output


foreach($pso as $psos){


//----------------perhitungan sub output------------------------ 1
$pi = Input::whereId_suboutput($psos->id)->get();//pengulangan input

$htso=0; //hasil total sub output
$to =0; //total output

foreach($pi as $pis){

//----------------perhitungan input------------------------ 2
$psi = Sub_Input::whereId_input($pis->id)->get();//pengulangan sub input
$hti=0; //hasil total input
$tso = 0; //total sub output

foreach($psi as $psis){

//----------------perhitungan sub input------------------ 3
$pdu = Detail_Usulan::whereId_subinput($psis->id)->get(); //pengulangan detail usulan
$tsi = 0; //total sub input
$ti = 0; //total input

foreach($pdu as $pdus){

  $ndu = $pdus->jumlah; //nilai detail usulan

  $tsi = $tsi + $ndu;
}//---------------tutup perhitungan sub input------------------ 3 

  $ti = $tsi;
  $hti = $hti + $ti;

}//---------------tutup pengulangan sub input------------------- 2


  $tso = $hti;
  $htso = $htso + $tso;

}//---------------tutup pengulangan sub output------------------- 1


  $to = $htso;
  $hto = $hto + $to;

}//---------------tutup pengulangan sub output------------------- 1





$sheet->prependRow($noS,array(
  '5742.'.$output->kode_output,$output->uraian,'','','',$hto,''));
  $o = $output;

  $sheet->cells('A'.$noS.':A'.$noS, function($cells) {
$cells->setAlignment('right');
});   
$sheet->cells('A'.$noS.':G'.$noS, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

  $noS = $noS + 4;
}else{

}



$akun=Akun::whereId($detailusulans->id_akun)->firstOrFail();

if($akun!=$a){
  
  $sheet->prependRow($noS,array(
  $akun->kode_akun,$akun->uraian_akun,'','','','',''));
  $a = $akun;

  $sheet->cells('A'.$noS.':A'.$noS, function($cells) {
$cells->setAlignment('center');
});  

$sheet->cells('A'.$noS.':G'.$noS, function($cells) {
   $cells->setFont(array(
    'bold'       =>  false
));
});

  $noS++;
}else{

}

$noS++;
}

$sheet->setFontFamily('Calibri');

// Font size
$sheet->setFontSize(11);


//$sheet->setBorder('A6:F11', 'thin');
         });
    })->export('xls');

  }


//------------TUTUP>----------------






























//----------------SPJ UP-------------------------
         public function up($id)
    {


        Excel::create('SPJ UP PNBP', function($excel)use($id) {

          // Set the title
          $excel->setTitle('Expot to Excel');
          // Chain the setters
          $excel->setCreator('Evan Sumangkut')
                ->setCompany('TI unlam');
          // Call them separately
          $excel->setDescription('A demonstration to change the file properties');
 
          $excel->sheet('Nominatif', function ($sheet)use($id) {
 


$sheet->setWidth(array(
    'A'     =>  8,
    'B'     =>  20,
    'C'     =>  1,
    'D'     =>  10,
    'E'     =>  4,
    'F'     =>  2,
    'G'   =>  10,
    'H'   =>  10,
    'I'   => 10,
    'J'   => 10,
    'K'   => 10,

 
));

$sheet->setHeight(array(
    1     =>  14,
    2     =>  14,
    3     =>  14,
    4     =>  20,
    7   => 30,
    18    => 40
));


$up = SPJ_UP::whereId($id)->firstOrFail();



$sheet->row(1, array(
'No. BKU','','KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI UNIVERSITAS LAMBUNG MANGKURAT BUKTI PENGELUARAN','','','','','','','TA 2015'));

$sheet->getStyle('C1')
    ->getAlignment()->setWrapText(true); 



$sheet->mergeCells('C1:I1')->cells('C1:I4', function($cells) {
  $cells->setAlignment('right');
   $cells->setValignment('center');
   $cells->setFont(array(
  'family'     => 'Arial',
    'size'       => '13',
    'Alignment' => 'center'
));
});;

$sheet->cells('b1:i4', function($cells) {
  $cells->setAlignment('center');
});

$sheet->mergeCells('j1:k1')->cells('j1:k1', function($cells) {
  $cells->setAlignment('center');
});



$sheet->row(2, array(
'No. JP','5','','','','','','','','Kode Akun : 522151'));

$sheet->row(3, array(
'Anak Satker','','','','','','','','','No. Buku Besar :   /'));

$sheet->mergeCells('A3:A4');
$sheet->mergeCells('B3:B4');

$sheet->setMergeColumn(array(
    'columns' => array('C','D','E','F','G','H','I'),
    'rows' => array(
        array(1,4),


    )
));

$sheet->getStyle('A3')
    ->getAlignment()->setWrapText(true); 

$sheet->setBorder('A1:K4', 'thin');

$sheet->row(7, array(
'SUDAH TERIMA UANG DARI','',':','KUASA PENGGUNA ANGGARAN','','','','','','Kode Kegiatan 5308 062 002 017J'));

$sheet->setBorder('j7:K7', 'thin');

$sheet->getStyle('j7')
    ->getAlignment()->setWrapText(true); 
$sheet->mergeCells('j7:k7');

$sheet->row(9, array(
'PEYELENGGARAAN KEGIATAN','',':','Layanan tridharma di Perguruan Tinggi (5308)','','','','','',''));



$sheet->row(11, array(
'UANG SEBANYAK','',':','Rp1.068.750','','','','','','56250','1068750'));

$sheet->cells('d11', function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

$sheet->setBorder('k12', 'thin');

$sheet->row(12, array(
'','','','','','','','','','1125000','Rp1.125.000'));

$sheet->row(14, array(
'UNTUK PEMBAYARAN','',':',$up->untuk_pembayaran));

$sheet->cells('d14', function($cells) {
$cells->setValignment('top');
});

$sheet->mergeCells('d14:i16');

$sheet->getStyle('d14')

    ->getAlignment()->setWrapText(true); 

$sheet->row(18, array(
'No','Nama','Jabatan','','Volume','','Satuan','Terima Kotor','Pajak','Terima Bersih','Tanda Tangan'));  

$sheet->setBorder('a18:K18', 'thin');

$sheet->getStyle('a18:k18')
    ->getAlignment()->setWrapText(true); 

$sheet->mergeCells('c18:d18');
$sheet->mergeCells('e18:f18');



$spjup = SPJ_UP_Detail::whereId_spj($id)->orderBy('id','asc')->get();
$no = 1;
$nos = 19;
$total = 0;
foreach ($spjup as $up){//buka
$sheet->appendRow(array(
$no,$up->nama,$up->jabatan,'',$up->volume,'',$up->satuan,$up->terima_kotor,$up->pajak,$up->terima_bersih,$no));

$sheet->cells('b'.$nos.':i'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

$sheet->setBorder('a'.$nos.':K'.$nos, 'thin');

$sheet->mergeCells('c'.$nos.':d'.$nos);
$sheet->mergeCells('e'.$nos.':f'.$nos);

$sheet->setHeight(array(
    $nos  => 40
));

$sheet->cells('k'.$nos, function($cells) {
$cells->setAlignment('left');
});   
$nos++;
$no++;
$total = $total + $up->terima_bersih;
}//tutup
$sheet->appendRow(array(
'','','','','','','','','',$total));

$sheet->cells('j'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

$sheet->setBorder('a'.$nos.':K'.$nos, 'thin');

$sheet->mergeCells('a'.$nos.':g'.$nos);

$sheet->setHeight(array(
    $nos  => 30
));
$nos = $nos +2;
$sheet->appendRow($nos,array(
'Setuju dibayar,','','','Lunas Tanggal','','','','','Banjarmasin'));

$sheet->appendRow(array(
'Pejabat Pembuat Komitmen,','','','BPP PNBP Fakultas Teknik,','','','','','Banjarmasin'));

$sheet->appendRow(array(
'Kasubag. Umum & BMN'));
$nos = $nos +5;
$sheet->appendRow($nos,array(
'','','','Muhammad Suhaimi'));

$sheet->cells('d'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

$sheet->appendRow(array(
'','','','NIP 19700810 199103 1 005'));
$sheet->appendRow(array(
'','','','Petugas Verifikasi,','','','','','Barang/pekerjaan tersebut'));


$sheet->appendRow(array(
'M. Syaifullah, ST., MT.','','','','','','','','telah diterima/ diselesaikan dengan'));
$nos = $nos+3;
$sheet->cells('a'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

$sheet->appendRow(array(
'NIP 19750130 200212 1 003','','','','','','','','lengkap dan baik dan'));

$sheet->appendRow(array(
'','','','','','','','','bertanggungjawab'));
$nosi = $nos +2;
$sheet->mergeCells('d'.$nos.':g'.$nosi);

$sheet->appendRow(array(
'','','','Muhammad Nawawi, SE'));
$nos = $nos+3;
$sheet->cells('d'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

$sheet->setFontFamily('Arial');

// Font size
$sheet->setFontSize(12);



         });
    })->export('xls');

  }

//------------TUTUP---------------------------------------











































//------------SPJ LS-------------------------
             public function ls($id)
    {


        Excel::create('SPJ LS', function($excel) use($id){

          // Set the title
          $excel->setTitle('Expot to Excel');
          // Chain the setters
          $excel->setCreator('Evan Sumangkut')
                ->setCompany('TI unlam');
          // Call them separately
          $excel->setDescription('A demonstration to change the file properties');
 
          $excel->sheet('SPJ LS', function ($sheet)use($id) {
 


$sheet->setWidth(array(
    'A'     =>  4,
    'B'     =>  20,
    'C'     =>  15,
    'D'     =>  10,
    'E'     =>  15

 
));



$ls = SPJ_LS::whereId($id)->firstOrFail();

$sheet->row(1, array(
'Kementerian Riset,Teknologi dan Pendidikan Tinggi','','','','','','TA 2015'));

$sheet->row(2, array(
'Fakultas Teknik Universitas Lambung Mangkurat','','','','','','MAK.521.213'));

$sheet->row(3, array(
'Banjarbaru','','','','','',$ls->kode_anggaran));

$sheet->row(5, array(
'Daftar Penerima : '.$ls->nama_kegiatan));

$sheet->row(6, array(
'Sesuai Sk Dekan Nomor : '.$ls->no_sk));

$sheet->row(7, array(
'Tanggal : 29 Juli 2015'));

$sheet->row(8, array(
'Untuk Satu kali Kegiatan dari tanggal 04 - 06 Agustus 2015'));

$sheet->row(9, array(
'Output kegiatan ( Kode ) '.$ls->kode_anggaran));

$sheet->cells('a5:a9', function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});



$sheet->row(10, array(
'No.','Nama','Jabatan','Jumlah Hari','Satuan','Banyaknya','PPh.Ps.21','Terima','Tanda'));

$sheet->row(11, array(
'','','','','','Rp.','Rp.','Rp.','Tangan'));

$sheet->setBorder('a10:i11', 'thin');

$sheet->cells('a10:i11', function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});


$spjls = SPJ_LS_Detail::whereId_ls($id)->orderBy('id','asc')->get();

$no = 1;
$nos = 12;
$banyaknya = 0;
$pajak = 0;
$terima = 0;
foreach ($spjls as $ls){//buka
$sheet->appendRow(array(
$no,$ls->nama,$ls->jabatan,$ls->jlh_hari,$ls->satuan,$ls->terima,$ls->pph,$ls->terima_bersih,$no.'............'));

$sheet->setBorder('a'.$nos.':i'.$nos, 'thin');

$sheet->cells('a'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});

$sheet->cells('g'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});
$no++;
$nos++;
$banyaknya = $banyaknya + $ls->terima;
$pajak = $pajak + $ls->pph;
$terima = $terima + $ls->terima_bersih;
}

$sheet->appendRow(array(
'','','','','',$banyaknya,$pajak,$terima));

$sheet->setBorder('a'.$nos.':i'.$nos, 'thin');

$sheet->cells('f'.$nos.':h'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});


$sheet->appendRow(array(
'Mengetahui/Menyetujui dibayar','','             Setuju Membayar,','','','Banjarbaru, ……………………'));

$sheet->appendRow(array(
'an.Kuasa Pengguna Anggaran','','             Bendahara Pengeluaran','','','Lunas dibayar,'));

$sheet->appendRow(array(
'Pejabat Pembuat Komitmen','','','','','BPP Fak.Teknik Unlam'));
$nos = $nos + 9;
$sheet->appendRow($nos,array(
'Muhammad Syaifullah, ST, MT','','             Pahrudin Ali Hamid, SE','','','Muhammad Suhaimi'));

$sheet->appendRow(array(
'NIP.197501302002121003','','             NIP.197508182005011003','','','NIP.197008101991031005'));

$sheet->setFontFamily('Arial');

// Font size
$sheet->setFontSize(12);



         });
    })->export('xls');

  }

//----------------------TUTUP------------------------------













































  //-------------------------------Nominatif--------------------------------
            public function nominatif($id)
    {


        Excel::create('Nominatif', function($excel)use($id) {

          // Set the title
          $excel->setTitle('Expot to Excel');
          // Chain the setters
          $excel->setCreator('Evan Sumangkut')
                ->setCompany('TI unlam');
          // Call them separately
          $excel->setDescription('A demonstration to change the file properties');
 
          $excel->sheet('Nominatif', function ($sheet)use($id) {
 


$sheet->setWidth(array(
    'A'     =>  4,
    'B'     =>  20,
    'C'     =>  15,
    'D'     =>  10,
    'E'     =>  15

 
));



$sk=SPJ_LS::whereId($id)->firstOrFail();


$sheet->row(1, array(
'Lampiran :'));

$sheet->row(2, array(
'Sesuai SK Dekan Nomor','',':' . $sk->no_sk));

$sheet->row(3, array(
'Tanggal','',': 29 Juli 2015'));

$sheet->cells('a1:c3', function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});


$sheet->row(6, array(
'Daftar Lampiran'));

$sheet->row(7, array(
'No.','Nama','Jabatan','Banyaknya','Keterangan'));

$sheet->row(8, array(
'','','','Rp.'));

$sheet->setBorder('a7:e8', 'thin');

$sheet->cells('a7:e8', function($cells) {
  $cells->setValignment('center');
   $cells->setFont(array(
    'bold'       =>  true
));
});


$sheet->setMergeColumn(array(
    'columns' => array('a','b','c','E'),
    'rows' => array(
        array(7,8)
    )
));

$nominatif = SPJ_LS_Detail::whereId_ls($id)->orderBy('id','asc')->get();

$no = 1;
$nos = 9;

foreach ($nominatif as $nm){//buka
$sheet->appendRow(array(
$no,$nm->nama,$nm->jabatan,$nm->terima,'Untuk Satu kali Kegiatan dari tanggal 04 - 06 Agustus 2015'));

$sheet->setBorder('a'.$nos.':e'.$nos, 'thin');

$sheet->cells('a'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});
$sheet->mergeCells('e9:e'.$nos);
$nos++;
}
$sheet->cells('e9', function($cells) {
$cells->setValignment('center');
});

$sheet->getStyle('e9')
    ->getAlignment()->setWrapText(true);
$nos = $nos+2;
$sheet->appendRow($nos, array(
'','','','Penanggung Jawab Kegiatan,'));
$sheet->appendRow(array(
'','','','Dekan'));

$nos = $nos+4;
$sheet->appendRow($nos,array(
'','','','Dr.-Ing. Yulian Firmana Arifin, S.T., M.T.'));

$sheet->appendRow(array(
'','','','NIP  19750719 200003 1 001'));

$sheet->setFontFamily('Arial');

// Font size
$sheet->setFontSize(12);



         });
    })->export('xls');

  }
//--------------------------TUTUP-------------------------------























































//-------------------------------SPTB---------------------------------------
           public function sptb()
    {

        Excel::create('SPTB', function($excel) {

          // Set the title
          $excel->setTitle('Expot to Excel');
          // Chain the setters
          $excel->setCreator('Evan Sumangkut')
                ->setCompany('TI unlam');
          // Call them separately
          $excel->setDescription('A demonstration to change the file properties');
 
          $excel->sheet('SPTB', function ($sheet) {
 


$sheet->setWidth(array(
    'A'     =>  6,
    'B'     =>  4,
    'C'     =>  15,
    'D'     =>  10,
    'E'     =>  15,
    'f' => 30,
    'g' => 10,
    'h' => 10,
    'i' => 20,
    'j' => 15,
    'k' => 15,
    'l' => 15,
    'm' => 15

 
));





$sheet->row(2, array(
'SURAT PERNYATAAN TANGGUNG JAWAB BELANJA (SPTB)'));

$sheet->mergeCells('a2:m2');

$sheet->row(3, array(
'DAFTAR ISIAN PENGGUNAAN ANGGARAN PNBP'));

$sheet->mergeCells('a3:m3');
$sheet->row(4, array(
'Nomor SPTB          / PNP/2015'));
$sheet->mergeCells('a4:m4');

$sheet->cells('a2:a4', function($cells) {
  $cells->setAlignment('center');
   $cells->setFont(array(
    'bold'       =>  true
));
});



$sheet->row(6, array(
'','','1. Kode Kantor','',': 400095'));

$sheet->row(7, array(
'','','2. Nama kantor / satker','',': Universitas Lambung Mangkurat / Teknik'));

$sheet->row(8, array(
'','','3. Tgl dan nomor DIPA PNBP','',': 15-04-2015 / 042.04.2.400095/2015'));

$sheet->row(9, array(
'','','4. Klasifikasi Anggaran','',': 5308.015.   ( Layanan Pendidikan )'));

$sheet->row(11, array(
'','','','Yang bertanda tangan dibawah ini atas nama Kuasa Pengguna Anggaran Satuan Kerja Universitas Lambung '));

$sheet->row(12, array(
'','','menyatakan bahwa saya bertanggungjawab secara formal dan material atas segala pengeluaran yang telah dibayar '));

$sheet->row(13, array(
'','','Pengeluaran kepada yang berhak menerima serta kebenaran perhitungan dan setoran pajak yang telah dipungut atas pembayaran tersebut'));

$sheet->row(14, array(
'','','dengan perincian sebagai berikut :'));






$sheet->row(16, array(
'NO.BKU.','NO','Kode Mata Anggaran','MAK','PENERIMA','URAIAN','TANDA BUKTI','','JUMLAH','PPN','PPh 21','PPh 22','PPh 23'));

$sheet->mergeCells('g16:h16');

$sheet->row(17, array(
'SAS','','','','','','Tgl','Nomor'));

$sheet->setBorder('a16:m17', 'thin');


$pagu = Pagu::whereTahun(2015)->firstOrFail();
$pagu_bagian = Pagu_Bagian::whereId_pagu($pagu->id)->firstOrFail();
$belanja = Belanja::whereId_pagu_bagian($pagu_bagian->id)->orderBy('id', 'asc')->get();
$no = 1;
$nos = 18;
$ambilan = Belanja::whereId_pagu_bagian($pagu_bagian->id)->orderBy('id', 'asc')->firstOrFail();
$ns = $ambilan->MAK;
$total = 0;
$totalh = 0;
$totals= 0;
foreach ($belanja as $blj) {
  
if($ns == $blj->MAK){

$sheet->appendRow(array(
$blj->no_bku,$no,$blj->Kode_MA,$blj->MAK,$blj->penerima,$blj->uraian,$blj->tgl,$blj->no_tanda_bukti,$blj->jumlah,'','','',''));

$sheet->setBorder('a'.$nos.':m'.$nos, 'thin');
$total = $total + $blj->jumlah;
$no++;
$nos++;
} 
else{
$sheet->appendRow(array(
'jumlah','','','','','','','',$total  ));
$totalh = $total;

$sheet->cells('i'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});
$ns = $blj->MAK;
$sheet->setBorder('a'.$nos.':m'.$nos, 'thin');
$no++;
$nos++;

$total = 0;
$sheet->appendRow(array(
$blj->no_bku,$no,$blj->Kode_MA,$blj->MAK,$blj->penerima,$blj->uraian,$blj->tgl,$blj->no_tanda_bukti,$blj->jumlah,'','','',''));

$sheet->setBorder('a'.$nos.':m'.$nos, 'thin');
$total = $total + $blj->jumlah;
$no++;
$nos++;

$totals = $totals + $totalh;
}

}

$sheet->appendRow(array(
'jumlah','','','','','','','',$total));
$ns = $blj->MAK;
$sheet->cells('i'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});
$sheet->setBorder('a'.$nos.':m'.$nos, 'thin');
$nos++;
$totals = $totals + $total;
$sheet->appendRow(array(
'jumlah','','','','','','','',$totals));
$sheet->cells('i'.$nos, function($cells) {
   $cells->setFont(array(
    'bold'       =>  true
));
});
$sheet->setBorder('a'.$nos.':m'.$nos, 'thin');

$nos = $nos + 2;
$sheet->appendRow($nos,array(
'Bukti-bukti pengeluaran anggaran dan asli setoran pajak (SSB/BPN) tersebut di atas disimpan oleh Pengguna Anggaran/Kuasa Pengguna Anggaran'  ));
$nos++;
$sheet->appendRow(array(
'untuk kelengkapan administrasi dan pemeriksaan aparat pengawasan fungsional.'  ));
$nos = $nos +2;
$sheet->appendRow($nos,array(
'Demikian surat pernyataan ini dibuat dengan sebenarnya.' ));
$nos = $nos +2;
$sheet->appendRow($nos,array(
'','','','','Pejabat Pembuat Komitmen','','Banjarmasin,        Desember 2015' ));
$nos++;
$sheet->appendRow(array(
'','','','','','','Bendahara Pengeluaran '  ));
$nos = $nos +5;
$sheet->appendRow($nos,array(
'','','','','Muhammad Syaifullah, MT','','Pahrudin Ali Hamid, SE' ));

$sheet->appendRow(array(
'','','','','NIP. 197501302002121003','','NIP.  1975081820050110003'  )); 
$sheet->setFontFamily('Arial');

// Font size
$sheet->setFontSize(12);



         });
    })->export('xls');

  }
}
