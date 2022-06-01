<?php
header('Content-Type: text/html; charset=UTF-8');

$nameErr = $emailErr = $bioErr = $chickErr="";

$result;

try{
    $errors = FALSE;
    if(isset($_GET['field-name'])){
        $name = $_GET['field-name'];
        $email = $_GET['field-email'];
        $data = $_GET['field-date'];
        $gender = $_GET['radio-gender'];
        $konech = $_GET['radio-konech'];
        $bio = $_GET['biography'];
        $sup = implode(",",$_GET['superpower']);
        if (empty($name)) {
            $nameErr = "Введите имя";
            $errors = TRUE;
        }
        else
            if (!preg_match("/^[a-яA-Я ]*$/",$name)) {
                $nameErr = "Некорректно введено имя";
                $errors = TRUE;
            }
            else{
                //setcookie('name',$name,time()+365*24*60*60);
            }
        if (empty($email)) {
            $emailErr = "Введите Email";
            $errors = TRUE;
        }
        else
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Некорректно введён email";
                $errors = TRUE;
            }
            else{
                //setcookie('email',$email,time()+365*24*60*60);
            }

        if (empty($bio)) {
            $bioErr = "Введите биографию";
            $errors = TRUE;
        }
        else{
            //setcookie('bio',$bio,time()+365*24*60*60);
        }
        if (empty($_GET['chick'])) {
            $chickErr = "Чтобы продолжить, нужно согласиться с условиями";
            $errors = TRUE;
        }

        setcookie('email',$email,time()+365*24*60*60);
        setcookie('name',$name,time()+365*24*60*60);
        setcookie('data',$data,time()+365*24*60*60);
        setcookie('gender',$gender,time()+365*24*60*60);
        setcookie('bio',$bio,time()+365*24*60*60);
        setcookie('konech',$konech,time()+365*24*60*60);

        if (!$errors) {
            $sup= implode(",",$_GET['superpower']);
            $chebox = $_GET['chick'];

            $conn = new PDO("mysql:host=localhost;dbname=u41731", 'u41731', '7439940', array(PDO::ATTR_PERSISTENT => true));

            $user = $conn->prepare("INSERT INTO application SET id = ?,name = ?, email = ?, data = ?, gender = ?, konech = ?, chebox = ?");

            $id_user = $conn->lastInsertId();
            $user -> execute([$id_user, $_GET['field-name'], $_GET['field-email'], date('Y-m-d', strtotime($_GET['field-date'])), $_GET['radio-gender'], $_GET['radio-konech'], $_GET['chick']]);

            $user1 = $conn->prepare("INSERT INTO power SET id = ?, super_name = ?");
            $user1 -> execute([$id_user, $sup]);
            $result = true;
        }
    }
}
catch(PDOException $e){
    echo "$e";
    print('Error : ' . $e->getMessage());
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
    if (isset($result) && $result) {
        include('success.php');
    } else {
        include('form.php'); // Включаем содержимое файла form.php.
    }

    exit();
}

?>