function EditFolder(){
    let checked = document.querySelectorAll('input[type="checkbox"]:checked');
    var formData = new FormData()
    formData.append('ids', id);
    formData.append('Edit', "Edit");
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