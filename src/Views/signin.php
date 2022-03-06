<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
   <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="google-signin-client_id" content="70292189275-cqh3hh7kvj4fcgqj3eetdb5c3o0pe5kt.apps.googleusercontent.com">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
  </script>
  </script>

    <title>Social Loign with Google</title>
  </head>
  <body>
    <div class="container p-3 my-3 border">
        <div class="row">
             <div class="col align-self-start">
                <h1><div class="g-signin2" data-onsuccess="onSignIn"></div></h1>
                <!-- <a href="#" onclick="signOut();">Sign out</a> -->
            </div>
            
        </div>
    </div>
  </body>

</html>
<script type="text/javascript">
var PATH = '<?php echo ACTION_PATH;?>';
    function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var g_id = profile.getId();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  var postdata = {};
    postdata.g_id = profile.getId();
        $.ajax({
            url :PATH + "/test/authenticate", 
            data: {g_id:g_id},
            type: "post",        
            error: function(){
            },
            success: function ( data ) 
            {
               if(data)
               {
                window.location.href = data;
               }
            }
        });
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

</script>