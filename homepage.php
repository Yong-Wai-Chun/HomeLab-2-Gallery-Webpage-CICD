<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="utf-8">
  <style>
  </style>
</head>
<body>
  <a name="top"></a>

  <div class="topSticky">
    <h1 align="center" >Live Gallery</h1>
  </div>

  <div> <!-- The main banner -->
    //
    <?php // upload cover image
    include_once 'coverupload/database.cov.php';

    $sql = "SELECT * FROM cover ORDER BY coverOrder DESC";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt , $sql)) {
      echo "SQL statement failed!";
    } else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        echo '<div  class="banner" style="background-image: url(cover/'.$row["coverName"].') ; background-size: 1520px 610px ; width: 1519px ; height: 610px;">';
        echo '<div style="padding-left: 50px ; padding-top: 50px ; text-align: left ; font-size: 30px ; font-family: arial ; ">' ;
        echo date("l , ") . date("Y-m-d");
        echo '</div>';
        echo '  <h1 class="title">Gallery Website</h1>
          <a href="#post">
          <img class="post hov" width="80px" height="80px" src="css/imgs/post.png">
          </a>';
        echo '</div>';
        echo '  <form method="post" action="coverupload/upload.cov.php" enctype="multipart/form-data" >
            <input type="file" name="coverimage" style="float: right ; margin-top: -140px ; "><br>
            <button type="submit" name="submitcover" class="hov"
            style="float: right ; margin-top: -120px ; margin-right: 50px ;
            width: 200px ;
            background-color: white ;
            border: None ;
            border-radius: 5px ;
            padding: 10px 15px ;">
            UPLOAD COVER IMAGE</button>
          </form>';

      } else {
        echo '<div  class="banner">';
        echo '<div style="padding-left: 50px ; padding-top: 50px ; text-align: left ; font-size: 30px ; font-family: arial ; ">' ;
        echo date("l , ") . date("Y-m-d");
        echo '</div>';
        echo '  <h1 class="title">Gallery Website</h1>
          <a href="#post">
          <img class="post hov" width="80px" height="80px" src="css/imgs/post.png">
          </a>';
        echo '</div>';
        echo '  <form method="post" action="coverupload/upload.cov.php" enctype="multipart/form-data" >
            <input type="file" name="coverimage" style="float: right ; margin-top: -140px ; "><br>
            <button type="submit" name="submitcover" class="hov"
            style="float: right ; margin-top: -120px ; margin-right: 50px ;
            width: 200px ;
            background-color: white ;
            border: None ;
            border-radius: 5px ;
            padding: 10px 15px ;">
            UPLOAD COVER IMAGE</button>
          </form>';
      }
    }
    ?>



  </div>

  <h2 style="margin: 80px ;" align="center">This is my personal gallery website. It is filled with memories and all the things I found interesting in my life.</h2>

  <?php
  include_once 'configuration/database.con.php';

  $sql = "SELECT * FROM contents ORDER BY orderImg DESC";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt , $sql)) {
    echo "SQL statement failed!";
  } else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $trow = 0;
    echo '<table align="center" cellpadding="40" style="width:500px ; ">';
    while ($row = mysqli_fetch_assoc($result)) {
      if ($trow % 4 == 0){
        echo '</tr><tr>';
        echo '<td>
            <div style="height: 280px ; background-color: #F9F9F9 ; border-bottom-left-radius: 5px ; border-bottom-right-radius: 5px ;">
              <a class="container" href="viewPhoto.php">
                <div class="image" style="background-image: url(images/'.$row["imgName"].');
                            background-size: 200px 200px;
                            background-color: black;
                            background-repeat: no-repeat ;
                            height: 200px;
                            width: 200px;
                            top: -10px;
                            ">
                </div>
              <div class="middle">
                <h3 class="text">'.$row["title"].'</h3>
              </div>
              </a>
              <h3 style="font-family: helvetica ; padding-left: 10px; padding-top: 10px ;">'.$row["datename"].'</h3>
              </td>
            </div>';
        $trow = $trow + 1;
      } else {
        echo '<td>
            <div style="height: 280px ; background-color: #F9F9F9 ; border-bottom-left-radius: 5px ; border-bottom-right-radius: 5px ;">
              <a class="container" href="viewPhoto.php">
              <div class="image" style="background-image: url(images/'.$row["imgName"].');
                          background-size: 200px 200px;
                          background-color: black;
                          background-repeat: no-repeat ;
                          height: 200px;
                          width: 200px;
                          top: -10px;
                          ">
              </div>
              <div class="middle">
                <h3 class="text">'.$row["title"].'</h3>
              </div>
              </a>
              <h3 style="font-family: helvetica ; padding-left: 10px; padding-top: 10px ;">'.$row["datename"].'</h3>
              </td>
            </div>';
        $trow = $trow + 1;
      }
    }
    echo '</table>';
  }
  ?>


<a name="post">
  <form method="post" action="configuration/upload.con.php" enctype="multipart/form-data" class="background-input">
    <input type="text" name="filename" placeholder="File name..." style="margin-top: 50px ; " ><br>
    <input type="text" name="filetitle" placeholder="Image title..."><br>
    <textarea name="filedesc" rows="10" cols="70" placeholder="Image description ..."></textarea><br>
    <input class="upload" type="file" name="file" >
    <button class="down" type="submit" name="submit" class="inputSection">UPLOAD</button>
    <a href="#top">
    <img style="margin-left: auto ; margin-right: auto ; display: block ; background-color: white ; border-radius: 50px ;"
    class="hov" width="80px" height="80px" src="css/imgs/Bounce-arrow.gif">
    </a>
  </form>
</a>



  <!--form method="post" action="configuration/upload.con.php" enctype="multipart/form-data" >
    <input type="file" name="cover_image" class="inputSection">
    <button type="submit" name="submit_cover" class="inputSection">UPLOAD COVER IMAGE</button>
  </form-->

</body>
</html>
