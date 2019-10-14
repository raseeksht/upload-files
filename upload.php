<!DOCTYPE html>
<html>
<head>
  <title>shresttha</title>
  <style type="text/css">
    body{
      background-color: black;
      color:#fff;
    }
    h1{
      position: absolute;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
          }
  </style>
</head>
<body>
  <?php
$con = mysqli_connect("localhost","rashiksh_up","xer0sploit","rashiksh_upload");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if (isset($_POST['upload'])){
    echo "hudaaii";
    $filename = $_FILES['file']['name'];
    
      $tempname = $_FILES['file']['tmp_name'];
      
      $sn='NULL';
      $sql="INSERT INTO `count`(`sn`, `filename`) VALUES ('$sn','$filename')";
      //some sql queries
      $dql="SELECT * FROM count ORDER BY sn Desc";
      $result=mysqli_query($con,$dql);
      $row=mysqli_fetch_array($result);
      $num=$row[0]+1;
      $fname=strrchr("$filename",'.');
      $filename=str_replace("$fname","","$filename");
      $fname=strtolower($fname);
      $newname="$filename ($num)"."$fname";
      $folder="uploads/".$newname;
      
      mysqli_query($con,$sql);

      if (move_uploaded_file($tempname,$folder)===True){
        echo "<h1>uploaded<h1>";
        echo "<script>alert('uploaded...!!')</script>";
      }else{
        echo "<h1>something error</h1>";
      }
  }else{
    echo "error po vvayexa";
  }
  ?>
</body>
</html>