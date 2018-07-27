<?php

?>

<!DOCTYPE Html>
    <head>
        <title> CRUD Operation</title>
    </head>
    <body>
        <form action="submitPage.php" method="post">
            <input type="number" name="id" placeholder="Id"><br><br>
            <input type="text" name="fname" placeholder="First Name"><br><br>
            <input type="text" name="lname" placeholder="Last Name"><br><br>
            <input type="number" name="age" placeholder="Age"><br><br>

            <div>
                <input type="submit" name="insert" value="Add">
                <input type="submit" name="update" value="Update">
                <input type="submit" name="delete" value="Delete">
                <input type="submit" name="search" value="Search">
            </div>
        </form>
    </body>