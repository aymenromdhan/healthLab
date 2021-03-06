<?PHP
	include "../config.php";
	require_once '../Model/Utilisateur.php';

	class UtilisateurC {
		
		function ajouterUtilisateur($Utilisateur){
			$sql="INSERT INTO Utilisateur (nom, prenom, email, login, password) 
			VALUES (:nom,:prenom,:email, :login, :password)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $Utilisateur->getNom(),
					'prenom' => $Utilisateur->getPrenom(),
					'email' => $Utilisateur->getEmail(),
					'login' => $Utilisateur->getLogin(),
					'password' => $Utilisateur->getPassword()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

	
		
		function afficherUtilisateurs(){
			
			$sql="SELECT * FROM users";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerUtilisateur($id){
			$sql="DELETE FROM users WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierUtilisateur($Utilisateur, $id){
			try {
				echo 'hi';
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE users SET 
						prenom = :prenom, 
						nom = :nom,
						date = :date,
						telephone = :telephone
						ville = :ville


					WHERE id = :id'
				);
				echo($Utilisateur['nom']);
				$query->execute([
					'nom' => $Utilisateur['nom'],
					'prenom' => $Utilisateur['prenom'],
					'date' => $Utilisateur['date'],
					'telephone' => $Utilisateur['telephone'],
					'ville' => $Utilisateur['ville'],
					'id' => $id

				]);
				echo($query);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererUtilisateur($id){
			$sql="SELECT * from users where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererUtilisateur1($id){
			$sql="SELECT * from users where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>