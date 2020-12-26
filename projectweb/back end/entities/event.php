<?php

class event{

private $id_event;
private $nom_event;
private $pourcentage;
private $date_debut;
private $date_fin;
private $id_prod;
private $img_event;
function __construct($id_event, $nom_event, $pourcentage, $date_debut,$date_fin,$id_prod,$img_event) {

     $this->id_event=$id_event;
     $this->nom_event=$nom_event;
     $this->pourcentage=$pourcentage;
     $this->date_debut=$date_debut;
     $this->date_fin=$date_fin;
     $this->id_prod=$id_prod;
     $this->img_event=$img_event;
}


function getid_event(){
    return $this->id_event;
}
function getnom_event(){
    return $this->nom_event;
}
function getpourcentage(){
    return $this->pourcentage;
}
function getdate_debut(){
    return $this->date_debut;
}
function getdate_fin(){
    return $this->date_fin;
}
function getid_prod(){
    return $this->id_prod;
}

function getimg_event(){
    return $this->img_event;
}




function setid_event($id_event){
    $this->id_event;
}
function setnom_event($nom_event){
    $this->nom_event;
}
function setpourcentage($pourcentage){
    $this->pourcentage=$pourcentage;
}
function setdate_debut($date_debut){
    $this->date_debut=$date_debut;
}
function setdate_fin($date_fin){
    $this->date_fin=$date_fin;
}
function setid_prod($id_prod){
    $this->id_prod;
}
function setimg_event($img_event){
    $this->img_event;
}





}




?>