<?php
include "connection.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $q = "INSERT INTO php1 (Name, Email, Phone) VALUES ('$name', '$email', '$phone')";
    $query = mysqli_query($conn, $q);

    if ($query) {
        echo "Record inserted successfully.";
        header("location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>CRUD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- jQuery and Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">PHP CRUD Borrow List </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create.php"><span style="font-size: larger;">Add New</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Form Section -->
  <div class="col-lg-6 m-auto">
  <form method="post" action="create.php">
    <br><br>
    <div class="card">
      <div class="card-header bg-primary">
        <h1 class="text-white text-center">New Student Bowrrow Book </h1>
      </div>
      <br>
      <div class="card-body">
        <label>NAME:</label>
        <input type="text" name="name" class="form-control" required>
        <br>
        <label>EMAIL:</label>
        <input type="email" name="email" class="form-control" required>
        <br>
        <label>PHONE:</label>
        <input type="text" name="phone" class="form-control" required>
        <br>
        <button class="btn btn-success" type="submit" name="submit">Submit</button>
        <a class="btn btn-info" href="index.php">Cancel</a>
      </div>
      <br>
    </div>
  </form>
</div>
</body>
</html>