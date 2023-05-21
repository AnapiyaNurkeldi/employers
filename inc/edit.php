<?php 
            session_start();
            include './connect.php';
            if (isset($_POST['edit_submit'])) {
                $name = $_POST['edit_name'];
                $birthday = $_POST['edit_birthday'];
                $phone = $_POST['edit_phone'];
                $salary = $_POST['edit_salary'];
                $id = $_POST['employee_id'];
                $sql = "UPDATE `emploeers` SET `name` = '$name', `date` = '$birthday', `number` = '$phone', `salary` = '$salary' WHERE `id` = '$id'";
                $result = mysqli_query($connect, $sql);
                header("Location: ../index.php");
            } else {
                header("Location: ../index.php");
                $_SESSION['err'] = 'Здесь какая то ошибка, повторите позже';
            }
        ?>