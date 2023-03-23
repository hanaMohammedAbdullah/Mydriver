function Createfolder(name){

    $.ajax({
        url: "http://localhost:8080/Assignment/demo/Mydriver/controller/file-manager.php",
        type: "POST",
        data: {name: name},
        success: function (data) {
            console.log(data);
            if (data == "success") {
                alert("Folder Created");
            } else {
                alert("Folder Not Created");
            }
        }

    })
}