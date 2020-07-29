 <!--The following code was taken from W3Schools to establish a connection with a database https://www.w3schools.com/php/php_mysql_intro.asp//-->
 <?php
$servername = 'localhost';
$dbname = 'classicmodels';
$username = 'root';
$password ='';

$conn = mysqli_connect($servername, $username, $password, $dbname);
//The following code was inspired by https://www.w3schools.com/php/php_error.asp to deal with simple error handling
if (!$conn) {
    die("connection failed:". mysqli_connect_error());
}

$flag=0;
//The following code was inspired by https://www.w3schools.com/php/func_var_isset.asp to assign a different variable when clicked.
if(isset($_GET["query1"])){
    $sql = "SELECT * FROM orders WHERE orderNumber = ".$_GET["query1"] .";";
    $result1 = $conn->query($sql);
    $flag=1;

}
    
?>

 <!DOCTYPE html>
 <html>

 <head>
     <title> Orders </title>
     <!--        The styling for the nav bar below was inspired by https://www.w3schools.com/css/css_navbar.asp-->
     <style>
         table,
         th,
         td {
             border: 1px solid black;
             border-collapse: collapse;
             padding: 5px;
             font-family: Arial;
             text-align: center;
             margin: auto;

         }

         th {
             background-color: #9999ff;
             color: white;
             font-family: arial;
         }

         table tr:nth-child(odd) {
             background-color: white;

         }

         table tr:nth-child(even) {
             background-color: whitesmoke;
         }

         h1 {
             font-family: arial;
         }

         h3 {
             font-family: arial;
             text-align: center;

         }

     </style>
 </head>

 <body>
     <h1>Orders</h1>
     <div class="menu">
         <?php include './navagation.php';?>

     </div>
     <!--     creating all three of the tables and their queries inspired by Lecture 15 and https://www.w3schools.com/php/php_mysql_create_table.asp-->
     <?php 
    $sql = "SELECT * from orders where status ='in process'";
    $result = $conn->query($sql);

    print("<h3>Orders In Process</h3><table><tr><th>Order Number</th><th>Date</th><th>Status</th></tr>");
    foreach ($result as $res){
        print("<tr><td><a href=orders.php?query1='".$res["orderNumber"]."'>".$res["orderNumber"]."</a></td><td>".$res["orderDate"]."</td><td>".$res["status"]."</td></tr>");  
    
    }

    print("</table>");
//    flag variable learned from https://www.php.net/manual/en/language.types.boolean.php
    if($flag==1){
        

            print("<table><h3>Order Info</h3><tr><th>Order Number</th><th>Date</th><th>Required Date</th><th>Shipped Date</th><th>Status</th><th>Comments</th>");
    foreach ($result1 as $res){
        print("<tr><td>".$res["orderNumber"]."</td><td>".$res["orderDate"]."</td><td>".$res["requiredDate"]."</td><td>".$res["shippedDate"]."</td><td>".$res["status"]."</td><td>".$res["comments"]."</td></tr>");  
    
    }
    print("</table>");
        
        
    }
     $sql = "SELECT * FROM orders WHERE status ='cancelled'";
    $result = $conn->query($sql);

    print("<h3>Cancelled Orders</h3><table><tr><th>Order Number</th><th>Date</th><th>Status</th></tr>");
    foreach ($result as $res){
    print("<tr><td><a href=orders.php?query1'".$res["orderNumber"]."'>".$res["orderNumber"]."</a></td><td>".$res["orderDate"]."</td><td>".$res["status"]."</td></tr>");  
    
    }
    print("</table>");
    

         $sql = "SELECT * FROM orders ORDER BY orderDate DESC LIMIT 20";
    $result = $conn->query($sql);

    print("<h3>Most Recent Orders</h3><table><tr><th>Order Number</th><th>Date</th><th>Status</th></tr>");
    foreach ($result as $res){
          print("<tr><td><a href=orders.php?query1='".$res["orderNumber"]."'>".$res["orderNumber"]."</a></td><td>".$res["orderDate"]."</td><td>".$res["status"]."</td></tr>");  
    
    }
    print("</table>");
    

    ?>


     <?php
$conn->close();
     //     inclue learned from https://www.w3schools.com/php/php_includes.asp
   include './footer.php';
?>

 </body>

 </html>
