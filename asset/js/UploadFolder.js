function UploadFolder (){
   
        let folder = document.getElementById("formFile");
        let folderSize = document.getElementById("formFile").size;
        let time = new Date().getTime();
        var formData = new FormData()
        formData.append('folder', folder);
        formData.append('size', folderSize);
        formData.append('dates', time);
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