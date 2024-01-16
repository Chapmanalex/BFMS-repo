<?php
  include("./connection/DB.php");
  include '../session.php';

$sender = mysqli_query($con,"SELECT CONCAT(u.firstname,' ',u.lastname,' ',u.othernames) AS name, i.userID FROM user u , inf i WHERE u.userID = i.userID");
 $rs = mysqli_fetch_array($sender)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- FONTAWESOME STYLES-->
        <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="css/all.css" rel="stylesheet" />
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/css/style.css" rel="stylesheet">

        <!-- data tables-->
        <link href="css/dataTables.bootstrap4.css" rel="stylesheet" />

        <!-- Feather JS for Icons -->
        <script src="js/feather.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <style>
        body {
             margin:0 !important;
             padding:0 !important;
             box-sizing: border-box;
             font-family: 'Roboto', sans-serif;
        }
        .round{
          width:20px;
          height:20px;
          border-radius:50%;
          position:relative;
          background:red;
          display:inline-block;
          padding:0.3rem 0.2rem !important;
          margin:0.3rem 0.2rem !important;
          left:-18px;
          top:10px;
          z-index: 99 !important;
        }
        .round > span {
          color:white;
          display:block;
          text-align:center;
          font-size:1rem !important;
          padding:0 !important;
        }
        #list{
         
          display: none;
          top: 33px;
          position: absolute;
          right: 2%;
          background:#ffffff;
  z-index:100 !important;
    width: 25vw;
    margin-left: -37px;
   
    padding:0 !important;
    margin:0 auto !important;
    
          
        }
        .message > span {
           width:100%;
           display:block;
           color:red;
           text-align:justify;
           margin:0.2rem 0.3rem !important;
           padding:0.3rem !important;
           line-height:1rem !important;
           font-weight:bold;
           border-bottom:1px solid white;
           font-size:1.8rem !important;

        }
        .message{
          /* background:#ff7f50;
          margin:0.3rem 0.2rem !important;
          padding:0.2rem 0 !important;
          width:100%;
          display:block; */
          
        }
        .message > .msg {
           width:90%;
           margin:0.2rem 0.3rem !important;
           padding:0.2rem 0.2rem !important;
           text-align:justify;
           font-weight:bold;
           display:block;
           word-wrap: break-word;
         
          
        }
       
    </style>


</head>

<body>
  <!-- php code for fetching notification from databases -->
     <?php
       $find_notifications = "Select * from inf where active = 1 AND userID = '$userid' ";
       $result = mysqli_query($con,$find_notifications);
       $count_active = '';
       $notifications_data = array(); 
       $deactive_notifications_dump = array();
        while($rows = mysqli_fetch_assoc($result))
        {
                $count_active = mysqli_num_rows($result);
                $notifications_data[] = array(
                            "n_id" => $rows['n_id'],
                            "notifications_name"=>$rows['notifications_name'],
                            "message"=>$rows['message'],
                            "userID" =>$rs['name']
                );
        }
        //only five specific posts
        $deactive_notifications = "Select * from inf where active = 0 AND userID = '$userid' ORDER BY n_id DESC LIMIT 0,5";
        $result = mysqli_query($con,$deactive_notifications);
        while($rows = mysqli_fetch_assoc($result)){
          $deactive_notifications_dump[] = array(
                      "n_id" => $rows['n_id'],
                      "notifications_name"=>$rows['notifications_name'],
                      "message"=>$rows['message'],
                      "userID" =>$rs['name']
          );
        }

     ?>
        <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <div>
                    <button class="btn btn-dark mt-4 ml-4" 
                    onclick="history.back()" >
                    <span data-feather='arrow-left'></span>
                    <strong>BACK</strong>
                    </button>
                  </div>
                  
                  <div class="navbar-header">
                    <a class="navbar-brand" href="#">Xpender communications</a>
                  </div>
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
                              <div class="msg">
                               
                                <p><?php 
                                  echo $rs['name'];
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
                              <div class="msg">
                                <p><?php 
                                  echo $rs['name'];
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
              <div class="container">

                <div class="card">
                  <div class="card-header">
                    <h4>expender chartBox<h4>
                  </div>
                  <div class="card-body">

                    <div class=" row">
                      

                    </div>
                    
                  </div>
                  
                </div>
                                          
                     <form class="form-horizontal" id="frm_data" method="POST" action="connection/insert.php">
                      <div class="form-group">
                        <label class="control-label col-md-4"> send to </label>
                          <div class="col-md-6">
                            <?php $query = mysqli_query($con, " SELECT *, CONCAT(firstname,' ',lastname,' ',othernames) AS name from user ");?>
                            <select class="form-control form-select" name= "recipient" id="recipient" required aria-label="Default select example">
                            <option placeholder="choose recipient"> </option>
                            <?php
                            while ($rst = mysqli_fetch_array($query)):?>
                              <option value="<?php echo $rst['userID']?>">
                                <?php echo $rst['name']; ?></option>
                            <?php endwhile;?>
                          </select>
                        </div>
                      </div>   
                      
                         <div class="form-group row">
                            <label class="control-label col-md-4" for="notification">message title</label>
                            <div class="col-md-6">
                              <input type="text" name="notifications_name" id="notifications_name" class="form-control" placeholder="Notification name" required/>
                            </div> 
                         </div>   
                         <div class="form-group row">
                            <label class="control-label col-md-4" for="notification">Message body</label>
                            <div class="col-md-6">
                              <textarea style="resize:none !important;"name="message" id="message" rows="4" cols="10" class='form-control' required></textarea>
                            </div> 
                         </div>
                         <div class="form-group row">
                            <div class="col-md-10 col-offset-2" style="text-align:center;">
                            <input type="submit" id="notify" name="submit" class="btn btn-danger" value="NOTIFY"/>
                            </div>
                         </div>
                         
                     </form> 
                     <br>
                     <br>
                     <div class="row">
                      <h3 class=""> My messages</h3>
                       <div class="card mymessages">
                        <table class="table table-striped table-bordered table-hover "  id="dataTables">
                          <tbody>
                          <tr>
                            <th> message title </th>
                            <th> message body </th>
                            <th> sent-By </th>
                            <th> action </th>
                          </tr>

                          <?php 
                            $message = mysqli_query($con,"SELECT i.*, CONCAT(u.firstname,' ',u.lastname,' ',u.othernames) AS name FROM user u , inf i WHERE u.userID = i.userID AND i.userID = '$userid' AND active = 1 ");
                            while ($rs = mysqli_fetch_array($message)):?>
                            <tr>
                            <td> <?php echo $rs['notifications_name']; ?> </td>
                            <td> <?php echo $rs['message']; ?> </td>
                            <?php
                            $uid =  $rs['userID_2'];
                            $sender2 =  mysqli_query($con ,"SELECT CONCAT(firstname,' ',lastname,' ',othernames) AS name FROM user WHERE  userID = '$uid' ");
                            $ret = mysqli_fetch_array($sender2);
                            echo $rs['userID_2'];
                             ?>
                            <td> <?php echo $ret['name']; ?> </td>
                            <td> 
                                <a type="button" 
                                class="btn btn-success" 
                                href="connection/deactive.php?n_id=<?php echo $rs['n_id']?>">mark as read</a>
                            </td>
                          </tr>
                           <?php endwhile;?>
                          


                          
                          </tbody>
                        </table>
                     </div>
                     </div>
                          
              </div>
           
    
</body>
<script>
$(document).ready(function(){
    var ids = new Array();
    $('#over').on('click',function(){
           $('#list').toggle();  
       });

   //Message with Ellipsis
   $('div.msg').each(function(){
       var len =$(this).text().trim(" ").split(" ");
      if(len.length > 12){
         var add_elip =  $(this).text().trim().substring(0, 65) + "…";
         $(this).text(add_elip);
      }
     
}); 


   $("#bell-count").on('click',function(e){
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');
        
        if(belvalue == ''){
         
          console.log("inactive");
        }else{
          $(".round").css('display','none');
          $("#list").css('display','block');
          
          // $('.message').each(function(){
          // var i = $(this).attr("data-id");
          // ids.push(i);
          
          // });
          //Ajax
          $('.message').click(function(e){
            e.preventDefault();
              $.ajax({
                url:'./connection/deactive.php',
                type:'POST',
                data:{"id":$(this).attr('data-id')},
                success:function(data){
                 
                    console.log(data);
                    location.reload();
                }
            });
        });
     }
   });

   // $('#notify').on('click',function(e){
   //      e.preventDefault();
   //      var rec = $('#recipient').val();
   //      var name = $('#notifications_name').val();
   //      var ins_msg = $('#message').val();
   //      if(!$.trim(name).length > 0 && !$.trim(ins_msg).length > 0 && !$.trim(rec).length > 0){
   //             alert("Please Fill All the fields");

   //      //   var form_data = $('#frm_data').serialize();
   //      // $.ajax({
   //      //   url:'connection/insert.php',
   //      //         type:'POST',
   //      //         data:form_data,
   //      //         success:function(data){
   //      //             location.reload();
   //      //         }
   //      // });
   //      // }else
   //      // {
   //      //   alert("Please Fill All the fields");
   //      }
      
       
   });
});
</script>
</html>