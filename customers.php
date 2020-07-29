<html>

<head>
    <!--        The styling for the nav bar below was inspired by https://www.w3schools.com/css/css_navbar.asp-->
    <style>
        table,

        th,

        td {

            border:

                1px solid black;

            border-collapse:

                collapse;

            padding:

                5px;

            font-family:

                Arial;

            text-align:

                center;

            margin:

                auto;

        }

        th {

            background-color:

                #9999ff;

            color:

                white;

            font-family:

                arial;

        }

        table tr:nth-child(odd) {

            background-color:

                white;

        }

        table tr:nth-child(even) {

            background-color:

                whitesmoke;

        }

        h1 {

            font-family:

                arial;

        }

        h3 {

            font-family:

                arial;

            text-align:

                center;

        }

    </style>
</head>

<body>
    <h1>Customer List</h1>
    <div class="menu">
        <!--The following code was taken from W3Schools to establish a connection with a database https://www.w3schools.com/php/php_mysql_intro.asp//-->
        <?php include './navagation.php';?>
    </div>
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
// creating the tables inspired by Lecture 15 and https://www.w3schools.com/php/php_mysql_create_table.asp 
$sql = "SELECT customerName, country, city, phone FROM customers ORDER BY country";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Customers By Country</h3><table><tr><th>Customer Name</th><th>Country</th><th>City</th><th>phone</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["customerName"]."</td><td>".$row["country"]."</td><td>".$row["city"]."</td><td>".$row["phone"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
    //     inclue learned from https://www.w3schools.com/php/php_includes.asp
   include './footer.php';
?>
</body>

</html>
