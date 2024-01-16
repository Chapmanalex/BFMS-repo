<?php 
include "maintanance/login_actio.php";
include "noti/connection/deactive.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>xpenser logIn</title>
  <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/css/customcss.css">
  <!-- <link rel="stylesheet" href="customcss.css"> -->
   <!-- FONTAWESOME STYLES-->
        <link href="css/font-awesome.css" rel="stylesheet" />
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/css/style.css" rel="stylesheet">

        <!-- onlin font awsome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Feather JS for Icons -->
        <script src="js/feather.min.js"></script>
        <!-- pie chart script -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>




<body>
<!-- navvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv -->
<nav class="navbar navbar-light">
                <div class="container-fluid">
                  <ul class="nav navbar-nav navbar-right">
                    <li><i class="fa fa-bell"   id="over" data-value ="<?php echo $count_active;?>" style="z-index:-99 !important;font-size:32px;color:white;margin:0.5rem 0.4rem !important;"></i></li>
                    <?php if(!empty($count_active)){?>

                    <div class="round" id="bell-count" data-value ="<?php echo $count_active;?>"><span><?php echo $count_active; ?></span></div>

                    <?php }?>
                    <?php if(!empty($count_active)){?>
                      <div id="list">
                       <?php
                          foreach($notifications_data as $list_rows){?>
                            <li id="message_items">
                            <div class="message alert alert-warning" data-id=<?php echo $list_rows['n_id'];?>>
                              <span><?php echo $list_rows['notifications_name'];?></span>
                              <div class="msg">
                                <p><?php 
                                  echo $list_rows['message'];
                                ?></p>
                              </div>
                            </div>
                            </li>
                         <?php }
                       ?> 
                       </div> 
                     <?php }else{?>
                        <!--old Messages-->
                        <div id="list">
                        <?php
                          foreach($deactive_notifications_dump as $list_rows){?>
                            <li id="message_items">
                            <div class="message alert alert-danger" data-id=<?php echo $list_rows['n_id'];?>>
                              <span><?php echo $list_rows['notifications_name'];?></span>
                              <div class="msg">
                                <p><?php 
                                  echo $list_rows['message'];
                                ?></p>
                              </div>
                            </div>
                            </li>
                         <?php }
                       ?>
                        <!--old Messages-->
                     
                     <?php } ?>
                     
                     </div>
                  </ul>
                 
                </div>
              </nav>
<!-- navvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv -->

  <div class="login-container">
    <div class="login-form">
            <h2>Xpender ChatBox</h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="pass" name="pass" placeholder="Enter your password">
                </div>
                <div>
                <button type="submit" class="btn btn-primary mb-3"><span data-feather = "message-circle">send</button>

                </div>

                
            </form>
        </div>

  </div>
</body>
</html>