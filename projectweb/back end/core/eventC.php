<?php
include "C:/wamp/www/back end/config.php";
class eventC
{

    public function afficherEvent()
    {
        $sql = "SELECT * From evenement";
        $db = config::getConnection();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function supprimerEvent($id_event)
    {
        $sql = "DELETE FROM evenement where id_event= :id_event";
        $db = config::getConnection();
        $req = $db->prepare($sql);
        $req->bindValue(':id_event', $id_event);
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function trouverEvent($id_event)
    {
        $sql = "SELECT * from evenement where id_event='" . $id_event . "'";
        $db = config::getConnection();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function trouverEventdate($id_event)
    {
        $sql = "SELECT date_debut from evenement where id_event='" . $id_event . "'";
        $db = config::getConnection();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function rechercherNom($nom_event)
    {
        $sql = "SELECT * from evenement where nom_event like '" . $nom_event . "' ";
        $db = config::getConnection();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function rechercherIdP($id_prod)
    {
        $sql = "SELECT * from evenement where id_prod like '" . $id_prod . "' ";
        $db = config::getConnection();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function modifierevent($event)
    {
        $sql = "UPDATE evenement SET nom_event=:nom_event,pourcentage=:pourcentage,date_debut=:date_debut,date_fin=:date_fin,id_prod=:id_prod,img_event=:img_event WHERE id_event=:id_event";
        $db = config::getConnection();

        try {
            $req = $db->prepare($sql);
            $id_event = $event->getid_event();
            $nom_event = $event->getnom_event();
            $pourcentage = $event->getpourcentage();
            $date_debut = $event->getdate_debut();
            $date_fin = $event->getdate_fin();
            $id_prod = $event->getid_prod();
            $img_event = $event->getimg_event();
            $datas = array(':nom_event' => $nom_event, ':id_event' => $id_event, ':pourcentage' => $pourcentage, ':date_debut' => $date_debut, ':date_fin' => $date_fin, ':id_prod' => $id_prod, ':img_event' => $img_event);
            $req->bindValue(':id_event', $id_event);
            $req->bindValue(':nom_event', $nom_event);
            $req->bindValue(':pourcentage', $pourcentage);
            $req->bindValue(':date_debut', $date_debut);
            $req->bindValue(':date_fin', $date_fin);
            $req->bindValue(':id_prod', $id_prod);
            $req->bindValue(':img_event', $img_event);

            $s = $req->execute();
            // header('Lodate_debution: index.php');
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
            echo " Les datas : ";
            print_r($datas);
        }
    }

    public function ajouterevent($event)
    {

        $sql = "INSERT into evenement (id_event,nom_event,pourcentage,date_debut,date_fin,id_prod,img_event)
                values (:id_event,:nom_event,:pourcentage,:date_debut,:date_fin,:id_prod,:img_event) ";

        $db = config::getConnection();

        try {

            $req = $db->prepare($sql);

            $id_event = $event->getid_event();
            $nom_event = $event->getnom_event();
            $pourcentage = $event->getpourcentage();
            $date_debut = $event->getdate_debut();
            $date_fin = $event->getdate_fin();
            $id_prod = $event->getid_prod();
            $img_event = $event->getimg_event();

            $req->bindValue(':id_event', $id_event);
            $req->bindValue(':nom_event', $nom_event);
            $req->bindValue(':pourcentage', $pourcentage);
            $req->bindValue(':date_debut', $date_debut);
            $req->bindValue(':date_fin', $date_fin);
            $req->bindValue(':id_prod', $id_prod);
            $req->bindValue(':img_event', $img_event);

            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
