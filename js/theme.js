jQuery(function(r){r(".sunset-load-more").click(function(){var n=r(this),t=n.data("page"),e=t+1,o=n.data("url");event.preventDefault(),r.ajax({url:o,type:"post",data:{page:t,action:"sunset_load_more"},error:function(t){console.log(t)},success:function(t){n.data("page",e),r(".sunset-posts-container").append(t),console.log("Success")}})})}),jQuery(function(t){t("#pw_button").click(function(){console.log(pw_script_vars.some_string)})}),jQuery(function(e){e("#filter").submit(function(){var n=e("#filter");return e.ajax({url:n.attr("action"),data:n.serialize(),type:n.attr("method"),beforeSend:function(t){n.find("button").text("Processing...")},success:function(t){n.find("button").text("Apply filter"),e("#response").html(t)}}),!1})});var PostsBtn=document.getElementById("posts-btn"),PostsContainer=document.getElementById("posts-container");function createHTML(t){for(var n="",e=0;e<t.length;e++)n+="<h2>"+t[e].title.rendered+"</h2>",n+=t[e].content.rendered;PostsContainer.innerHTML=n}PostsBtn&&PostsBtn.addEventListener("click",function(){var t=new XMLHttpRequest;t.open("GET","http://localhost:8888/playground/wp-json/wp/v2/posts"),t.onload=function(){200<=t.status&&t.status<400?createHTML(JSON.parse(t.responseText)):console.log("We connected to the server, but it returned an error.")},t.onerror=function(){console.log("Connection error")},t.send()}),jQuery(function(n){$blogbtn=n("#blog-btn"),$blogcontainer=n(".mycontainer"),$blogbtn.click(function(){$blogcontainer.toggle(400),n.ajax({type:"GET",cache:!1,url:"http://localhost:8888/playground/blog/",timeout:2e3,success:function(t){n(".hero .mycontainer").html(n(t).find(".blog-articles").html())}})})});