<?php
    session_start();
    include "./connect.php";
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $number = $_POST['phone'];
    $salary = $_POST['salary'];

    if (isset($_POST['add'])) {
        $sql = "INSERT INTO `emploeers`(`name`, `date`, `number`, `salary`) VALUES ('$name','$birthday','$number','$salary')";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            $_SESSION['user'] = [
                'name' => $name,
                'birthday' => $birthday,
                'number' => $number,
                'salary' => $salary
            ];
            header("Location: ../index.php");
        } else {
            $_SESSION['error'] = "Something went wrong";
            header("Location: ../index.php");
        }
       
    }
    if (isset($_POST['clear'])) {
        $todb = "DELETE FROM `emploeers`";
        $result = mysqli_query($connect, $todb);
        header("Location: ../index.php");
    }
    if(isset($_POST['update'])) {
        $id = $_POST['employee_id'];
        $sql = "UPDATE `emploeers` SET `name` = '$name', `date` = '$birthday', `number` = '$number', `salary` = '$salary' WHERE `id` = '$id'";
        $result = mysqli_query($connect, $sql);
        header("Location: ../index.php");
    }
?>