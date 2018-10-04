let axios = require('axios');

$('body').on('click', '#update', function(){
  var bookmark = $(this).data('id');

  axios.get('/marxmanager/public/bookmark/edit/'+bookmark, {
  })
  .then(function (response) {
    console.log(response);
    $('#updateName').val(response.data.name);
    $('#updateDescription').val(response.data.description);
    $('#updateUrl').val(response.data.url);
    $('#editId').val(response.data.id);
  })
  .catch(function (error) {
    console.log(error);
  });


});


$('body').on('click', '#putBookmark', function(e){
 
  var bookmark = $('#editId').val();
  var name = $('#updateName').val();
  var description = $('#updateDescription').val();
  var url = $('#updateUrl').val();

  axios.put('/marxmanager/public/bookmark/update/'+bookmark, {
    name: name,
    description: description,
    url: url
    
  })
  .then(function (response) {
    console.log(response);
    e.preventDefault();
   if(response.status == 200) {
    window.location.reload();
   }
  })
  .catch(function (error) {
    console.log(error);
  });
 
})


$('body').on('click', '#delete', function(){
  var bookmark = $(this).data('id');
  axios.delete('/marxmanager/public/bookmark/delete/'+bookmark, {
  })
  .then(function (response) {
    console.log(response);
   
  })
  .catch(function (error) {
    console.log(error);
  });
 window.location.reload();
})
