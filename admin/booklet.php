<?php
session_start();
if(!isset($_SESSION["type"]))
{  header("location:../index.php"); }
if($_SESSION["type"] == 'admin')
{  header("location:../index.php"); }
// require composer autoload
include( 'vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf([
    'format' => 'A4-L',
    'margin_left' => 0,
    'margin_right' => 0,
    'margin_top' => 0,
    'margin_bottom' => 0,
    'margin_header' => 0,
    'margin_footer' => 0,
]);


$ow = $mpdf->h;
$oh = $mpdf->w;
$pw = $mpdf->w / 2;
$ph = $mpdf->h;

$mpdf->SetDisplayMode('fullpage');
$pagecount = $mpdf->SetSourceFile('ex.pdf');
 $n =$pagecount;
if($n%2==0)
{ if($n==2)
    {
        $mpdf->Addpage();
        $import_page = $mpdf->importPage(1);
        $mpdf->UseTemplate($import_page);
        $mpdf->Addpage();
        $import_page = $mpdf->importPage(2);
        $mpdf->UseTemplate($import_page);

    }
    else{
         $loop = ceil($n/2);
        $j=$n;
    
    for($i = 1 ; $i<=$loop ;$i++)
    {   $mpdf->Addpage();
        $import_page = $mpdf->importPage($i);
        $mpdf->UseTemplate($import_page);
         $import_page = $mpdf->importPage($j);
        $mpdf->UseTemplate($import_page);
        $j--;
    }
    }
   
}
else
{ if($n == 1)
    {
        $mpdf->Addpage();
        $import_page = $mpdf->importPage(1);
        $mpdf->UseTemplate($import_page);
    }
    else{
         $loop = ceil($n/2);
        $j=$n;
        $mpdf->Addpage();
        $import_page = $mpdf->importPage(1);
        $mpdf->UseTemplate($import_page);
        for($i = 2 ; $i <= $loop ;$i++)
        {
            $mpdf->Addpage();
            $import_page = $mpdf->importPage($i);
            $mpdf->UseTemplate($import_page);
            $import_page = $mpdf->importPage($j);
            $mpdf->UseTemplate($import_page);  
            $j--;
        }
    }
   
        
}
 $mpdf->Output();



 ?>