<?php

if (isset($_POST['submitcover'])) {

  $file = $_FILES['coverimage'];

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
        $imageFullName = uniqid("" , true) . "." . $fileActualExt;
        $fileDestination = "../cover/" . $imageFullName;

        include_once "database.cov.php";
        $sql = "SELECT * FROM cover;"; //Table
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt , $sql)) {
          echo "SQL statement failed!";
        } else {
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          $rowCount = mysqli_num_rows($result);
          $setImageOrder = $rowCount + 1;

          $sql = "INSERT INTO cover (coverName , coverOrder) VALUES (? , ?);";
          if (!mysqli_stmt_prepare($stmt , $sql)) {
            echo "SQL statement failed!";
          } else {
            mysqli_stmt_bind_param($stmt , "ss" , $imageFullName , $setImageOrder);
            mysqli_stmt_execute($stmt);

            move_uploaded_file($fileTempName , $fileDestination);

            header("Location: ../homepage.php?cover_upload=success");
          }
        }
      } else {
        echo "File size is too big!";
        exit();
      }
    } else {
      echo "You had an error!" . $fileError;
      exit();
    }
  } else {
    echo "You need to upload a proper file type!";
    exit();
  }
}
