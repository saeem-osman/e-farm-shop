<?php
  include('functions.php');

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>

<?php include_once('admin_header.php'); ?>


<?php

$db = mysqli_connect('localhost','root','', 'multi-login');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM USERS WHERE USER_TYPE='buyer' AND DISTRICT='RAJSHAHI'";

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







        <!-- jQuery CDN -->
         <script src="jquery.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>

    </body>
</html>
