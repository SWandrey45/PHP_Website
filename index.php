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
if(isset($_GET["query"])){
    $sql = "SELECT * FROM products WHERE productLine = ". $_GET["query"] .";";
    $bigresult = $conn->query($sql);
    $flag=1;

}
    
?>

 <!DOCTYPE html>
 <html>


 <head>
     <title> Classic Models </title>
     <!--        The styling for the nav bar below was inspired by https://www.w3schools.com/css/css_navbar.asp-->
     <style>
         table,
         th,
         td {
             border: 1px solid black;
             border-collapse: collapse;
             padding: 10px;
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
     <h1>Classic Models Products</h1>
     <div class="menu">

         <?php include './navagation.php';?>
         <div id="Pinfo">
         </div>
     </div>
     <!--The floolowing code to connect to a database with PHP was taken from https://www.w3schools.com/php/php_mysql_connect.asp-->
     <?php 
    $sql = "SELECT productLine, textDescription from productlines";
    $result = $conn->query($sql);
    print("<table><h3>Products</h3><tr><th>Product Line</th><th>Description</th></tr>");
//        Understanding of the foreach loop from https://www.w3schools.com/php/php_looping_foreach.asp
    foreach ($result as $res){
        print('<tr><td><a href=.\?query=\'');
        $var = str_replace(' ',"%20",$res["productLine"]);
        print($var);
        print('\'>');
        print($res["productLine"]);
        print("</a></td><td>");
        print($res["textDescription"]."</td></tr>");
    
    }
    print("</table>");
    
    if($flag==1){
 // creating the tables inspired by Lecture 15 and https://www.w3schools.com/php/php_mysql_create_table.asp 
            print("<table><tr><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Scale</th><th>Vendor</th><th>Decription</th><th>Quantity in Stock</th><th>Price</th><th>MSRP</th></tr>");
    foreach ($bigresult as $res){
        print("<tr><td>".$res["productCode"]."</td><td>".$res["productName"]."</td><td>".$res["productLine"]."</td><td>".$res["productScale"]."</td><td>".$res["productVendor"]."</td><td>".$res["productDescription"]."</td><td>".$res["quantityInStock"]."</td><td>".$res["buyPrice"]."</td><td>".$res["MSRP"]."</td></tr>");  
    
    }
    print("</table>");
        
        
    }
    
    ?>


     <?php
$conn->close();
//     inclue learned from https://www.w3schools.com/php/php_includes.asp
   include './footer.php';
?>

 </body>

 </html>
