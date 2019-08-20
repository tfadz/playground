jQuery(function($) {
  var $mybutton = $('.sunset-load-more');
  
  $mybutton.click(function() {
    var that = $(this);
    var page = that.data('page');
    var newPage = page+1;
    var ajaxurl = that.data('url');
    event.preventDefault();

    $.ajax({
      url: ajaxurl,
      type: 'post',
      data: {
        page: page,
        action: 'sunset_load_more'
      },
      error: function(response) {
        console.log(response);
      },
      success: function(response) {
        that.data('page', newPage);
        $('.sunset-posts-container').append(response);
        console.log("Success");
      }

    })
    
  });


});

jQuery(function($) {

  $('#pw_button').click(function() {
    console.log(pw_script_vars.some_string);
  });

});

jQuery(function($){
  $('#filter').submit(function(){
    var filter = $('#filter');
    $.ajax({
      url:filter.attr('action'),
      data:filter.serialize(), // form data
      type:filter.attr('method'), // POST
      beforeSend:function(xhr){
        filter.find('button#filter-btn').text('Refreshing...'); // changing the button label
      },
      success:function(data){
        filter.find('button#filter-btn').text('Apply filter'); // changing the button label back
        $('#response').html(data); // insert data
      }
    });
    return false;
  });

  // Reset FILTER //  
  // Reset Filter //    
  $("#reset-btn").click(function() {
    document.getElementById('filter').reset(); 
    $('#response').append();
 
    var filter = $('#filter');
 
    $.ajax({
      url:filter.attr('action'),
      type:filter.attr('method'),
      data:filter.serialize(),
      success:function(data){
        $('#response').html(data);
      }
      }); 
        return false;
  });
});