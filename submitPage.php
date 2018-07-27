<?php
    //post values
    function getPosts()
    {
        $posts = array();

        $posts[0] = $_POST['id'];
        $posts[1] = $_POST['fname'];
        $posts[2] = $_POST['lname'];
        $posts[3] = $_POST['age'];

        return $posts;
    }

    //database
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "crudDb";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try
    {
        $connect = mysqli_connect($host,$user,$password,$database);
    } 
    catch(Exception $ex)
    {
        echo 'Error';
    }


    //search
    if(isset($_POST['search']))
    {
        $data = getPosts();
        
        $search_Query = "SELECT * FROM user WHERE id = $data[0]";

        $search_Result = mysqli_query($connect, $search_Query);

        if($search_Result)
        {
            if(mysqli_num_rows($search_Result)>0)
            {
                while($row=mysqli_fetch_array($search_Result))
                {
                    

                    echo "<table border=1>";

                    echo "<tr>";
                    echo "<th>"."Id"."</th>";
                    echo "<th>"."First Name"."</th>";
                    echo "<th>"."Last Name"."</th>";
                    echo "<th>"."Age"."</th>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['fname']."</td>";
                    echo "<td>".$row['lname']."</td>";
                    echo "<td>".$row['age']."</td>";
                    echo "</tr>";

                    echo "</table>";

                    echo "<br><br><br>";
                }
            }
            else{
                echo 'no data found';
            }
        } 
    } //search ends

    //insert
    if(isset($_POST['insert']))
    {
        $data= getPosts();
        $insert_Query="INSERT INTO `user`(`id`,`fname`,`lname`,`age`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";

        try{
            $insert_Result = mysqli_query($connect, $insert_Query);

            if($insert_Result)
            {
                if(mysqli_affected_rows($connect)>0)
                {
                    echo 'data inserted';
                }else{
                    echo 'data not inserted';
                }
            }

        }catch(Exception $ex)
        {
            echo 'Error Insert '.$ex->getMessage();
        }
    } //insert ends

    //delete
    if(isset($_POST['delete']))
    {
        $data= getPosts();
        $delete_Query="DELETE FROM user WHERE id = $data[0]";

        try{
            $delete_Result = mysqli_query($connect, $delete_Query);

            if($delete_Result)
            {
                if(mysqli_affected_rows($connect)>0)
                {
                    echo 'data deleted';
                }else{
                    echo 'data not deleted';
                }
            }

        }catch(Exception $ex)
        {
            echo 'Error Delete '.$ex->getMessage();
        }
    } //delete ends


    //update
    if(isset($_POST['update']))
    {
        $data= getPosts();
        $update_Query="UPDATE `user` SET `fname`='$data[1]', `lname`='$data[2]', `age`='$data[3]' WHERE `id` = '$data[0]'";

        try{
            $update_Result = mysqli_query($connect, $update_Query);

            if($update_Result)
            {
                if(mysqli_affected_rows($connect)>0)
                {
                    echo 'data updated';
                }else{
                    echo 'data not updated';
                }
            }

        }catch(Exception $ex)
        {
            echo 'Error Update '.$ex->getMessage();
        }
    } //delete ends
?>
