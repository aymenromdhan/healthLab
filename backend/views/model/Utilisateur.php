<?PHP
	class Utilisateur{
	
		
		
		function __construct(string $nom, string $prenom, string $email, string $role, string $password, string $tel, string $date, string $sexe, string $ville ){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->email=$email;
			$this->role=$role;
			$this->password=$password;
			$this->date=$date;
			$this->ville=$ville;
			$this->sexe=$sexe;
			$this->telephone=$tel;









		}
		
		function getId(): int{
			return $this->id;
		}
		function getNom(): string{
			return $this->nom;
		}
		function getPrenom(): string{
			return $this->prenom;
		}
		function getVille(): string{
			return $this->ville;
		}
		function getEmail(): string{
			return $this->email;
		}
		function getPassword(): string{
			return $this->password;
		}
		function getTelephone(): string{
			return $this->telephone;
		}
		function getDate(): string{
			return $this->date;
		}
		function getSexe(): string{
			return $this->sexe;
		}

		function getRole(): string{
			return $this->role;
		}

		function setNom(string $nom): void{
			$this->nom=$nom;
		}
		function setPrenom(string $prenom): void{
			$this->prenom;
		}
		function setRole(string $role): void{
			$this->role=$role;
		}
		function setEmail(string $email): void{
			$this->email=$email;
		}
		function setPassword(string $password): void{
			$this->password=$password;
		}

		function setTelephone(string $telephone): void{
			$this->telephone=$telephone;
		}
		function setDate(string $date): void{
			$this->date=$date;
		}
		function setSexe(string $sexe): void{
			$this->sexe=$sexe;
		}
		function setVille(string $ville): void{
			$this->ville=$ville;
		}
	}
?>