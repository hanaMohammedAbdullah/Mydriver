<?php
include('../config/config.php');

if (isset($_POST['upload'])) {

    $qry = $db->prepare('INSERT INTO drivers(names ,folder, sizes, modifytime,FolderPathId) VALUE (:names,:folder, :sizes, :modifytime , :FolderPathId)');
    $qry->execute([
        'names' => $_POST['folderName'],
        'folder' => $_POST['folder'],
        'sizes' => $_POST['size'],
        'modifytime' => $_POST['dates'],
        'FolderPathId' => $_POST['Folderpath'],
    ]);
} elseif (isset($_POST['delete'])) {
    $qry = $db->prepare('DELETE FROM drivers WHERE id = :id');
    $qry->execute([
        'id' => $_POST['ids']
    ]);
} elseif (isset($_POST['view'])) {
    $qry = $db->prepare('SELECT names FROM drivers WHERE id = :id');
    $qry->execute([
        'id' => $_POST['ids']
    ]);

    $Singledata = $qry->fetch(PDO::FETCH_ASSOC);
    $names = $Singledata['names'];
    $names = explode(".", $names);
    $ext= $names[1];
    $names = $names[0];
    setcookie('names', $names, time() + 6, '/');
    setcookie('ext', $ext, time() + 6, '/');
    setcookie('ids', $_POST['ids'], time() + 6, '/');
} elseif (isset($_POST['edit'])) {
    $qry = $db->prepare('UPDATE drivers SET names = :names WHERE id = :id');
    $qry->execute([
        'id' => $_POST['id'],
        'names' => $_POST['names'],
    ]);
} 