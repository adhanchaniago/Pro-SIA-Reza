<?php if(!defined('BASEPATH'))exit('NoDirect script access allowed');
require 'pdf/fpdf.php';
class Pdf extends FPDF{

	function __construct($orientation='L', $unit='mm', $size='A4')
	{
		parent::__construct($orientation,$unit,$size);
	}

	function Header()
	{
		global $title;
		$smp = 'Toko Yudha';
		$alm = 'Alamat : Kabun Pondok Duo Nagari Tandikat Selatan Kec. Patamuan'; 
		$pos = 'No. Telp : 0821-7047-1992';
		$lebar = $this->w;

	    $this->SetFont('Arial','B',15);

	    $w = $this->GetStringWidth($smp);
	    $this->SetX(($lebar-$w)/2);
	    $this->Cell($w,9,$smp,0,0,'C');
	    $this->Ln(6);

	    $this->SetFont('Arial','B',12);

	    $y = $this->GetStringWidth($alm);
	    $this->SetX(($lebar-$y)/2);
	    $this->Cell($y,9,$alm,0,0,'C');
	    $this->Ln(5);

	    $t = $this->GetStringWidth($pos);
	    $this->SetX(($lebar-$t)/2);
	    $this->Cell($t,9,$pos,0,0,'C');
	    $this->Ln();

	    $this->line($this->GetX(),$this->GetY(),$this->GetX()+$lebar-20,$this->GetY());
	    $this->Ln(5);

	    $this->SetFont('Arial','B',13);

	    $x = $this->GetStringWidth($title);
	    $this->SetX(($lebar-$x)/2);
	    $this->Cell($x,9,$title,0,0,'C');
	    

	    // Title
	    
	    // Line break
	    $this->Ln(10);
	}

	// Page footer
	function Footer() {
		date_default_timezone_set('asia/jakarta');

        $this->SetY(-15);   
        $lebar = $this->w;   
        $this->SetFont('Arial','I',8);           
        $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
        $this->SetY(-15);
        $this->SetX(0);       
        $this->Ln(1);
        $hal = 'Page : '.$this->PageNo().'/{nb}' ;
        $this->Cell($this->GetStringWidth($hal ),10,$hal );   
        $datestring = "Year: %Y Month: %m Day: %d - %h:%i";
        $tanggal  = 'Printed : '.date('d-m-Y  H:i').' ';
        $this->Cell($lebar-$this->GetStringWidth($hal )-$this->GetStringWidth($tanggal)-20);   
        $this->Cell($this->GetStringWidth($tanggal),10,$tanggal );   
    }
}

