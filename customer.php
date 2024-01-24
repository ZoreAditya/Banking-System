<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <style>
    .tab
   { width:80%;
    height: 50%;
     border: 2;
     margin-top:px;
     border:black;
   }
   .btn{
    margin: 10px;
    width:220px;
    height:50px;
    font-size:20px;
    margin-left:200px;
    background-color:rgb(227 145 255);

        }
   .bt{
    margin: 30px;
    width:210px;
    height:50px;
    font-size:20px;
    background-color:rgb(227 145 255);

     }
   .btn:hover{
   background-color:#3887d7;
   }
   .bt:hover{
   background-color:#3887d7;
   }
   body
   {
    background-image: url("cusrtomer.jpg");
    background-repeat: no-repeat;
    background-size: 600px;
    background-color: #f3f396;
    background-blend-mode: multiply;
    background-position: right;
    background-attachment: fixed;
    background-position-y: 170px;
 
    

   }
   table td{
       border:2px solid black;
       padding: 15px;
   }
   table th{

       border:2px solid black;
       padding: 10px;
       background-color: #3887d7;
   }
   table{
    background-color:white;
   }
   h1{
       
       font-size:32px;
       text-align: center;
   }
   .head{
       border:2px solid black;
   }
   
</style>
</head>
<body>
<div class="head">
<h1>Customer Details</h1>
</div>

<div class="tab">
<table width="50%" style="margin-top:30px; margin-left:200px; border:2px solid black">
<tr style="background-color:#9fc5ed; color:#fff;">
<tr class="row">
<th>Id</th>
<th>Customer name</th>
<th>E-mail Id</th>
<th>Balance</th>
</tr>
<?php
$con=mysqli_connect('localhost','root','','bank');

if($con==False){
	echo "connection is not done";
}
$sql="SELECT * FROM `customer`";
$run = mysqli_query($con,$sql);
if(mysqli_num_rows($run)<1)
{
    echo "<tr><td>No Records Found</td></tr>";
 }
else
{
    $count=0;
    while($data=mysqli_fetch_assoc($run))
    {    $count++;
    
        ?>
    <tr align="center">
    <td> <?php echo $data['Id']; ?></td>
    <td><?php echo $data['Name']; ?></td>
    <td><?php echo $data['Email']; ?></td>
    <td><?php echo $data['Balance']; ?></td>
    </tr>
    <?php
    
    
}
}

?>
</table>
</div>
<div class="content">
        <a href="transfer.php"><button class="btn"><b>Make a Transaction</b></button></a>
        <a href="history.php"><button class="bt"><b>View History</b></button></a>
</div>
</body>
</html>
