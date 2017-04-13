<?php 
header('Access-Control-Allow-Origin: *');
class Individu{
	//VARS
	public $pos_x;
	public $pos_y;
	public $is_random;
	public $poids;
	public $grid;
	public $joueur;
	
	//CONSTRUCT
	public function __construct($rows){
		foreach($rows as $key => $value){
			$this->$key = $value;
		}
		if($this->is_random){
			$this->init();
		}
	}


	//METHODS
	public function init(){
		$is_free = false;
		while(!$is_free){
			$this->pos_x = rand(0,18);
			$this->pos_y = rand(0,18);
			if($this->grid[$this->pos_y][$this->pos_x] == "") break;
			
		}
	} 

	public function evaluation()
	{
		//LEFT
		$left_successifs = 0;
		if($this->pos_x > 0 
			&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->joueur)
		{
			$left_successifs += 1;	// 1
			if($this->pos_x > 0 
			&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->joueur
			&& $this->grid[$this->pos_y][$this->pos_x-2] == $this->joueur)
			{
				$left_successifs += 1;	// 2
				if($this->pos_y > 0 
				&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->joueur
				&& $this->grid[$this->pos_y][$this->pos_x-2] == $this->joueur
				&& $this->grid[$this->pos_y][$this->pos_x-3] == $this->joueur)
				{
					$left_successifs += 1;	// 3
					if($this->pos_y > 0 
					&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->joueur
					&& $this->grid[$this->pos_y][$this->pos_x-2] == $this->joueur
					&& $this->grid[$this->pos_y][$this->pos_x-3] == $this->joueur
					&& $this->grid[$this->pos_y][$this->pos_x-4] == $this->joueur)
					{
						$left_successifs += 1;	// 4
					}
				}
			}
				
		}
		
		//RIGHT
		$right_successifs = 0;
		if($this->pos_x < 18 
			&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->joueur)
		{
			$right_successifs += 1;	// 1
			if($this->pos_x < 18 
			&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->joueur
			&& $this->grid[$this->pos_y][$this->pos_x+2] == $this->joueur)
			{
				$right_successifs += 1;	// 2
				if($this->pos_y < 18  
				&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->joueur
				&& $this->grid[$this->pos_y][$this->pos_x+2] == $this->joueur
				&& $this->grid[$this->pos_y][$this->pos_x+3] == $this->joueur)
				{
					$right_successifs += 1;	// 3
					if($this->pos_y < 18 
					&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->joueur
					&& $this->grid[$this->pos_y][$this->pos_x+2] == $this->joueur
					&& $this->grid[$this->pos_y][$this->pos_x+3] == $this->joueur
					&& $this->grid[$this->pos_y][$this->pos_x+4] == $this->joueur)
					{
						$right_successifs += 1;	// 4
					}
				}
				
			}
		
		}
		
		//UP
		$up_successifs = 0;
		if($this->pos_y > 0 
			&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->joueur)
		{
			$up_successifs += 1;	// 1
			if($this->pos_y > 0 
			&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->joueur
			&& $this->grid[$this->pos_y-2][$this->pos_x] == $this->joueur)
			{
				$up_successifs += 1;	// 2
				if($this->pos_y > 0  
				&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->joueur
				&& $this->grid[$this->pos_y-2][$this->pos_x] == $this->joueur
				&& $this->grid[$this->pos_y-3][$this->pos_x] == $this->joueur)
				{
					$up_successifs += 1;	// 3
					if($this->pos_y > 0  
					&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->joueur
					&& $this->grid[$this->pos_y-2][$this->pos_x] == $this->joueur
					&& $this->grid[$this->pos_y-3][$this->pos_x] == $this->joueur
					&& $this->grid[$this->pos_y-4][$this->pos_x] == $this->joueur)
					{
						$up_successifs += 1;	// 4
					}
				}
				
			}
		
		}

		//DOWN
		$down_successifs = 0;
		if($this->pos_y < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->joueur)
		{
			$down_successifs += 1;	// 1
			if($this->pos_y < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->joueur
			&& $this->grid[$this->pos_y+2][$this->pos_x] == $this->joueur)
			{
				$down_successifs += 1;	// 2
				if($this->pos_y < 18  
				&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->joueur
				&& $this->grid[$this->pos_y+2][$this->pos_x] == $this->joueur
				&& $this->grid[$this->pos_y+3][$this->pos_x] == $this->joueur)
				{
					$down_successifs += 1;	// 3
					if($this->pos_y < 18  
					&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->joueur
					&& $this->grid[$this->pos_y+2][$this->pos_x] == $this->joueur
					&& $this->grid[$this->pos_y+3][$this->pos_x] == $this->joueur
					&& $this->grid[$this->pos_y+4][$this->pos_x] == $this->joueur)
					{
						$down_successifs += 1;	// 4
					}
				}	
			}
		}

		//UP LEFT
		$ul_successifs = 0;
		if($this->pos_y > 0 && $this->pos_x > 0 
			&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->joueur)
		{
			$ul_successifs += 1;	// 1
			if($this->pos_y > 0 && $this->pos_x > 0 
			&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->joueur
			&& $this->grid[$this->pos_y+2][$this->pos_x-2] == $this->joueur)
			{
				$ul_successifs += 1;	// 2
				if($this->pos_y > 0 && $this->pos_x > 0  
				&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->joueur
				&& $this->grid[$this->pos_y+2][$this->pos_x-2] == $this->joueur
				&& $this->grid[$this->pos_y+3][$this->pos_x-3] == $this->joueur)
				{
					$ul_successifs += 1;	// 3
					if($this->pos_y > 0 && $this->pos_x > 0  
					&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->joueur
					&& $this->grid[$this->pos_y+2][$this->pos_x-2] == $this->joueur
					&& $this->grid[$this->pos_y+3][$this->pos_x-3] == $this->joueur
					&& $this->grid[$this->pos_y+4][$this->pos_x-4] == $this->joueur)
					{
						$ul_successifs += 1;	// 4
					}
				}	
			}
		}

		//DOWN RIGHT
		$dr_successifs = 0;
		if($this->pos_y < 18 && $this->pos_x < 18 
			&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->joueur)
		{
			$dr_successifs += 1;	// 1
			if($this->pos_y < 18 && $this->pos_x < 18
			&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->joueur
			&& $this->grid[$this->pos_y-2][$this->pos_x+2] == $this->joueur)
			{
				$dr_successifs += 1;	// 2
				if($this->pos_y < 18 && $this->pos_x < 18 
				&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->joueur
				&& $this->grid[$this->pos_y-2][$this->pos_x+2] == $this->joueur
				&& $this->grid[$this->pos_y-3][$this->pos_x+3] == $this->joueur)
				{
					$dr_successifs += 1;	// 3
					if($this->pos_y < 18 && $this->pos_x < 18
					&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->joueur
					&& $this->grid[$this->pos_y-2][$this->pos_x+2] == $this->joueur
					&& $this->grid[$this->pos_y-3][$this->pos_x+3] == $this->joueur
					&& $this->grid[$this->pos_y-4][$this->pos_x+4] == $this->joueur)
					{
						$dr_successifs += 1;	// 4
					}
				}	
			}
		}


		//UP RIGHT
		$ur_successifs = 0;
		if($this->pos_y > 0 && $this->pos_x < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->joueur)
		{
			$ur_successifs += 1;	// 1
			if($this->pos_y > 0 && $this->pos_x < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->joueur
			&& $this->grid[$this->pos_y+2][$this->pos_x+2] == $this->joueur)
			{
				$ur_successifs += 1;	// 2
				if($this->pos_y > 0 && $this->pos_x < 18  
				&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->joueur
				&& $this->grid[$this->pos_y+2][$this->pos_x+2] == $this->joueur
				&& $this->grid[$this->pos_y+3][$this->pos_x+3] == $this->joueur)
				{
					$ur_successifs += 1;	// 3
					if($this->pos_y > 0 && $this->pos_x < 18  
					&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->joueur
					&& $this->grid[$this->pos_y+2][$this->pos_x+2] == $this->joueur
					&& $this->grid[$this->pos_y+3][$this->pos_x+3] == $this->joueur
					&& $this->grid[$this->pos_y+4][$this->pos_x+4] == $this->joueur)
					{
						$ur_successifs += 1;	// 4
					}
				}	
			}
		}


		//DOWN LEFT
		$dl_successifs = 0;
		if($this->pos_y < 18 && $this->pos_x > 0 
			&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->joueur)
		{
			$dl_successifs += 1;	// 1
			if($this->pos_y < 18 && $this->pos_x > 0
			&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->joueur
			&& $this->grid[$this->pos_y-2][$this->pos_x-2] == $this->joueur)
			{
				$dl_successifs += 1;	// 2
				if($this->pos_y < 18 && $this->pos_x > 0 
				&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->joueur
				&& $this->grid[$this->pos_y-2][$this->pos_x-2] == $this->joueur
				&& $this->grid[$this->pos_y-3][$this->pos_x-3] == $this->joueur)
				{
					$dl_successifs += 1;	// 3
					if($this->pos_y < 18 && $this->pos_x > 0
					&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->joueur
					&& $this->grid[$this->pos_y-2][$this->pos_x-2] == $this->joueur
					&& $this->grid[$this->pos_y-3][$this->pos_x-3] == $this->joueur
					&& $this->grid[$this->pos_y-4][$this->pos_x-4] == $this->joueur)
					{
						$dl_successifs += 1;	// 4
					}
				}	
			}
		}



		$back_slash_successifs = $ul_successifs + $dr_successifs;
		$back_slash_poids = 0;
		switch ($back_slash_successifs) {
			case 0:
				$back_slash_poids = 0;
				break;
			case 1:
				$back_slash_poids = 0.2;
				break;
			case 2:
				$back_slash_poids = 0.5;
				break;
			case 3:
				$back_slash_poids = 0.8;
				break;
			case 4:
				$back_slash_poids = 1;
				break;
		}


		$slash_successifs = $ur_successifs + $dl_successifs;
		$slash_poids = 0;
		switch ($slash_successifs) {
			case 0:
				$slash_poids = 0;
				break;
			case 1:
				$slash_poids = 0.2;
				break;
			case 2:
				$slash_poids = 0.5;
				break;
			case 3:
				$slash_poids = 0.8;
				break;
			case 4:
				$slash_poids = 1;
				break;
		}




		$horizontal_poids = 0;
		$horizontal_successifs = $left_successifs + $right_successifs;
		switch ($horizontal_successifs) 
		{
			case 0:
				$horizontal_poids = 0;
				break;
			case 1:
				$horizontal_poids = 0.2;
				break;
			case 2:
				$horizontal_poids = 0.5;
				break;
			case 3:
				$horizontal_poids = 0.8;
				break;
			case 4:
				$horizontal_poids = 1;
				break;
		}

		
		$vertical_successifs = $up_successifs + $down_successifs;
		$vertical_poids = 0;
		switch ($vertical_successifs) 
		{
			case 0:
				$vertical_poids = 0;
				break;
			case 1:
				$vertical_poids = 0.2;
				break;
			case 2:
				$vertical_poids = 0.5;
				break;
			case 3:
				$vertical_poids = 0.8;
				break;
			case 4:
				$vertical_poids = 1;
				break;
		}


		

		$poids = [$horizontal_poids, $vertical_poids, $slash_poids, $back_slash_poids];
		$this->poids = max($poids);
	}

	public function log(){
		echo $this->pos_y.':'.$this->pos_x.' -> '.$this->poids.'<br />';
	}

}

function cmp($a, $b){
    if ($a->poids == $b->poids) {
        return 0;
    }
    return ($a->poids < $b->poids) ? 1 : -1;
}

function getNbFreeCases($grid){
	$nb=0;
	foreach($grid as $row){
		foreach($row as $col){
			if($col == 0) $nb++;
		}
	}
	return $nb;
}


class Population{
	//VARS
	public $nb_individus;
	public $individus = [];
	public $grid;
	public $master_individu = null;
	public $joueur;

	//CONSTRUCT
	public function __construct($rows){
		foreach($rows as $key => $value){
			$this->$key = $value;
		}
		$this->nb_individus = getNbFreeCases($this->grid);
	}

	//METHODS
	public function init_population($numTour){
		for($i=0; $i<19;$i++){
			for($y=0; $y<19; $y++){
				if ($numTour == 2) {
					if (($i < 7 || $i > 11) && ($y < 7 || $y > 11)) {
						if($this->grid[$i][$y] == 0)
						{
							array_push(
							$this->individus, 
							new Individu([
								'is_random' => false,
								'pos_x' => $y,
								'pos_y' => $i,
								'grid' => $this->grid,
								'joueur' => $this->joueur
								])
							);	
						}
					}
				} else {
					if($this->grid[$i][$y] == 0)
					{
						array_push(
						$this->individus, 
						new Individu([
							'is_random' => false,
							'pos_x' => $y,
							'pos_y' => $i,
							'grid' => $this->grid,
							'joueur' => $this->joueur
							])
						);	
					}
				}
			}
		}
		$this->master_individu = $this->individus[0];
	}

	public function selection(){
		
		foreach($this->individus as $i){
			$i->evaluation();
		}
		usort($this->individus,"cmp");
		$this->compare($this->individus[0]);
	}

	public function compare($individu){
		if($this->master_individu->poids < $individu->poids){
			$this->master_individu = $individu;
		}
	}
}



class IA{

	public static function play($grid, $numJoueur, $numTour){
		//COUPS IA
		if ($numTour != 2) {
			$coups_ia = new Population(['grid' => $grid,'joueur' => $numJoueur]);
			$coups_ia->init_population($numTour);
			$coups_ia->selection();
			$numAdversaire = ($numJoueur == 1) ? 2 : 1;
			//COUPS ADVERSAIRE
			$coups_adv = new Population(['grid' => $grid, 'joueur' => $numAdversaire]);
			$coups_adv->init_population($numTour);
			$coups_adv->selection();

			//ATTAQUE OU DEFENSE
			if($coups_ia->master_individu->poids >= $coups_adv->master_individu->poids){
				$resultat = $coups_ia->master_individu->pos_x.'/'.$coups_ia->master_individu->pos_y;
			}
			else{
				$resultat = $coups_adv->master_individu->pos_x.'/'.$coups_adv->master_individu->pos_y;
			}
			return $resultat;
		} else {
			$pos = Array();
			if ($grid[9][6] == 0) {
				$pos[] = "9/6";
			} 
			if ($grid[9][12] == 0) {
				$pos[] = "9/12";
			}
			if ($grid[6][9] == 0) {
				$pos[] = "6/9";
			}
			if ($grid[12][9] == 0) {
				$pos[] = "12/9";
			}
			$i = rand(0, count($pos)-1);
			return $pos[$i];
		}
	}
}

// Lancer le fichier avec l'url du serveur de jeu

// GET /connect/1234PARIS

// GET /turn/:idJoueur
// si jouer alor
	// algo
	// Jouer /play/;x/:y/idJouer
	// si erreur réponse 
	// algo 
	// jouer 

// si non re GET /turn/:idJoueur
// si non si partie fini 

?>
