<?php

if (isset($_POST['submit'])) {

  $newFileName = $_POST['filename'];
  if (empty($newFileName)) {
    $newFileName = "gallery";
  } else {
    $newFileName = strtolower(str_replace(" " , "-" , $newFileName));
  }
  
  $date = date("Y/m/d");
  $imageTitle = $_POST['filetitle'];
  $imageDesc = $_POST['filedesc'];

  $file = $_FILES['file'];

  // Values
  $fileName = $file["name"];
  $fileType = $file["type"];
  $fileTempName = $file["tmp_name"];
  $fileError = $file["error"];
  $fileSize = $file["size"];

  $fileExt = explode("." , $fileName); // split string with explode to get the last extension
  $fileActualExt = strtolower(end($fileExt)); // lower the last of file extension / png / jpg

  $allowed = array("jpg" , "jpeg" , "png" , "gif");

  if (in_array($fileActualExt , $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 20000000) {
        $imageFullName = $newFileName . "." . uniqid("" , true) . "." . $fileActualExt;
        $fileDestination = "../images/" . $imageFullName;

        include_once "database.con.php";

        if (empty($imageTitle) || empty($imageDesc)) {
          header("Location: ../homepage.php?upload=empty");
          exit();
        } else {
          $sql = "SELECT * FROM contents;"; //Table
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt , $sql)) {
            echo "SQL statement failed!";
          } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowCount = mysqli_num_rows($result);
            $setImageOrder = $rowCount + 1;

            $sql = "INSERT INTO contents (title , description , imgName , orderImg , datename) VALUES (? , ? , ? , ? , ?);";
            if (!mysqli_stmt_prepare($stmt , $sql)) {
              echo "SQL statement failed!";
            } else {
              mysqli_stmt_bind_param($stmt , "sssss" , $imageTitle , $imageDesc , $imageFullName , $setImageOrder , $date);
              mysqli_stmt_execute($stmt);

              move_uploaded_file($fileTempName , $fileDestination);

              header("Location: ../homepage.php?upload=success");
            }
          }
        }
      } else {
        echo "File size is too big!";
        exit();
      }
    } else {
      echo "You had an error!";
      exit();
    }
  } else {
    echo "You need to upload a proper file type!";
    exit();
  }

}
