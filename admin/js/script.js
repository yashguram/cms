$(document).ready(function() {
    $('#summernote').summernote({
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summe
    });
  });

  //view_all_post->SelectAllCheckbox 
$(document).ready(function(){
  $('#SelectAllCheckbox').click(function(event){
    if(this.checked){
      $('.CheckBoxes').each(function(){
        this.checked=true;
      })
    }else{
      $('.CheckBoxes').each(function(){
        this.checked=false;
      })
    }
  })
})

function loadOnlineUsers() {
  $.ajax({
      url: 'functions.php', // Path to your PHP script
      type: 'GET',
      data: { onlineusers: 'result' }, // Sending the parameter
      success: function(response) {
          // Update the element with the response from the server
          $('.online_user').text(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          // Handle errors here
          console.error('Error:', textStatus, errorThrown);
      }
  });
}

$(document).ready(function() {
  // Call the function to load online users every 500 milliseconds
  loadOnlineUsers();
  setInterval(loadOnlineUsers, 500);
});
