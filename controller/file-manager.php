
<?php
require('../config/config.php');
if (isset($_POST['upload'])) {
    print_r("upload");
     $folder = $_POST['folder'];
     $size = $_POST['size'];
     $date = $_POST['date'];
       
             $qry = $this->db->prepare('INSERT INTO driver(folder, size, date) VALUE (:folder, :size, :date)');
        $qry->execute([
            'folder' => $_POST['folder'],
            'size' => $_POST['size'],
            'date' => $_POST['date']
        ]);
        }



class driver
{
    private $folder;
    private $size;
    private $date;
    public $db;




    public function __construct()
    {
        try {
            $this->db = configdb::getConnection();
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
        }
       $name= readline("Your name: ");
       echo "Hello, $name!";
        $this->setFolder($_POST['folder']);
        $this->setSize($_POST['size']);
        $this->setDate($_POST['date']);
        if (isset($_POST['upload'])) {
            echo "upload";
             $qry = $this->db->prepare('INSERT INTO drivers(folder, sizes, modifytime) VALUE (:folder, :sizes, :modifytime)');
        $qry->execute([
            'folder' => $this->folder,
            'sizes' => $this->size,
            'modifytime' => $this->date
        ]);
        }
    }


  

    public function getFolder()
    {
        return $this->folder;
    }
    public function getSize()
    {
        return $this->size;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function setFolder($folder)
    {
        $this->folder = $folder;
    }
    public function setSize($size)
    {
        $this->size = $size;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDriver()
    {
        $qry = $this->db->prepare('SELECT * FROM driver');
        $qry->execute();
        $result = $qry->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function addDriver($folder, $size, $date)
    {
        $qry = $this->db->prepare('INSERT INTO driver(folder, size, date) VALUE (:folder, :size, :date)');
        $qry->execute([
            'folder' => $folder,
            'size' => $size,
            'date' => $date
        ]);
    }
    public function updateDriver($folder, $size, $date)
    {
        $qry = $this->db->prepare('UPDATE driver SET folder = :folder, size = :size, date = :date WHERE id = :id');
        $qry->execute([
            'folder' => $folder,
            'size' => $size,
            'date' => $date
        ]);
    }
    public function deleteDriver($id)
    {
        $qry = $this->db->prepare('DELETE FROM driver WHERE id = :id');
        $qry->execute(['id' => $id]);
    }
    public function getDriverById($id)
    {
        $qry = $this->db->prepare('SELECT * FROM driver WHERE id = :id');
        $qry->execute(['id' => $id]);
        $result = $qry->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getDriverByFolder($folder)
    {
        $qry = $this->db->prepare('SELECT * FROM driver WHERE folder = :folder');
        $qry->execute(['folder' => $folder]);
        $result = $qry->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>