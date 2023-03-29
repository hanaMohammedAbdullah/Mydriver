function Createfolder(){
   
        let folder = document.getElementById("FolderPath");
        let folderName = folder.value;
        let folderPath = window.location.href;
        var formData = new FormData()
 
        formData.append('createfolder', "createfolder");
        formData.append('folderName', folderName);
        formData.append('Folderpath',folderPath );
        console.log(folderPath);
        console.log(folderName);
        $.ajax({
            url: "../../controller/file-manager.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data,status) {
                console.log(status);
                console.log(data);
            }
           
        });
      
           
    
}
    

