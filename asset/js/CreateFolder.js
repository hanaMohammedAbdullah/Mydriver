function Createfolder(){
   
        let folder = document.getElementById("FolderPath");
        let folderName = folder.value;
        let folderPath = (new URL(document.location)).searchParams;
        folderPath='http://localhost:3000/?'+folderPath;
                var formData = new FormData()
        formData.append('createfolder', "createfolder");
        formData.append('folderName', folderName);
        formData.append('Folderpath',folderPath );
        console.log(folderPath);
        console.log(folderName);
        let folderSize =0;
        let time = new Date("Wed, 27 July 2016 13:30:00");
        formData.append('folder', folderName);
        formData.append('size', folderSize);
        formData.append('dates', time);
        formData.append('upload', "upload");
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
      
        
        location.reload();
           
    
}
    

