function UploadFolder (){
   
        let folder = document.getElementById("formFile").files[0];
        let folderSize = document.getElementById("formFile").files[0].size;
        let time = new Date().getTime();
      
        $.ajax({
            url: "../../controller/file-manager.php",
            type: "POST",
            data: {
                upload: "upload",
                folder: folder,
                size: folderSize,
                date: time
            },
            contentType: false,
            processData: false,
            success: function (data,status) {
                console.log(status);
            }
           
        });
    
    
    
}