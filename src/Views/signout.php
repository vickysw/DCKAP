<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="google-signin-client_id" content="70292189275-cqh3hh7kvj4fcgqj3eetdb5c3o0pe5kt.apps.googleusercontent.com">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
  </script>
  <script type="text/javascript">
    var PATH = '<?php echo ACTION_PATH;?>';
  </script>

    <title>Social Loign with Google</title>
  </head>
  <body>
   <script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>
    <script>
        window.onLoadCallback = function(){
                gapi.load('auth2', function() {
                    gapi.auth2.init().then(function(){
                        var auth2 = gapi.auth2.getAuthInstance();
                        auth2.signOut().then(function () {
                            console.log('Signout User');
                            document.location.href = PATH+'/test/authenticate';
                        });
                    });
                });
            };
    </script>
    <div class="container p-3 my-3 border">
        <div class="row">
             <div class="col align-self-start">
                <h1><div class="g-signin2" data-onsuccess="onSignIn"></div></h1>
            </div>
        </div>
    </div>
  </body>
</html>
<script type="text/javascript">
// signOut();
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

</script>