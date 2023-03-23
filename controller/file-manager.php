<?php
include('../config/config.php'); 
extract($_POST);
print_r($_POST);

if(isset($_POST['folder']) && isset($_POST['size']) && isset($_POST['dates'])){
    $qry = $db->prepare('INSERT INTO drivers(folder, sizes, modifytime) VALUE (:folder, :sizes, :modifytime)');
    $qry->execute([
        'folder' => $_POST['folder'],
        'sizes' => $_POST['size'],
        'modifytime' => $_POST['dates']
    ]);
}

?>