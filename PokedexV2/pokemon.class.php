<?php


class Pokemon
{

	private $_Id;
	private $_Name;
	private $_Html;

	
	public function __construct($Id,$Name,$Type0nom,$Type0couleur,$Type1nom=NULL,$Type1couleur=NULL,$HP,$Attack,$Defense,$SpAttack,$SpDefense,$Speed,$Description,$PathImg)
	{
		$this->_Id = $Id;
		$this->_Name = $Name;
		$Html = "<div class='poke-box' id='".$Id;
							
		if($Type1couleur==NULL && $Type1nom==NULL)
		{
			$Html .= "' style='background-color: ".$Type0couleur."'>";
		}
		else
		{
			$Html .= "' style='background-image: -webkit-linear-gradient(30deg, ".$Type0couleur." 50%, ".$Type1couleur." 50%)'>";
		}

		$Html .= "<p class='poke-title poke-bg-border'>#" . $Id . " " . $Name."</p>";
		$Html .= "<img src='images/".$PathImg."' alt='' class='poke-img'>";
		$Html .= "  <p class='poke-info poke-bg-border'>
                        Type : ".$Type0nom;
        if($Type1nom!=null){
            $Html .= ' & '.$Type1nom;
        }
        $Html .=                   "<br>
                        HP : ".$HP."<br>
                        Attack : ".$Attack."<br>
                        Defense : ".$Defense."<br>
                        SpAttack : ".$SpAttack."<br>
                        SpDefense : ".$SpDefense."<br>
                        Speed : ".$Speed."<br>
                    </p>
                </div>";
		$this->_Html = $Html;
	}


	public function PrintHTML()
	{
		return $this->_Html;
	}


}



?>