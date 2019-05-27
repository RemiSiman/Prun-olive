<?php
function getDatabaseConnexion() {
		try {
		    $user = "root";
			$pass = "";
			$pdo = new PDO('mysql:host=localhost;dbname=prunolive', $user, $pass);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
			
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
 
	

	function getAllcategorie() {
		$con = getDatabaseConnexion();
		$requete = 'SELECT * from categorie';
		$rows = $con->query($requete);
		return $rows;
	}
 
	
	function createCategorie($libelle, $description) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO categorie (libelle, description) 
					VALUES ('$libelle', '$description')";
	    	$con->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
 
	
	function readCategorie($idcategorie) {
		$con = getDatabaseConnexion();
		$requete = "SELECT * from categorie where id = '$id' ";
		$stmt = $con->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
		
	}
 
	
	function updateCategorie($idcategorie, $libelle, $description ) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE categorie set 
						libelle = '$libelle',
						description = '$description',
						where idcategorie = '$idcategorie' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
 
	
	function deleteCategorie($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from categorie where idcategorie = '$idcategorie' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
?>