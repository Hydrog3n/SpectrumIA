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
	public $adversaire;
	
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

		//-------------------------------------------------------------------------------------//
		//--------------------------------FAIRE DES TENAILLE-----------------------------------//
		//-------------------------------------------------------------------------------------//

		//LEFT TENAILLE
		$lt_successifs = 0;
		if($this->pos_x > 0 
			&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->adversaire)
		{
			$lt_successifs += 1;	// 1
			if($this->pos_x > 0 
			&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->adversaire
			&& $this->grid[$this->pos_y][$this->pos_x-2] == $this->adversaire)
			{
				$lt_successifs += 1;	// 2
				if($this->pos_y > 0 
				&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->adversaire
				&& $this->grid[$this->pos_y][$this->pos_x-2] == $this->adversaire
				&& $this->grid[$this->pos_y][$this->pos_x-3] == $this->joueur)
				{
					$lt_successifs += 1;	// 3
				}
			}
		}

		//RIGHT TENAILLE
		$rt_successifs = 0;
		if($this->pos_x < 18 
			&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->adversaire)
		{
			$rt_successifs += 1;	// 1
			if($this->pos_x < 18 
			&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->adversaire
			&& $this->grid[$this->pos_y][$this->pos_x+2] == $this->adversaire)
			{
				$rt_successifs += 1;	// 2
				if($this->pos_y < 18  
				&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->adversaire
				&& $this->grid[$this->pos_y][$this->pos_x+2] == $this->adversaire
				&& $this->grid[$this->pos_y][$this->pos_x+3] == $this->joueur)
				{
					$rt_successifs += 1;	// 3
				}
			}
		}

		//UP TENAILLE
		$ut_successifs = 0;
		if($this->pos_y > 0 
			&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->adversaire)
		{
			$ut_successifs += 1;	// 1
			if($this->pos_y > 0 
			&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->adversaire
			&& $this->grid[$this->pos_y-2][$this->pos_x] == $this->adversaire)
			{
				$ut_successifs += 1;	// 2
				if($this->pos_y > 0  
				&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->adversaire
				&& $this->grid[$this->pos_y-2][$this->pos_x] == $this->adversaire
				&& $this->grid[$this->pos_y-3][$this->pos_x] == $this->joueur)
				{
					$ut_successifs += 1;	// 3
				}
			}
		}

		//DOWN TENAILLE
		$dt_successifs = 0;
		if($this->pos_y < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->adversaire)
		{
			$dt_successifs += 1;	// 1
			if($this->pos_y < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->adversaire
			&& $this->grid[$this->pos_y+2][$this->pos_x] == $this->adversaire)
			{
				$dt_successifs += 1;	// 2
				if($this->pos_y < 18  
				&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->adversaire
				&& $this->grid[$this->pos_y+2][$this->pos_x] == $this->adversaire
				&& $this->grid[$this->pos_y+3][$this->pos_x] == $this->joueur)
				{
					$dt_successifs += 1;	// 3
				}
			}
		}

		//UP LEFT TENAILLE
		$ult_successifs = 0;
		if($this->pos_y > 0 && $this->pos_x > 0 
			&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->adversaire)
		{
			$ult_successifs += 1;	// 1
			if($this->pos_y > 0 && $this->pos_x > 0 
			&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->adversaire
			&& $this->grid[$this->pos_y+2][$this->pos_x-2] == $this->adversaire)
			{
				$ult_successifs += 1;	// 2
				if($this->pos_y > 0 && $this->pos_x > 0  
				&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->adversaire
				&& $this->grid[$this->pos_y+2][$this->pos_x-2] == $this->adversaire
				&& $this->grid[$this->pos_y+3][$this->pos_x-3] == $this->joueur)
				{
					$ult_successifs += 1;	// 3
				}
			}
		}

		//DOWN RIGHT TENAILLE
		$drt_successifs = 0;
		if($this->pos_y < 18 && $this->pos_x < 18 
			&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->adversaire)
		{
			$drt_successifs += 1;	// 1
			if($this->pos_y < 18 && $this->pos_x < 18
			&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->adversaire
			&& $this->grid[$this->pos_y-2][$this->pos_x+2] == $this->adversaire)
			{
				$drt_successifs += 1;	// 2
				if($this->pos_y < 18 && $this->pos_x < 18 
				&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->adversaire
				&& $this->grid[$this->pos_y-2][$this->pos_x+2] == $this->adversaire
				&& $this->grid[$this->pos_y-3][$this->pos_x+3] == $this->joueur)
				{
					$drt_successifs += 1;	// 3
				}
			}
		}

		//UP RIGHT TENAILLE
		$urt_successifs = 0;
		if($this->pos_y > 0 && $this->pos_x < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->adversaire)
		{
			$urt_successifs += 1;	// 1
			if($this->pos_y > 0 && $this->pos_x < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->adversaire
			&& $this->grid[$this->pos_y+2][$this->pos_x+2] == $this->adversaire)
			{
				$urt_successifs += 1;	// 2
				if($this->pos_y > 0 && $this->pos_x < 18  
				&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->adversaire
				&& $this->grid[$this->pos_y+2][$this->pos_x+2] == $this->adversaire
				&& $this->grid[$this->pos_y+3][$this->pos_x+3] == $this->joueur)
				{
					$urt_successifs += 1;	// 3
				}
			}
		}

		//DOWN LEFT TENAILLE
		$dlt_successifs = 0;
		if($this->pos_y < 18 && $this->pos_x > 0 
			&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->adversaire)
		{
			$dlt_successifs += 1;	// 1
			if($this->pos_y < 18 && $this->pos_x > 0
			&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->adversaire
			&& $this->grid[$this->pos_y-2][$this->pos_x-2] == $this->adversaire)
			{
				$dlt_successifs += 1;	// 2
				if($this->pos_y < 18 && $this->pos_x > 0 
				&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->adversaire
				&& $this->grid[$this->pos_y-2][$this->pos_x-2] == $this->adversaire
				&& $this->grid[$this->pos_y-3][$this->pos_x-3] == $this->joueur)
				{
					$dlt_successifs += 1;	// 3
				}
			}
		}


		$left_tenaille_poids = 0;
		if ($lt_successifs == 3){
				$left_tenaille_poids = 0.4;
		}


		$right_tenaille_poids = 0;
		if ($rt_successifs == 3){
				$right_tenaille_poids = 0.4;
		}


		$up_tenaille_poids = 0;
		if ($ut_successifs == 3){
				$up_tenaille_poids = 0.4;
		}

		
		$down_tenaille_poids = 0;
		if ($dt_successifs == 3){
				$down_tenaille_poids = 0.4;
		}

		$up_left_tenaille_poids = 0;
		if ($ult_successifs == 3){
				$up_left_tenaille_poids = 0.4;
		}


		$down_right_tenaille_poids = 0;
		if ($drt_successifs == 3){
				$down_right_tenaille_poids = 0.4;
		}



		$up_right_tenaille_poids = 0;
		if ($urt_successifs == 3){
				$up_right_tenaille_poids = 0.4;
		}

		
		$down_left_tenaille_poids = 0;
		if ($dlt_successifs == 3){
				$down_left_tenaille_poids = 0.4;
		}

		//-------------------------------------------------------------------------------------//
		//-------------------------------------------------------------------------------------//
		//-------------------------------------------------------------------------------------//


		//-------------------------------------------------------------------------------------//
		//--------------------------------STOP LES TENAILLE-----------------------------------//
		//-------------------------------------------------------------------------------------//

		//LEFT TENAILLE
		$slt_successifs = 0;
		if($this->pos_x > 0 
			&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->joueur)
		{
			$slt_successifs += 1;	// 1
			if($this->pos_x > 0 
			&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->joueur
			&& $this->grid[$this->pos_y][$this->pos_x-2] == $this->joueur)
			{
				$slt_successifs += 1;	// 2
				if($this->pos_y > 0 
				&& $this->grid[$this->pos_y][$this->pos_x-1] == $this->joueur
				&& $this->grid[$this->pos_y][$this->pos_x-2] == $this->joueur
				&& $this->grid[$this->pos_y][$this->pos_x-3] == $this->adversaire)
				{
					$slt_successifs += 1;	// 3
				}
			}
		}

		//RIGHT TENAILLE
		$srt_successifs = 0;
		if($this->pos_x < 18 
			&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->joueur)
		{
			$srt_successifs += 1;	// 1
			if($this->pos_x < 18 
			&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->joueur
			&& $this->grid[$this->pos_y][$this->pos_x+2] == $this->joueur)
			{
				$srt_successifs += 1;	// 2
				if($this->pos_y < 18  
				&& $this->grid[$this->pos_y][$this->pos_x+1] == $this->joueur
				&& $this->grid[$this->pos_y][$this->pos_x+2] == $this->joueur
				&& $this->grid[$this->pos_y][$this->pos_x+3] == $this->adversaire)
				{
					$srt_successifs += 1;	// 3
				}
			}
		}

		//UP TENAILLE
		$sut_successifs = 0;
		if($this->pos_y > 0 
			&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->joueur)
		{
			$sut_successifs += 1;	// 1
			if($this->pos_y > 0 
			&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->joueur
			&& $this->grid[$this->pos_y-2][$this->pos_x] == $this->joueur)
			{
				$sut_successifs += 1;	// 2
				if($this->pos_y > 0  
				&& $this->grid[$this->pos_y-1][$this->pos_x] == $this->joueur
				&& $this->grid[$this->pos_y-2][$this->pos_x] == $this->joueur
				&& $this->grid[$this->pos_y-3][$this->pos_x] == $this->adversaire)
				{
					$sut_successifs += 1;	// 3
				}
			}
		}

		//DOWN TENAILLE
		$sdt_successifs = 0;
		if($this->pos_y < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->joueur)
		{
			$sdt_successifs += 1;	// 1
			if($this->pos_y < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->joueur
			&& $this->grid[$this->pos_y+2][$this->pos_x] == $this->joueur)
			{
				$sdt_successifs += 1;	// 2
				if($this->pos_y < 18  
				&& $this->grid[$this->pos_y+1][$this->pos_x] == $this->joueur
				&& $this->grid[$this->pos_y+2][$this->pos_x] == $this->joueur
				&& $this->grid[$this->pos_y+3][$this->pos_x] == $this->adversaire)
				{
					$sdt_successifs += 1;	// 3
				}
			}
		}

		//UP LEFT TENAILLE
		$sult_successifs = 0;
		if($this->pos_y > 0 && $this->pos_x > 0 
			&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->joueur)
		{
			$sult_successifs += 1;	// 1
			if($this->pos_y > 0 && $this->pos_x > 0 
			&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->joueur
			&& $this->grid[$this->pos_y+2][$this->pos_x-2] == $this->joueur)
			{
				$sult_successifs += 1;	// 2
				if($this->pos_y > 0 && $this->pos_x > 0  
				&& $this->grid[$this->pos_y+1][$this->pos_x-1] == $this->joueur
				&& $this->grid[$this->pos_y+2][$this->pos_x-2] == $this->joueur
				&& $this->grid[$this->pos_y+3][$this->pos_x-3] == $this->adversaire)
				{
					$sult_successifs += 1;	// 3
				}
			}
		}

		//DOWN RIGHT TENAILLE
		$sdrt_successifs = 0;
		if($this->pos_y < 18 && $this->pos_x < 18 
			&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->joueur)
		{
			$sdrt_successifs += 1;	// 1
			if($this->pos_y < 18 && $this->pos_x < 18
			&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->joueur
			&& $this->grid[$this->pos_y-2][$this->pos_x+2] == $this->joueur)
			{
				$sdrt_successifs += 1;	// 2
				if($this->pos_y < 18 && $this->pos_x < 18 
				&& $this->grid[$this->pos_y-1][$this->pos_x+1] == $this->joueur
				&& $this->grid[$this->pos_y-2][$this->pos_x+2] == $this->joueur
				&& $this->grid[$this->pos_y-3][$this->pos_x+3] == $this->adversaire)
				{
					$sdrt_successifs += 1;	// 3
				}
			}
		}

		//UP RIGHT TENAILLE
		$surt_successifs = 0;
		if($this->pos_y > 0 && $this->pos_x < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->joueur)
		{
			$surt_successifs += 1;	// 1
			if($this->pos_y > 0 && $this->pos_x < 18 
			&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->joueur
			&& $this->grid[$this->pos_y+2][$this->pos_x+2] == $this->joueur)
			{
				$surt_successifs += 1;	// 2
				if($this->pos_y > 0 && $this->pos_x < 18  
				&& $this->grid[$this->pos_y+1][$this->pos_x+1] == $this->joueur
				&& $this->grid[$this->pos_y+2][$this->pos_x+2] == $this->joueur
				&& $this->grid[$this->pos_y+3][$this->pos_x+3] == $this->adversaire)
				{
					$surt_successifs += 1;	// 3
				}
			}
		}

		//DOWN LEFT TENAILLE
		$sdlt_successifs = 0;
		if($this->pos_y < 18 && $this->pos_x > 0 
			&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->joueur)
		{
			$sdlt_successifs += 1;	// 1
			if($this->pos_y < 18 && $this->pos_x > 0
			&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->joueur
			&& $this->grid[$this->pos_y-2][$this->pos_x-2] == $this->joueur)
			{
				$sdlt_successifs += 1;	// 2
				if($this->pos_y < 18 && $this->pos_x > 0 
				&& $this->grid[$this->pos_y-1][$this->pos_x-1] == $this->joueur
				&& $this->grid[$this->pos_y-2][$this->pos_x-2] == $this->joueur
				&& $this->grid[$this->pos_y-3][$this->pos_x-3] == $this->adversaire)
				{
					$sdlt_successifs += 1;	// 3
				}
			}
		}


		$sleft_tenaille_poids = 0;
		if ($slt_successifs == 3){
				$sleft_tenaille_poids = 0.6;
		}


		$sright_tenaille_poids = 0;
		if ($srt_successifs == 3){
				$sright_tenaille_poids = 0.6;
		}


		$sup_tenaille_poids = 0;
		if ($sut_successifs == 3){
				$sup_tenaille_poids = 0.6;
		}

		
		$sdown_tenaille_poids = 0;
		if ($sdt_successifs == 3){
				$sdown_tenaille_poids = 0.6;
		}

		$sup_left_tenaille_poids = 0;
		if ($sult_successifs == 3){
				$sup_left_tenaille_poids = 0.6;
		}


		$sdown_right_tenaille_poids = 0;
		if ($sdrt_successifs == 3){
				$sdown_right_tenaille_poids = 0.6;
		}



		$sup_right_tenaille_poids = 0;
		if ($surt_successifs == 3){
				$sup_right_tenaille_poids = 0.6;
		}

		
		$sdown_left_tenaille_poids = 0;
		if ($sdlt_successifs == 3){
				$sdown_left_tenaille_poids = 0.6;
		}

		//-------------------------------------------------------------------------------------//
		//-------------------------------------------------------------------------------------//
		//-------------------------------------------------------------------------------------//

		

		$poids = [$horizontal_poids, $vertical_poids, $slash_poids, $back_slash_poids, $left_tenaille_poids, $right_tenaille_poids, $up_tenaille_poids, $down_tenaille_poids, $up_left_tenaille_poids, $down_right_tenaille_poids, $up_right_tenaille_poids, $down_left_tenaille_poids, $sleft_tenaille_poids, $sright_tenaille_poids, $sup_tenaille_poids, $sdown_tenaille_poids, $sup_left_tenaille_poids, $sdown_right_tenaille_poids, $sup_right_tenaille_poids, $sdown_left_tenaille_poids];
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
	public $adversaire;

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
								'joueur' => $this->joueur,
								'adversaire' => $this->adversaire
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
							'joueur' => $this->joueur,
							'adversaire' => $this->adversaire
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
			$numAdversaire = ($numJoueur == 1) ? 2 : 1;
			$coups_ia = new Population(['grid' => $grid,'joueur' => $numJoueur, 'adversaire' => $numAdversaire]);
			$coups_ia->init_population($numTour);
			$coups_ia->selection();
			//COUPS ADVERSAIRE
			$coups_adv = new Population(['grid' => $grid, 'joueur' => $numAdversaire, 'adversaire' => $numJoueur]);
			$coups_adv->init_population($numTour);
			$coups_adv->selection();

			//ATTAQUE OU DEFENSE
			if($coups_ia->master_individu->poids > $coups_adv->master_individu->poids){
				$resultat = $coups_ia->master_individu->pos_x.'/'.$coups_ia->master_individu->pos_y;
			}
			else{
				$resultat = $coups_adv->master_individu->pos_x.'/'.$coups_adv->master_individu->pos_y;
			}
			return $resultat;
		} else {
			$pos = Array();
			if ($grid[8][6] == 0) {
				$pos[] = "8/6";
			}
			if ($grid[9][6] == 0) {
				$pos[] = "9/6";
			}
			if ($grid[10][7] == 0) {
				$pos[] = "10/6";
			}
			if ($grid[8][12] == 0) {
				$pos[] = "8/12";
			} 
			if ($grid[9][12] == 0) {
				$pos[] = "9/12";
			}
			if ($grid[10][12] == 0) {
				$pos[] = "10/12";
			}
			if ($grid[6][8] == 0) {
				$pos[] = "6/8";
			}
			if ($grid[6][9] == 0) {
				$pos[] = "6/9";
			}
			if ($grid[6][10] == 0) {
				$pos[] = "6/10";
			}
			if ($grid[12][8] == 0) {
				$pos[] = "12/8";
			}
			if ($grid[12][9] == 0) {
				$pos[] = "12/9";
			}
			if ($grid[12][10] == 0) {
				$pos[] = "12/10";
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