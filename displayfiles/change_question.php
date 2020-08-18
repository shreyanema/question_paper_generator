
<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
if(isset($_POST['chngobj_unit']))
{
	$class =$_POST['chngobj_class'];
	$sub =$_POST['chngobj_sub'];
	$unit =$_POST['chngobj_unit'];
	$level =$_POST['chngobj_level'];
	include 'functions.php';
	
	echo generateobj($class,$sub,$unit,$level,$unit);
}
if(isset($_POST['chngshort_unit']))
{
	$class =$_POST['chngshort_class'];
	$sub =$_POST['chngshort_sub'];
	$unit =$_POST['chngshort_unit'];
	$level =$_POST['chngshort_level'];
	include 'functions.php';
	
	echo generateshortlong($class,$sub,$unit,'4',$level,$unit);
}

if(isset($_POST['chngshort_or_unit']))
{
	$class =$_POST['chngshort_or_class'];
	$sub =$_POST['chngshort_or_sub'];
	$unit =$_POST['chngshort_or_unit'];
	$level =$_POST['chngshort_or_level'];
	$sno =$unit.'_OR';
	include 'functions.php';
	
	echo generateshortlong($class,$sub,$unit,'4',$level,$sno);
}

if(isset($_POST['chnglong_unit']))
{
	$class =$_POST['chnglong_class'];
	$sub =$_POST['chnglong_sub'];
	$unit =$_POST['chnglong_unit'];
	$level =$_POST['chnglong_level'];
	include 'functions.php';

	echo generateshortlong($class,$sub,$unit,'5',$level,$unit);
}

if(isset($_POST['chnglong_or_unit']))
{
	$class =$_POST['chnglong_or_class'];
	$sub =$_POST['chnglong_or_sub'];
	$unit =$_POST['chnglong_or_unit'];
	$level =$_POST['chnglong_or_level'];
	$sno =$unit.'_OR';
	include 'functions.php';

	echo generateshortlong($class,$sub,$unit,'5',$level,$sno);
}

?>

