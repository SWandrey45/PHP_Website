<html>
<!--CSS for the navagation bar is inspired from https://www.w3schools.com/css/css_navbar.asp-->

<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            font-family: arial;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }

    </style>

</head>


</html>

<!--code for including the header is inspired from https://www.w3schools.com/php/php_includes.asp-->
<?php
echo '<ul><li><a href="./index.php">Home</a></li> 
<li><a href="./customers.php">Customers</a></li> 
<li><a href="./orders.php">Orders</a></li></ul>';
?>
