function UploadFolder (){
        let folder = document.getElementById("formFile");
        let folderName = document.getElementById("formFile").files[0].name;
        let folderSize = document.getElementById("formFile").files[0].size;
        console.log(folderName);
        let folderPath = (new URL(document.location)).searchParams;
       folderPath='http://localhost:3000/?'+folderPath;
        console.log(folderSize);
        let time = new Date("Wed, 27 July 2016 13:30:00");
        console.log(time);
        var formData = new FormData()
        formData.append('folder', folder);
        formData.append('size', folderSize);
        formData.append('dates', time);
        formData.append('upload', "upload");
        formData.append('folderName', folderName);
        formData.append('Folderpath',folderPath );
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
