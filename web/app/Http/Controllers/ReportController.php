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
use Excel;

class ReportController extends Controller
{
    public function export()
    {


        Excel::create('RAB', function($excel) {

          // Set the title
          $excel->setTitle('Expot to Excel');
          // Chain the setters
          $excel->setCreator('Evan Sumangkut')
                ->setCompany('TI unlam');
          // Call them separately
          $excel->setDescription('A demonstration to change the file properties');
 
          $excel->sheet('RAB', function ($sheet) {
 


$sheet->setWidth(array(
    'A'     =>  20,
    'B'     =>  80,
    'C'     =>  30,
    'D'     =>  20,
    'E'     =>  20,
    'F'     =>  15,

 
));




$sheet->row(1, array(
'RINCIAN KERTAS KERJA UNIT SATKER'));


$sheet->row(2, array(
'UNIVERSITAS LAMBUNG MANGKURAT'));

$sheet->row(3, array(
'TAHUN ANGGARAN 2016'));

$sheet->row(4, array(
'UNIT SATKER : FAKULTAS TEKNIK'));

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
$detailusulan = Detail_Usulan::whereId_usulan(1)->orderBy('id','asc')->get();

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

//$sheet->appendRow(array(
//'akun','','','','harga',''));

//$sheet->prependRow(19,array( 
//'subinput', '','','','harga' ));
//$sheet->prependRow(19,array( 
//'input', '','','','harga' ));
//$sheet->prependRow(19,array( 
//'suboutput', '','','','harga' ));
//$sheet->prependRow(19,array( 
//'output', '','','','harga' ));
//SUBOUTPUT
//$sheet->appendRow(array(
//'5742.002.002','LAYANAN PENDIDIKAN S1','','','RP 3.436.282.000',''));
//$sheet->setBorder('A11:F11', 'thin');

//$sheet->cells('A10:F11', function($cells) {
//   $cells->setFont(array(
//    'bold'       =>  true
//));
//});

//$sheet->cells('A10:A11', function($cells) {
//$cells->setAlignment('right');
//});


//KOMPONEN
//$sheet->appendRow(array(
//'051','Penerimaan Mahasiswa Baru','','','RP 111.650.000',''));
//$sheet->cells('A12:G12', function($cells) {
//   $cells->setFont(array(
//    'bold'       =>  true
//));
//});
//$sheet->cell('A12', function($cells) {
//$cells->setAlignment('center');
//});
//$sheet->setBorder('A12:F12', 'thin');

//SUBKOMP
//$sheet->appendRow(array(
//'A','Promosi dan Sosialisasi Penerimaan Mahasiswa Baru','','','RP 43.250.000',''));
//$sheet->cell('A13', function($cells) {
//$cells->setAlignment('center');
//});
//$sheet->cells('A13:G13', function($cells) {
//   $cells->setFont(array(
//    'bold'       =>  true
//));
//});
//$sheet->setBorder('A13:F13', 'thin');
//AKUN
//$sheet->appendRow(array(
//'521211','Belanjar Bahan','','','RP 2.000.000',''));
//$sheet->cell('A14', function($cells) {
//$cells->setAlignment('center');
//});
//$sheet->setBorder('A14:F14', 'thin');
//DETIL
//$sheet->appendRow(array(
//'','- Cetak Brosur [1 KEG x 1 PKT x 400 LBR]','400 LBR','RP 5.0000','RP 2.000.000','PNBP'));
//$sheet->setBorder('A15:F15', 'thin');



$sheet->setFontFamily('Calibri');

// Font size
$sheet->setFontSize(11);






//$sheet->setBorder('A6:F11', 'thin');
         });
    })->export('xls');

  }
   
}
