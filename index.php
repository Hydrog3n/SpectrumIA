<?php 
include ('ia.php');
if (count($argv) == 1) {
    print_r("Merci de mettre l'url du web service en argument");
    exit;
}

$urlWebservice = $argv[1];

$return = file_get_contents($urlWebservice.'/connect/3PARIS');
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
    print_r($game->status);
    echo ":";
    print_r($game->numTour);
    echo " ";
    if (!$game->finPartie && $game->status) {

        $pos = IA::play($game->tableau, $numJoueur, $game->numTour);
        
        print_r($pos);
        $response = json_decode(file_get_contents($urlWebservice.'/play/'.$pos.'/'.$idJoueur));
        
        sleep(1);
        play($idJoueur, $numJoueur, $urlWebservice);

    } else if (!$game->finPartie) {
        sleep(1);
        play($idJoueur, $numJoueur, $urlWebservice);
    } 
    print_r($game->detailFinPartie);
}

