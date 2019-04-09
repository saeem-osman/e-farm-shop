<?php
  include('functions.php');

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
<?php include_once('admin_header.php'); ?>

         <div class="container-fluid"; style="text-align: center; font-family: sans-serif;font-size: 37px;">
          <style type="text/css">
    .typewriter h1 {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .15em solid orange; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(40, end),
    blink-caret .75s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: orange; }
}


</style> <div class="typewriter">
           <h1 style="color: orange;"> Hello Admin!!!</h1>
            
         

<div class="row-content">
  <div class="col-sm-6">


</div>
</div>
</div>


        <!-- jQuery CDN -->
         <script src="js/jquery.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="js/bootstrap.min.js"></script>

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
