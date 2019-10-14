<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	    

		<style type="text/css">
		body{
		    background:#808080;
		}
			input[type='submit']{
              width: 10em;
              height:2em;
              background-color: #0ff;
              border-radius: 1.5em;
            }
            /*@media screen and (min-width: 600px) {
                .container{
                    width:100%;
                }
            	.box {
            	    background:red;
            		padding:0px;
            		width:80%;
            		height:200px;
            	}
            }*/
            @media screen and (max-width: 320px) {
                body{
                    width:16em;
                }
            	.container{
            	    width:90%;
            	    
            	}
            	.box {
            		padding:0px;
            		width:90%;
            		height:10em;
            	}
            }
            progress {
                position: absolute;
                top: 10%;
                left: 50%;
                width:80%;
                transform:translate(-50%,13%);
                box-shadow: -1px 5px 36px 14px #7ac8b3;
            }
            #status{
                position: absolute;
                top:21%;
                background-color: transparent;
                left:58%;

            }
            .float{
                padding:1.25em;
                background:linear-gradient(#f00,#00f);
                border-radius:50%;
                color:#fff;
                position:absolute;
                top:0.625em;
                right:0.625em;
                box-shadow: 1px -3px 40px #eaf53c;
            }
            .float:hover{
                color:#0f0;
            }
    .box{
        padding-buttom:0em;
    }
    
    #location{
        display:none;
    }
		</style>
		
		
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- remove this if you use Modernizr -->
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
		
	</head>
	<body>
	    
	    <h3 id="message"></h3>
	     <p id="loaded_n_total">upload file less than 100 MB</p>
		<div class="container">
			<div class="content">

				<div class="box">
				    
				    <progress id="progressBar" value="0" max="100" style="width:80%;"></progress>
					<form method="post" enctype="multipart/form-data" action="upload.php">
					<input type="file" name="file" id="file1" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" onchange="uploadFile()"/>
					
					<label for="file1"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label><br>
					<span id="location"></span>
					</form>
					<a href="https://upload.rashikshrestha.com.np/uploads" target="_blank">See Uploaded Files</a>
				</div>
			</div>
            
  <h3 id="status"></h3>
  <h3 id='aa'></h3>
 
  <a href="http://upload.rashikshrestha.com.np/uploads" class='float'><i class="fas fa-folder-open"></i></a>
			
			
		</div>
		<?php
		  $user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform  = "Unknown OS Platform";

    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

function getBrowser() {

    global $user_agent;

    $browser        = "Unknown Browser";

    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}


$user_os        = getOS();
$user_browser   = getBrowser();
$ip="<strong>IP : </strong>".$_SERVER['HTTP_X_FORWARDED_FOR'];
$os="<br><strong>OS : </strong>".$user_os;
$browser="<br><strong>Browser : </strong>".$user_browser;
$device="<br><strong>Device : </strong>".$user_agent;
$time="<br><strong>Time : </strong>".date("Y-m-d, h:i a, l");
$filefeed=$ip.$isp.$os.$browser.$device.$time."<hr>";
$fileopen=fopen("files/visitors.html","a");
fwrite($fileopen,$filefeed);
fclose($fileopen);
		
		
		?>
		
 
<script src="js/custom-file-input.js"></script>
<script type="text/javascript">
    
    function _(el) {
  return document.getElementById(el);
}

function uploadFile() {
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);
  
  var loc=document.getElementById('location');
    if (navigator.geolocation){
      navigator.geolocation.getCurrentPosition(positionDekha);
    
    }else{
      loc.innerHTML="location unavailable";
    }
    function positionDekha(position){
  loc.innerHTML="longitude: " + position.coords.longitude + "<br> latitude: " + position.coords.latitude + "<br>";
  loc.innerHTML="<input type='text' name='location_data' value='https://maps.google.com/maps?q=" + position.coords.latitude +"," + position.coords.longitude + "&hl=es;z=14&amp'>";

}
}

function progressHandler(event) {
  _("loaded_n_total").innerHTML = "Uploaded " + (event.loaded/1048576).toFixed(2) + " MB of " + (event.total/1048576).toFixed(2) + "MB";
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("message").innerHTML = "Do not close Until this message disapppears";
  _("status").innerHTML = Math.round(percent) + "%";
}

function completeHandler(event) {
  _("aa").innerHTML = event.target.responseText;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
  _("message").innerHTML = "Upload Completed";
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}
</script>

<script>

    


</script>
	</body>
</html>
