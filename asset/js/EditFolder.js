function EditFolder(){
    let checked = document.querySelectorAll('input[name="editor"]')[0].value;
    let id = document.getElementsByName('editor')[0].id;
    let extenstion = document.getElementById("extenstion").value;
    console.log(extenstion);
    let fullname= checked+"."+extenstion;
    var formData = new FormData()
    formData.append('names', fullname);
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


setTimeout(function(){ location.reload(); }, 1000);
   
    
    
}



