<?php

require_once ('model/Clazz.class.php');
require_once ('lib/fpdf/fpdf.php');
Header('Content-type: text/html; charset=UTF-8');

$c = new Clazz(18,300,5,18);

$p = new FPDF('P','pt',array($c->getLongueurxy()*2,$c->getLongueurxy()*2));

$p->AddPage();
for($i = 0;$i<$c->getLongueurxy();$i+=$c->getDiv()){
    $p->Line(0,$i+$c->getLongueurxy(),$i,$c->getLongueurxy()+$c->getLongueurxy());
}
for($i = 0;$i<$c->getLongueurxy();$i+=$c->getDiv()){
    $p->Line($i+$c->getLongueurxy(),0,$c->getLongueurxy()+$c->getLongueurxy(),$i);
}
$j=0;
for($i = $c->getLongueurxy();$i>0;$i-=$c->getDiv()){
    $j += $c->getDiv();
    $p->Line($i,0,0,$j);
}
$j=0;
for($i = $c->getLongueurxy();$i>0;$i-=$c->getDiv()){
    $j += $c->getDiv();
    $p->Line($j+$c->getLongueurxy(),$c->getLongueurxy()*2,$c->getLongueurxy()*2,$i+$c->getLongueurxy());
}
//$j = $c->getLongueurxy();
//for($i = 0;$i<$c->getLongueurxy();$i+=$c->getDiv()){
//    $j -= $c->getDiv();
//    $p->Line($i,0,500,$i);
//}
$p->Output();