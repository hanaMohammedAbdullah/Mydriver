function EditFolder(){
    let checked = document.querySelectorAll('input[name="editor"]');
    let ids = document.querySelectorAll('input[type="checkbox"]:checked');
    let id= ids[0].id;

    var formData = new FormData()
   console.log("value  "+checked[0].value);
   console.log("id  "+id);
    formData.append('names', checked[0].value);
    formData.append('id', id);

    formData.append('edit', "edit");
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