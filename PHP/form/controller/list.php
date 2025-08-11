<?php
require_once '../data/etudiant_data.php';
try {
  $list  = getListEtudiant();
  require_once '../view/list.php';
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
}


