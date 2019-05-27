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
 
	

	function getAllMarche() {
		$con = getDatabaseConnexion();
		$requete = 'SELECT * from marche';
		$rows = $con->query($requete);
		return $rows;
	}
 
	
	function createMarche($libelle) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO marche (libelle) 
					VALUES ('$libelle')";
	    	$con->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
 
	
	function readMarche($idmarche) {
		$con = getDatabaseConnexion();
		$requete = "SELECT * from marche where idmarche = '$idmarche' ";
		$stmt = $con->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
		
	}
 
	
	function updateMarche($idmarche, $libelle ) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE marche set 
						libelle = '$libelle',
						where idmarche = '$idmarche' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
 
	
	function deleteMarche($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from marche where idmarche = '$idmarche' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
?>