<?php
include "../core/eventC.php";
include "../entities/event.php";

$event1C=new eventC();

if (isset($_POST['modifier1'])){
    $event=new event($_POST['id_event'],$_POST['nom_event'],$_POST['pourcentage'],$_POST['date_debut'],$_POST['date_fin'],$_POST['id_prod'],$_POST['img_event']);
    $event1C->modifierevent($event);
    header('Location: listeEvent.php');
    }
?>