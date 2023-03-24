function EditFolder(){
    let checked = document.querySelectorAll('input[name="editor"]');
    var formData = new FormData()
   console.log("value  "+checked[0].value);
   console.log("id  "+checked[0].id);
    formData.append('names', checked[0].value);
    formData.append('ids', checked[0].id);

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