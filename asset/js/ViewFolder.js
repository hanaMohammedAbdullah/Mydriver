/** @format */

function ViewFolder() {
  let checked = document.querySelectorAll('input[type="checkbox"]:checked');
  var formData = new FormData();
  if (checked[0].id != null ) {
    formData.append('ids', checked[0].id);
  formData.append('view', 'view');
  $.ajax({
    url: '../../controller/file-manager.php',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (data, status) {
      console.log(status);
    },
  }).then((data) => {
    console.log(data);
  });
  }
 
setTimeout(function(){ location.reload(); }, 500);
  

  
}
