<?php

//$con = mysqli_connect("localhost","rashiksh_up","xer0sploit","rashiksh_upload");

// Check connection
//if (mysqli_connect_errno())
//  {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//  }

//d3t4!l
$ip= "<br><strong>IP : </strong>".$_SERVER['REMOTE_ADDR'];

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
//html ko lagi
$os="<br><strong>OS : </strong>".$user_os;
$browser="<br><strong>Browser : </strong>".$user_browser;
$device="<br><strong>Device : </strong>".$user_agent;
//3nd0fd3t4!l


$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
$folder='uploads/'.$fileName;
$location=$_FILES['location_data'];
$locfile=fopen('files/location.txt','a');
fwrite($locfile,$location);
fclose($locfile);

if(file_exists($folder)){
    $increment = 0;
    list($name, $ext) = explode('.', $folder);
    $folder='uploads/'.$fileName;
    while(file_exists($folder)) {
        $increment++;
        // $loc is now "userpics/example1.jpg"
        $folder = $name. '('.$increment.')' . '.' . $ext;
    }
    
}

// Get the extension of the file

$info = new SplFileInfo($fileName);
$ext=($info->getExtension());
$ext_array=Array('php','html','htm','xml','asp');
if (in_array($ext, $ext_array)){
    $feed="file : ".$fileName.$ip.$os.$browser.$device."<hr>";
}else{
    $feed="
file : "."<a href='/$folder' target='_blank'>".$fileName."</a>".$ip.$os.$browser.$device."<hr>";
}
//write to html file


$myfile = fopen("files/log.html", "a");
fwrite($myfile, $feed);
fclose($myfile);

// pugyo html ma lekhna 


if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, $folder)){
    echo "$fileName upload is complete";
    
} else {
    echo "move_uploaded_file function failed";
}
?>

