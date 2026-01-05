<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/styleVP.css">
  <meta charset="utf-8">
  <title>Gallery Website</title>
</head>
<body>
  <a name="up"></a>
  <div class="topSticky">
    <h1 align="center" >Live Gallery</h1>
  </div>

  <a href="#up">
    <img width="90px" class="arrow" src="css/imgs/arrow.gif">
  </a>

  <a  href="homepage.php">
    <img width="90px" class="home" src="css/imgs/home.png">
  </a>

  <?php
  include_once 'configuration/database.con.php';

  $sql = "SELECT * FROM contents ORDER BY orderImg DESC";
  $stmt = mysqli_stmt_init($conn);

  $position = 1;

  if (!mysqli_stmt_prepare($stmt , $sql)) {
    echo "SQL statement failed!";
  } else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      if ($position % 2 === 0) {
        echo '
        <div align="center">
        <table >
        <tr>
          <td class="container">
            <img id="myImg" class="image" alt="'.$row["title"].'" src="images/'.$row["imgName"].'" style="height: 500px ;">
            <div class="middle">
              <h3 class="text">'.$row["datename"].'</h3>
            </div>
          </td>
          <td style="padding: 0 50px;">
            <h2 class="content">'.$row["title"].'</h2>
            <p class="content">'.$row["description"].'</p>
          </td>
        </tr>
        </table>
        </div>';
        $position+=1;
      } else {
        echo '
        <div align="center">
        <table >
        <tr>
          <td style="padding: 0 50px;">
            <h2 class="content">'.$row["title"].'</h2>
            <p class="content">'.$row["description"].'</p>
          </td>
          <td class="container">
            <img id="myImg" class="image" alt="'.$row["title"].'"src="images/'.$row["imgName"].'" style="height: 500px ;">
            <div class="middle">
              <h3 class="text">'.$row["datename"].'</h3>
            </div>
          </td>
        </tr>
        </table>
        </div>';
        $position+=1;
      }
    }
  }
  ?>
  <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- The Close Button -->
      <span class="close">&times;</span>

      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01">

      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
    </div>



<script src="script/jsVP.js"></script>
</body>
</html>
