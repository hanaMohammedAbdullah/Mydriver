<?php
include('../config/config.php'); 

if(isset($_POST['upload'])){
    
    $qry = $db->prepare('INSERT INTO drivers(names ,folder, sizes, modifytime) VALUE (:names,:folder, :sizes, :modifytime)');
    $qry->execute([
        'names' => $_POST['folderName'],
        'folder' => $_POST['folder'],
        'sizes' => $_POST['size'],
        'modifytime' => $_POST['dates']
    ]);
    $qry = $db->prepare('INSERT INTO folders(id ,id_folder,  dirFolder ,nameFolder   ) VALUE (:id ,:id_folder, :dirFolder ,:nameFolder)');
    $qry->execute([
        'id' => $_POST['id'],
        'id_folder' => $_POST['id_folder'],
        'dirFolder' => $_POST['dirFolder'],
        'nameFolder' => $_POST['nameFolder']
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
    
    $Singledata = $qry->fetch(PDO::FETCH_ASSOC);
    $names = $Singledata['names'];
    $names = explode(".",$names);
    $names = $names[0];
    setcookie('names',$names,time()+6,'/');
    setcookie('ids',$_POST['ids'],time()+6,'/');
   

}elseif(isset($_POST['edit'])){
    $qry = $db->prepare('UPDATE drivers SET names = :names WHERE id = :id');
    $qry->execute([
        'id' => $_POST['id'],
        'names' => $_POST['names'],
    ]);
    }elseif(isset($_POST['createfolder'])){
       $qry = $db->prepare('INSERT INTO folders (nameFolder , dirFolder ,id ) VALUE (:nameFolder , :dirFolder , :id )');
         $qry->execute([
            'nameFolder' => $_POST['folderName'],
            'dirFolder' => $_POST['Folderpath'],
            'id' => $_POST['id'],
            
         ]);

        }
    

?>