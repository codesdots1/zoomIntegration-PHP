<?php
require_once 'config.php';
  
$url = "https://zoom.us/oauth/authorize?response_type=code&client_id=".CLIENT_ID."&redirect_uri=".REDIRECT_URI;
?>
  
<html>
    <head>
        <title> Zoom Integration </title>
    </head>
    <body>
        <div style="padding-top: 100px;">
            <center>
                <a style="background-color: #0e71eb;padding: 10px 10px 10px 10px;color: white;" href="<?php echo $url; ?>" target="_blank">Login with Zoom</a>
            </center>
        </div>
    </body>
</html>


