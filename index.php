<?php 
    include "./inc/connect.php";
    session_start();
    $sql = "SELECT * FROM `emploeers`";
    $result = mysqli_query($connect, $sql);
    
    // Рассчитать общую зарплату
    $totalSalary = 0;
    while ($row = mysqli_fetch_array($result)) {
        $totalSalary += $row['salary'];

    }

    for ($user=array(); $row=$result->fetch_assoc(); $user[]=$row);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель сотрудников xDELTAx</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="head">
                <div class="texts">
                    <h1>Админ панель
                        <?php 
                            if(isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            if(isset($_SESSION['err'])) {
                                echo $_SESSION['err'];
                                unset($_SESSION['err']);
                            }
                        ?>
                    </h1>
                    <div class="other">
                        <h2>Количество сотрудников: <?php echo mysqli_num_rows($result); ?></h2>
                        <h2>Общая зарплата: <?php echo $totalSalary; ?></h2>
                    </div>
                </div>
            </div>
            <div class="bod">
                <?php mysqli_data_seek($result, 0); // Сбросить указатель результата ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="emp">
                        <div class="details">
                            <p><?php echo $row['name']; ?></p>
                            <p>Дата рождения: <span><?php echo $row['date']; ?></span></p>
                            <p>Номер телефона: <?php echo $row['number']; ?></p>
                            <p>Зарплата: <?php echo $row['salary']; ?>$</p>
                        </div>
                        <form action="#" method="GET" class="best">
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <button name="best"><img src="img/star.png" width="20px" alt=""></button>
                            <button name="delete"><img src="img/bad.png" style="width: 25px" alt=""></button>
                            <button class="edit-button" data-id="<?php echo $row['id']; ?>" style="margin-top: 0px; margin-right: 12px; position: relative; left: 5px;" name="edit""><img src="img/edit.png" width="20px" alt=""></button>
                            </form>
                        <?php 
                             if (isset($_GET['delete'])) {
                                $name = $_GET['name'];
                                $sql = "DELETE FROM `emploeers` WHERE `name` = '$name'";
                                $result = mysqli_query($connect, $sql);
                                header("Location: ./index.php");
                            }
                        
                        ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <form method="POST" action="./inc/add.php" class="foot">
            <div class="form-group">
                <input type="text" placeholder="Имя Фамилия" name="name">
            </div>
            <div class="form-group">
                <input type="date" name="birthday">
            </div>
            <div class="form-group">
                <input type="tel" name="phone" placeholder="Номер телефона">
            </div>
            <div class="form-group">
                <input type="number" name="salary" placeholder="Зарплата">
            </div>
            <div class="form-group">
                <input type="submit" name="add" value="Добавить">
            </div>
            <div class="form-group">
                <input type="submit" name="clear" value="Очистить">
            </div>
            <div class="form-group">
                <input type="submit" name="update" value="Обновить">
            </div>
        </form>
    </div>
</div>
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form id="edit-form" method="POST" action="./inc/edit.php" class="modal-form">
            <h2>Редактирование сотрудника</h2>
            <input type="hidden" name="employee_id" id="employee_id">
            <div class="form-group">
                <label for="edit_name">Имя Фамилия:</label>
                <input type="text" id="edit_name" name="edit_name">
            </div>
            <div class="form-group">
                <label for="edit_birthday">Дата рождения:</label>
                <input type="date" id="edit_birthday" name="edit_birthday">
            </div>
            <div class="form-group">
                <label for="edit_phone">Номер телефона:</label>
                <input type="tel" id="edit_phone" name="edit_phone">
            </div>
            <div class="form-group">
                <label for="edit_salary">Зарплата:</label>
                <input type="number" id="edit_salary" name="edit_salary">
            </div>
            <div class="form-group">
                <input type="submit" name="edit_submit" value="Сохранить изменения">
            </div>
        </form>
       
    </div>
</div>
<script src="./js/script.js"></script>
</body>
</html>