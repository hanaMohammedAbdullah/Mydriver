function DeleteFiles(){
    $.ajax({
        url: "http://localhost:8080/Assignment/demo/Mydriver/controller/file-manager.php",
        type: "GET",
        data: {delete: "delete"},
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