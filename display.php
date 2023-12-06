<?php

    include ('./connect.php');
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];  
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $image=$_FILES['file'];

        // echo $name;
        // echo '</br>';
        // echo $email;
        // echo '</br>';
        // echo $mobile;
        // echo '</br>';
        // echo $password;
        // echo '</br>';
        // print_r($image);
        // echo '</br>';
        $imagefilename = $image['name'];
        // print_r($imagefilename);
        // echo '</br>';
        $imagefileerror = $image['error'];
        // print_r($imagefileerror);
        // echo '</br>';
        $imagefiletemp = $image['tmp_name'];
        // print_r($imagefiletemp);
        // echo '</br>';

        $filename_separate=explode('.',$imagefilename);
        // print_r($filename_separate);
        // echo '</br>';

        // $file_extension=strtolower($filename_separate[1]);
        // print_r($file_extension);
        // echo '</br>';

        $file_extension=strtolower(end($filename_separate));
        // print_r($file_extension);

        $extension=array('jpeg','jpg','png');
        if(in_array($file_extension, $extension)){
            $upload_image='images/'.$imagefilename;
            move_uploaded_file($imagefiletemp, $upload_image);
            $sql="insert into `account`(name, email, mobile, password, cpassword, image) values('$name', '$email', '$mobile', '$password', '$cpassword', '$upload_image')";
            $result=mysqli_query($con,$sql);
            if($result){
                echo "Data inserted successfully"; // success alert
            }else{
                die(mysqli_error($con));
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3">
    <title>Display Data</title>
</head>
<body>

    <?php

    include 'templates/header.php'; 

    ?>

    <div style="display: flex;justify-content: center; margin:50px 0 90px 0;" class="container">
        <table class="table" id="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Image</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $sql ="Select * from `account`";
                    $result = mysqli_query($con, $sql);

                    if($result){
                        while ($row = mysqli_fetch_assoc($result)) {

                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $mobile= $row['mobile']; 
                            $image = $row['image'];
                           

                            echo '<tr>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$mobile.'</td>
                            <td><img src="'.$image.'"></td>
                           
                            <td>
                            <button class="update"><a href="update.php? updateid='.$id.'">Update</a></button>
                            <button class="delete"><a href="delete.php? deleteid='.$id.'">Delete</a></button>
                            </td>
                            </tr>';
                            
                    }
                }

                ?>
                
            </tbody>
        </table>

    </div>
    <?php

    include 'templates/footer.php'; 

    ?>
</body>
</html>