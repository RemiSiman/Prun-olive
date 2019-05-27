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
 
	

	function getAllProduit() {
		$con = getDatabaseConnexion();
		$requete = 'SELECT * from produit';
		$rows = $con->query($requete);
		return $rows;
	}
 
	
	function createProduit($nom_produit, $prix, $description, $idcatego) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO produit (nom_produit, prix, description, idcatego) 
					VALUES ('$nom_produit', '$prix', '$description', '$idcatego')";
	    	$con->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
 
	
	function readProduit($idproduit) {
		$con = getDatabaseConnexion();
		$requete = "SELECT * from produit where idproduit = '$idproduit' ";
		$stmt = $con->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
		
	}
 
	
	function updateProduit($idproduit, $nom_produit, $prix, $description, $idcatego ) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE produit set 
						nom_produit = '$nom_produit',
						prix = '$prix',
						description = '$description',
						idcatego = '$idcatego',
						where idproduit = '$idproduit' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
 
	
	function deleteProduit($idproduit) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from produit where idcproduit = '$idproduit' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
?>