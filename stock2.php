<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['getDetails'])) {
  $my_host = 'localhost';
  $my_username = 'root';
  $my_pass = '';
  $my_db_name = 'narvariya';

  $db = mysqli_connect($my_host, $my_username, $my_pass, $my_db_name) or die("cannot connect to server");

  $id = $_POST['id'];

  $productResult = $db->query("SELECT * FROM stock WHERE name='$id'");
  if ($productResult->num_rows > 0) {
    $productData = $productResult->fetch_assoc();

    echo json_encode($productData);
  }
  exit();
}
?>

<?php include_once('../connect.php'); ?>


<span style="font-family: verdana, geneva, sans-serif;">
  <!DOCTYPE html>

  <head>
    <title>Stock</title>
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/custom_style.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"> </script>
    <script src="../js/bootstrap.js"></script>
    <link href="custom_style.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
      * {
        margin: 0;
        padding: 0;
        outline: none;
        border: none;
        text-decoration: none;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        background: #dfe9f5;
      }

      .container-main {
        display: flex;
      }

      nav {
        position: relative;
        top: 0;
        bottom: 0;
        height: 100vh;
        left: 0;
        background: #fff;
        width: 280px;
        overflow: hidden;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
      }

      .logo {
        text-align: center;
        display: flex;
        margin: 10px 0 0 10px;
      }

      .logo img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
      }

      .logo span {
        font-weight: bold;
        padding-left: 15px;
        font-size: 18px;
        text-transform: uppercase;
      }

      a {
        position: relative;
        color: rgb(85, 83, 83);
        font-size: 14px;
        display: table;
        width: 280px;
        padding: 10px;
      }

      nav .fas {
        position: relative;
        width: 70px;
        height: 40px;
        top: 14px;
        font-size: 20px;
        text-align: center;
      }

      .nav-item {
        position: relative;
        top: 12px;
        margin-left: 10px;
      }

      a:hover {
        background: #eee;
      }

      .logout {
        position: absolute;
        bottom: 0;
      }

      /* Main Section */
      .main {
        position: relative;
        padding: 20px;
        width: 100%;
      }

      .main-top {
        display: flex;
        width: 100%;
      }

      .main-top i {
        position: absolute;
        right: 0;
        margin: 10px 30px;
        color: rgb(110, 109, 109);
        cursor: pointer;
      }

      .main-skills {
        display: flex;
        margin-top: 20px;
      }

      .main-skills .card {
        width: 25%;
        margin: 10px;
        background: #fff;
        text-align: center;
        border-radius: 20px;
        padding: 10px;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
      }

      .main-skills .card h3 {
        margin: 10px;
        text-transform: capitalize;
      }

      .main-skills .card p {
        font-size: 12px;
      }

      .main-skills .card button {
        background: orangered;
        color: #fff;
        padding: 7px 15px;
        border-radius: 10px;
        margin-top: 15px;
        cursor: pointer;
      }

      .main-skills .card button:hover {
        background: rgba(223, 70, 15, 0.856);
      }

      .main-skills .card i {
        font-size: 22px;
        padding: 10px;
      }

      /* Courses */
      .main-course {
        margin-top: 20px;
        text-transform: capitalize;
      }

      .course-box {
        width: 100%;
        height: 300px;
        padding: 10px 10px 30px 10px;
        margin-top: 10px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
      }

      .course-box ul {
        list-style: none;
        display: flex;
      }

      .course-box ul li {
        margin: 10px;
        color: gray;
        cursor: pointer;
      }

      .course-box ul .active {
        color: #000;
        border-bottom: 1px solid #000;
      }

      .course-box .course {
        display: flex;
      }

      .box {
        width: 33%;
        padding: 10px;
        margin: 10px;
        border-radius: 10px;
        background: rgb(235, 233, 233);
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
      }

      .box p {
        font-size: 12px;
        margin-top: 5px;
      }

      .box button {
        background: #000;
        color: #fff;
        padding: 7px 10px;
        border-radius: 10px;
        margin-top: 3rem;
        cursor: pointer;
      }

      .box button:hover {
        background: rgba(0, 0, 0, 0.842);
      }

      .box i {
        font-size: 7rem;
        float: right;
        margin: -20px 20px 20px 0;
      }

      .html {
        color: rgb(25, 94, 54);
      }

      .css {
        color: rgb(104, 179, 35);
      }

      .js {
        color: rgb(28, 98, 179);
      }
      #productTable tbody  tr td a {
        width: 120px;
      }
    </style>
  </head>

  <body>
    <div class="container-main">
      <nav>
        <ul>
          <li><a href="#" class="logo">
              <img src="../NARBARIY.png" alt="">
              <span class="nav-item">नरवरिया आभूषण</span>
            </a></li>
          <li><a href="#">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a></li>
          <li><a href="">
              <i class="fas fa-user"></i>
              <span class="nav-item">Profile</span>
            </a></li>
          <li><a href="">
              <i class="fas fa-wallet"></i>
              <span class="nav-item">Wallet</span>
            </a></li>
          <li><a href="">
              <i class="fas fa-chart-bar"></i>
              <span class="nav-item">Analytics</span>
            </a></li>
          <li><a href="">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">Tasks</span>
            </a></li>
          <li><a href="">
              <i class="fas fa-cog"></i>
              <span class="nav-item">Settings</span>
            </a></li>
          <li><a href="">
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">Help</span>
            </a></li>
          <li><a href="" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a></li>
        </ul>
      </nav>

      <section class="main">
      <div class="row" style="margin-top: 50px;">
        <div class="col-lg-4 col-lg-offset-6"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="./add-product.php" class="btn btn-info" style="width: 100%;">Add New Product</a>
            </div>
            <div class="col-md-3">
                <a href="./purchase_history.php" class="btn btn-info" style="width: 100%;">Purchased History</a>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <table id="productTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Type</th>
                        <th>Carat</th>
                        <th>Net Weight</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch products from the database
                    $sql = "SELECT * FROM stock";
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["type"] . "</td>";
                            echo "<td>" . $row["carat"] . "</td>";
                            echo "<td>" . $row["weight"] . "gm</td>";
                            echo "<td><a class='btn btn-success' href='edit-product.php?product_id=" . $row["id"] . "'>Edit</a>&nbsp;";
                            echo "<a class='btn btn-warning add-purchase-btn' href='#' data-product-id='" . $row['id'] . "'>Add Purchase</a>";
                            echo "<a href='delete-product.php?product_id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="addPurchaseModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="submitPurchase.php" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Purchase</h4>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Weight (in GM.):</label>
                            <input type="number" name="weight" class="form-control" placeholder="Enter purchased weight in grams.">
                        </div>
                        <div class="form-group">
                            <label>Cost:</label>
                            <input type="text" name="cost" class="form-control" placeholder="Enter purchased cost">
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <input type="hidden" name="product_id" value="" id="prod_id">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

      </section>
    </div>
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable();

            $('.add-purchase-btn').click(function() {
                var productId = $(this).data('product-id');
                $('#prod_id').val(productId);
                $('#addPurchaseModal').modal('show')
            });
        });
    </script>
  </body>

  </html>
</span>
