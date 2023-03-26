function DeleteFile(){
    let checkeds = document.querySelectorAll('input[type="checkbox"]:checked');

    let ids = [];
    
    for (let i = 0; i < checkeds.length; i++) {
       ids.push(checkeds[i].id);
    }
    ids.forEach(id => {
    var formData = new FormData()
    formData.append('ids', id);
    formData.append('delete', "delete");
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
    });
    location.reload();

}