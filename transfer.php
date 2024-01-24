
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <style>
    .container
    {
        background-color: #3887d7;
        margin-top:60px;
        margin-left:150px
    }
    input[type=submit]{
        background:rgb(17, 73, 99);
    }
    h1 {
        font-size:50px;
        margin:00px
    }
    body
   {
    background-image: url(transfer.jpg);
    background-repeat: no-repeat;
    background-position: right;
    background-size: 720px;
    background-attachment: fixed;
    background-color: #f1e2f3;
    background-blend-mode: multiply;
}
.head{
       border:2px solid black;
       height:70px;
       
   }


   
    </style>
</head>
<body>
    
<div class="head">
    <h1><I>Transfer your way to success<I></h1>
</div>
<div  class="container">
        
         <form method="post" action="transfer.php" enctype="multipart/form-data">
             <div class="formgrup">
                 <input type="text" name="email" placeholder="Enter e-mail of sender" required>
             </div>
             <div class="formgrup">
                <input type="text" name="name" placeholder="Name of Sender" required>
            </div>
             <div class="formgrup">
                <input type="text" name="email1" placeholder="Enter e-mail of the receiver" required>
            </div>
            <div class="formgrup">
                <input type="text" name="name1" placeholder="Name of the receiver" required>
            </div>
            <div class="formgrup">
                <input type="text" name="amount" placeholder="Amount to transfer">
            </div>
            <div class="formgrup">
            <input type="submit" name="submit" value="submit">
            </div>
         </form>
      </div>
    
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    $con=mysqli_connect('localhost','root','','Bank');

if($con==False){
	echo "connection is not done";
}

    $email= $_POST['email'];
    $name=$_post['name'];
    $email1=$_POST['email1']; 
    $name1=$_post['name1'];
    $amount=$_POST['amount'];
    $sql = "SELECT * from customer WHERE 'Email'='$email'";
    $run = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($run); 
    

    $sql = "SELECT * FROM customer WHERE 'Email'='$email1'";
    $run = mysqli_query($con,$sql);
    $sql2 =mysqli_fetch_array($run);

    if (($amount)<0)
   {
        ?>
        <script>
            alert('Negative Value!! Please enter correct amount');
        </script>
        <?php
    }
     
    else if($amount == 0){
         ?>
        <script>
            alert('Error!!');
        </script>
        <?php

    }
    else {
      
        $newbalance = $sql1['Balance'] - $amount;
        $sql = "UPDATE `Customer` set `Balance`=`Balance`-'$amount' where `Email`= '$email'";
        mysqli_query($con,$sql);
     
        $newbalance = $sql2['Balance'] + $amount;
        $sql = "UPDATE `Customer` set `Balance`=`Balance`+'$amount' where `Email`='$email1'";
        mysqli_query($con,$sql);
        
        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
       $sql = "INSERT INTO `transaction`(`Sender`, `Receiver`, `Balance`) VALUES ('$email','$email1','$amount')";
        $run=mysqli_query($con,$sql);

       if($run==true){
                   ?>
            <script>
            alert('successful');
    </script>
    <?php
            
       }

        $newbalance= 0;
        $amount =0;
}
}


?>

