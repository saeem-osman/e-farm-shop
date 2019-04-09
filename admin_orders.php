
<?php
  include('functions.php');

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
<?php include_once('admin_header.php'); ?>



                <div class="orders">

                <div class="order-list">
                  <nav class="nav-sitenav">
                    <ul class="navigation">
                     <li><a href="orders.html">All (5)</a></li>
                        <li><a href="order1.html">Processing (1)</a></li>
                        <li><a href="order2.html">Completed (2)</a></li>
                          <li><a href="order3.html">Pending (1)</a></li>
                            <li><a href="order4.html">Cancelled (1)</a></li>

                    </ul>
                  </nav>
                </div>
              </div>
              <div class="order-table">

                <div class="table-responsive datagrid">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Order</th>
                    <th>Ship to</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pending</td>
                    <td>#20 by Rahman Chowdhury</td>
                    <td>130 new Elephant Road, Dhaka</td>
                    <td>02-03-2018</td>
                    <td>1500/= </td>
                    <td><label class="cons">Product Recieved
  <input type="checkbox">
  <span class="checkmark"></span>
</label></td>
                    <td><label class="cons">Sent To Destination
  <input type="checkbox">
  <span class="checkmark"></span>
</label></td>
              <td><button onclick="window.location.href='submit.html'">Submit</button> <button>Detail</button></td>


                </tr>
                <tr>
                    <td>Completed</td>
                    <td>#30 by Alam Chowdhury</td>
                    <td>160 new Market, Dhaka</td>
                    <td>03-03-2018</td>
                    <td>3500/= </td>
                    <td><label class="cons">Product Recieved
  <input type="checkbox" checked="unchecked">
  <span class="checkmark"></span>
</label></td>
                    <td><label class="cons">Sent To Destination
  <input type="checkbox" checked="unchecked">
  <span class="checkmark"></span>
</label></td>
                <td><button>Detail</button></td>

                </tr>
                <tr>
                    <td>Cancelled</td>
                    <td>#70 by Kamal Chowdhury</td>
                    <td>Bashundhara R/A, Dhaka</td>
                    <td>02-02-2018</td>
                    <td>4000/= </td>
                   <td><label class="cons">Product Recieved
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label></td>
                    <td><label class="cons">Sent To Destination
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label></td>
                <td><button>Detail</button></td>

                </tr>
                <tr>
                    <td>Processing</td>
                    <td>#30 by Alam Chowdhury</td>
                    <td>160 new Market, Dhaka</td>
                    <td>03-03-2018</td>
                    <td>3500/= </td>
                    <td><label class="cons">Product Recieved
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label></td>
                    <td><label class="cons">Sent To Destination
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label></td>
                    <td><button>Detail</button></td>
                </tr>

                <td>Completed</td>
                    <td>#30 by Alam Chowdhury</td>
                    <td>160 new Market, Dhaka</td>
                    <td>03-03-2018</td>
                    <td>3500/= </td>
                    <td><label class="cons">Product Recieved
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label></td>
                    <td><label class="cons">Sent To Destination
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label></td>
                    <td><button>Detail</button></td>
                </tr>


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <div class="paging">
                            <ul>
                                <li><a href="#"> <span>Previous </span></a></li>
                                <li><a href="#" class="active"> <span>1 </span></a></li>
                                <li><a href="#"> <span>2 </span></a></li>
                                <li><a href="#"> <span>3</span></a></li>
                                <li><a href="#"> <span>Next </span></a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>


                </div>
            </div>







        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery.min.js"></script>
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
