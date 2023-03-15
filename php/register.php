<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    //Database connection
    if(!empty($firstName)|| !empty($lastName) || !empty($gender) || !empty($email) || !empty($password) || !empty($number))
    {
        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword ='';
        $dbname = 'test';

        $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

        if(mysqli_connect_error()){
            die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
        }else{
            $SELECT ="SELECT email From registration Where email= ? Limit 1";
            $INSERT ="INSERT Into registration(firstName,lastName,gender,email,password,number) values(?,?,?,?,?)";

            $stmt=$conn->prepare($SELECT);
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum=$stmt->num_rows;
            if($rnum==0){
                $stmt->close();
                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("sssssi",$firstName,$lastName,$gender,$email,$password,$number);
                $stmt->execute();
                echo "New record inserted successfully";
            }else{
                echo "Someone already using this email";
            }
            $stmt->close();
            $conn->close();
        }
    }else{
        echo "All fields are required";
        die();
    }

?>

