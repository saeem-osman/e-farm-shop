<?php
  include('../functions.php');

  if (!isLoggedIn() || !isAdmin($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>

<?php include_once('admin_header.php'); ?>


<?php

global $db;
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM users WHERE user_type ='buyer'LIMIT 10";

$result = mysqli_query($db, $sql) or die(mysqli_error($db));

if ($result->num_rows > 0) {
    // output data of each row

              ?>  <section class="seller-info">
                  <div class="sellers">
                    <p> Local Buyers </p>
                  </div>
          <div class="tables-1">
           <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>District</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
          <?php  while($row = $result->fetch_assoc()) {
           echo  "<tr>";
              echo  "<td>". $row['id']."</td>";
              echo  "<td>". $row['username']."</td>";

                  echo  "<td>". $row['phone']."</td>";
                echo  "<td>". $row['email']."</td>";
                  echo  "<td>". $row['district']."</td>";
                  echo  "<td>". $row['address']."</td>";

                    echo "</tr>";
          } ?>

        </tbody>
    </table>
    <?php } ?>

          </div>


        </section>


            </div>

            <div>

            </div>
        </div>

    </body>
</html>
