<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Borrowing librarary Book</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Library</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-light" href="create.php">Add New Borrow</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-4">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NAME BORROWER</th>
          <th scope="col">EMAIL STUDENT</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Borrow_Date</th>
          <th scope="col">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "connection.php";
        $sql = "SELECT * FROM `php1`";
        $result = $conn->query($sql);
        if (!$result) {
          die("Invalid Query!");
        }
        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
              <th>{$row['id']}</th>
              <td>{$row['Name']}</td>
              <td>{$row['Email']}</td>
              <td>{$row['Phone']}</td>
              <td>{$row['join_date']}</td>
              <td>
                <a class='btn btn-sm btn-primary' href='edit.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-sm btn-danger' href='delete.php?id={$row['id']}'>Delete</a>
              </td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>