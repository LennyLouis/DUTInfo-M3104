<?php

require_once('lib/fpdf/fpdf.php');
require_once('model/Birthday.class.php');

$bd = new Birthday("2002-08-07",
    "assets/img/wativersaire.png",
    "e toa la, jt1vit a mon WatiVersaire");

Header('Content-type: application/pdf; charset=UTF-8');

$pdf = new FPDF('P','mm',array(119.0625,158.74999999995));
$pdf->AddPage();
$pdf->SetFont('Times','B',18);
$pdf->Image($bd->getPath(), 0, 0, 120);
$pdf->Image('assets/img/om.jpg', 10, 90, 90);
$pdf->SetTextColor(255,255,255);
$pdf->Text(5,120,$bd->getSlogan());
$pdf->Text(5,130,$bd->getDate());
$pdf->Output();