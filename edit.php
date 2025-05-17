<?php
include "connection.php";

// Initialize variables
$id = "";
$name = "";
$email = "";
$phone = "";
$error = "";
$success = "";

// Handle GET request — to load existing data
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    $id = $_GET['id'];

    // Use prepared statement to fetch data securely
    $stmt = $conn->prepare("SELECT * FROM php1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header('Location: index.php');
        exit;
    }

    $name = $row["Name"];
    $email = $row["Email"];
    $phone = $row["Phone"];
}

// Handle POST request — to update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Simple validation (optional)
    if ($name && $email && $phone) {
        $stmt = $conn->prepare("UPDATE php1 SET name = ?, email = ?, phone = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $phone, $id);
        if ($stmt->execute()) {
            $success = "Record updated successfully!";
            header("Location: index.php");
            exit;
        } else {
            $error = "Error updating record.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Member</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- jQuery and Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">PHP CRUD Borrow List</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create.php">Add New</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="col-lg-6 m-auto mt-5">
    <form method="post" action="edit.php">
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

      <div class="card">
        <div class="card-header bg-primary">
          <h1 class="text-white text-center">Edit Member</h1>
        </div>
        <div class="card-body">

          <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
          <?php endif; ?>
          <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
          <?php endif; ?>

          <label>NAME:</label>
          <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
          <br>

          <label>EMAIL:</label>
          <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
          <br>

          <label>PHONE:</label>
          <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" required>
          <br>

          <button class="btn btn-success" type="submit" name="submit">Update</button>
          <a class="btn btn-info" href="index.php">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
