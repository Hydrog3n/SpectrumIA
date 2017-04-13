<?php 
error_reporting(E_ERROR | E_PARSE);
include ('ia.php');
if (count($argv) == 2) {
    print_r("Merci de mettre l'url du web service en argument et le nom du joueur");
    exit;
}

$urlWebservice = $argv[1];
$nomJoueur = $argv[2];

$return = file_get_contents($urlWebservice.'/connect/'.$nomJoueur);
$player = null;
$idJoueur = null;
if ($return != "") {
    $player = json_decode($return);
}
print_r($player);

if ($player->idJoueur) {
    $idJoueur = $player->idJoueur;    
}

play($idJoueur, $player->numJoueur, $urlWebservice);


function play($idJoueur, $numJoueur, $urlWebservice) {
    if (!$idJoueur) {
        exit;
    }
    $game = null;
    $infos = null;
    $infos = file_get_contents($urlWebservice."/turn/".$idJoueur);
    if ($infos != "") {
        $game = json_decode($infos);
    }
    
    if (!$game->finPartie && $game->status) {
        $patient = true;
        echo "C'est à mon tour de jouer !! \n";
        $pos = IA::play($game->tableau, $numJoueur, $game->numTour);
        
        echo "J'ai joué la position $pos \n";
        $response = json_decode(file_get_contents($urlWebservice.'/play/'.$pos.'/'.$idJoueur));
        
        sleep(2);
        play($idJoueur, $numJoueur, $urlWebservice);

    } else if (!$game->finPartie) {
        if ($patient) {
            echo "Je patiente pour jouer !! \n";
            $patient = false;
        }
        sleep(2);
        play($idJoueur, $numJoueur, $urlWebservice);
    } 
    print_r($game->detailFinPartie);
}

