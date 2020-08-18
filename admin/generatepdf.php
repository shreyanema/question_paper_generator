<?php
if(!isset($_SESSION["type"]))
{  header("location:../index.php"); }
if($_SESSION["type"] == 'user')
{  header("location:../index.php"); }
?>
 <!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
  b{ text-align: center;
   }
</style>
<body>

</body>
</html>
<?php


$obj="";
$short="";
$long="";
$or ="<table width='100%'>
    <tr>
        <td align='center'><b>OR</b></td>
    </tr>  
  </table>";
$maxmarks=$_POST["maxm"];
$maxmarkobj = (12.5*$maxmarks)/100;
$objmark=$maxmarkobj/5;
$maxmarkshort = (25*$maxmarks)/100;
$shortmark=$maxmarkshort/5;
$maxmarklong = (62.5*$maxmarks)/100;
$longmark=$maxmarklong/5;
$minmarks =round((33*$maxmarks)/100);

$note="<b>Note:</b> All sections are compulsory.Marks are indicated against each section.";

 $heading="<b>".$_POST["showheading"]."</b>";
 $showobjhead = "<b>SECTION-A<br>(Objective Type Questions)</b>";
 $showobjmarks="(".$objmark."x 5=".$maxmarkobj.")"; 
 $showshorthead = "<b>SECTION-B<br>(Short Answer Type Question)</b>";
 $showshortmarks="(".$shortmark."x 5=".$maxmarkshort.")"; 
 $showlonghead = "<b>SECTION-C<br>(Long Answer Type Question)</b>";
 $showlongmarks="(".$longmark."x 5=".$maxmarklong.")";

  $obj1 = $_POST['pdfobj1'];


  $obj2 = $_POST['pdfobj2'];


  $obj3 = $_POST['pdfobj3'];


  $obj4 = $_POST['pdfobj4'];

  $obj5 = $_POST['pdfobj5'];

  $obj .="<div style='font-family: freeserif;'>".$obj1."<br>".$obj2."<br>".$obj3."<br>".$obj4."<br>".$obj5."<br></div>";

 $short .="<div style='font-family: freeserif;'>".$_POST["pdfshort1"].$or.$_POST["pdfshort1_or"]."<br>".$_POST["pdfshort2"].$or.$_POST["pdfshort2_or"]."<br>".$_POST["pdfshort3"].$or.$_POST["pdfshort3_or"]."<br>".$_POST["pdfshort4"].$or.$_POST["pdfshort4_or"]."<br>".$_POST["pdfshort5"].$or.$_POST["pdfshort5_or"]."<br></div>";
$long .="<div style='font-family: freeserif;'>".$_POST["pdflong1"].$or.$_POST["pdflong1_or"]."<br>".$_POST["pdflong2"].$or.$_POST["pdflong2_or"]."<br>".$_POST["pdflong3"].$or.$_POST["pdflong3_or"]."<br>".$_POST["pdflong4"].$or.$_POST["pdflong4_or"]."<br>".$_POST["pdflong5"].$or.$_POST["pdflong5_or"]."<br></div>";



$end ="<br>******************<br>";

$tbl = "
<table width='100%'>
    <tr>
        <td align='left'><b>Time:</b>".$_POST["time"]."hrs.</td>
       
        <td align='right'><b>Max. Marks:</b>".$maxmarks."
        <br><b>Min. Marks: </b>".$minmarks."</td>
    </tr>
   
</table>
";

include( 'vendor/autoload.php');
$mpdf = new \Mpdf\Mpdf([
 'margin_top' => 8,
  'margin_left' => 170,
  'margin_right' => 10,
  'mirrorMargins' => true
]);

$stylesheet ='';
$mpdf->setFooter('{PAGENO}/{nbpg}');
$mpdf->SetTitle('Question Paper');
//$mpdf->SetDisplayMode('none','two');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->AddPage("L");
$mpdf->SetDefaultBodyCSS('text-align', 'center');
$mpdf->WriteHTML($heading);
$mpdf->writeHTML($tbl);
$mpdf->SetDefaultBodyCSS('text-align', 'left');
$mpdf->writeHTML($note);
$mpdf->SetDefaultBodyCSS('text-align', 'center');
$mpdf->writeHTML($showobjhead);
$mpdf->SetDefaultBodyCSS('text-align', 'right');
$mpdf->writeHTML($showobjmarks);
$mpdf->SetDefaultBodyCSS('text-align', 'left');
$mpdf->writeHTML($obj1);
$mpdf->writeHTML($obj2);
$mpdf->writeHTML($obj3);
$mpdf->writeHTML($obj4);
$mpdf->writeHTML($obj5);
$mpdf->SetDefaultBodyCSS('text-align', 'center');
$mpdf->writeHTML($showshorthead);
$mpdf->SetDefaultBodyCSS('text-align', 'right');
$mpdf->writeHTML($showshortmarks);
$mpdf->SetDefaultBodyCSS('text-align', 'left');
$mpdf->writeHTML($short);
$mpdf->SetDefaultBodyCSS('text-align', 'center');
$mpdf->writeHTML($showlonghead);
$mpdf->SetDefaultBodyCSS('text-align', 'right');
$mpdf->writeHTML($showlongmarks);
$mpdf->SetDefaultBodyCSS('text-align', 'left');
$mpdf->writeHTML($long);
$mpdf->SetDefaultBodyCSS('text-align', 'center');
$mpdf->writeHTML($end);
/*$mpdf->Output('questionfile.pdf','F');  */
$mpdf->Output('ex.pdf','F');
?>