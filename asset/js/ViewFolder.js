function ViewFolder(){
    let checked = document.querySelectorAll('input[type="checkbox"]:checked');
    var formData = new FormData()
    formData.append('ids', checked[0].id);
    formData.append('view', "view");
    // console.log(checked[0].id);
    $.ajax({
        url: "../../controller/file-manager.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data,status) {
            console.log(status);
        }
       
    }).then(data=> {
        console.log(data);
      
    });


    document.getElementById('coockie').value = GetCookie('names');
   

}

function GetCookie (name) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;

    while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg){
            return getCookieVal (j);
            document.getElementById('coockie').value = GetCookie('names');

        }
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0)
            break;
    }
    document.getElementById('coockie').value = GetCookie('names');

    return null;
}