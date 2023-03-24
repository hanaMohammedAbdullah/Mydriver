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
    $qry = $db->prepare('SELECT names FROM drivers WHERE id = :id');
    $qry->execute([
        'id' => $_POST['ids']
    ]);
    
    $Singledata = $qry->fetchAll(PDO::FETCH_ASSOC);
    $Singledata = $Singledata[0]->names;
    setcookie(
        "namesdata",
         $Singledata,
        time() + (36000 * 5),
    );
    
}

?>