  
var PostsBtn = document.getElementById("posts-btn");
var PostsContainer = document.getElementById("posts-container");

if( PostsBtn ) {
  PostsBtn.addEventListener("click", function(){
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', 'http://localhost:8888/playground/wp-json/wp/v2/posts');
        // ourRequest.open('GET', 'http://localhost:8888/playground/wp-json/wp/v2/posts?orderby=date&order=asc&category=3');

        ourRequest.onload = function() {
          if(ourRequest.status >= 200 && ourRequest.status < 400) {
            var data = JSON.parse(ourRequest.responseText);
                //console.log(data);
                createHTML(data);
              } else {
                console.log('We connected to the server, but it returned an error.');
              }
            };

            ourRequest.onerror = function() {
              console.log('Connection error');
            }

            ourRequest.send();
          });
}

function createHTML( postsData ) {
  var ourHTMLString = '';    
    for( var i = 0; i < postsData.length; i++) {
      ourHTMLString += '<h2>' + postsData[i].title.rendered + '</h2>';
      ourHTMLString += postsData[i].content.rendered;
    }
    
    PostsContainer.innerHTML = ourHTMLString;
  }


  jQuery(function($) {
    $blogbtn = $('#blog-btn');
    $blogcontainer = $('.mycontainer');

    $blogbtn.click(function() {
    $blogcontainer.toggle(400);

      $.ajax({
        type: "GET",
        cache: false,
        url: "http://localhost:8888/playground/blog/", 
        timeout: 2000,
        success: function(data){
          $('.hero .mycontainer').html($(data).find('.blog-articles').html());

        },

        // complete: function(data) {
        //   $blogbtn.remove();
        // }

      });

    });
  });
 

