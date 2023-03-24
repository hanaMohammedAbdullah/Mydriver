<?php
include('../config/config.php'); 
extract($_POST);
print_r($_POST);

if(isset($_POST['upload'])){
    
    $qry = $db->prepare('INSERT INTO drivers(names ,folder, sizes, modifytime) VALUE (:names,:folder, :sizes, :modifytime)');
    $qry->execute([
        'names' => $_POST['folderName'],
        'folder' => $_POST['folder'],
        'sizes' => $_POST['size'],
        'modifytime' => $_POST['dates']
    ]);
}elseif(isset($_POST['delete'])){
    $qry = $db->prepare('DELETE FROM drivers WHERE id = :id');
    $qry->execute([
        'id' => $_POST['ids']
    ]);
}
elseif(isset($_POST['view'])){
    $ids = $_POST['ids'];
    setcookie('ids',$ids , time() + (100), "/");
    $qry = $db->prepare('SELECT names FROM drivers WHERE id = :id');
    $qry->execute([
        'id' => $_POST['ids']
    ]);
    
    $Singledata = $qry->fetch(PDO::FETCH_ASSOC);
    $names = $Singledata['names'];
    $names = explode(".",$names);
    $names = $names[0];
    setcookie('names',$names, time() + (100), "/");
    
}elseif(isset($_POST['edit'])){
    $qry = $db->prepare('UPDATE drivers SET names = :names WHERE id = :id');
    $qry->execute([
        'names' => $_POST['folderName'],
        'id' => $_POST['ids']
    ]);
}

?>