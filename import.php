<?php
use SimpleExcel\SimpleExcel;

if(isset($_POST['import'])){

if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){
    require_once('SimpleExcel/SimpleExcel.php');

    $excel = new SimpleExcel('csv');

    $excel->parser->loadFile($_FILES['excel_file']['name']);

    $foo = $excel->parser->getField();

    $count = 1;
    $db = mysqli_connect('localhost','root','','exceltest');

    while(count($foo)>$count){
        $roll = $foo[$count][0];
        $name = $foo[$count][1];
        $email = $foo[$count][2];
        $mobile = $foo[$count][3];

        $query = "INSERT INTO students (roll_no,name,mobile,email) ";
        $query.="VALUES ('$roll','$name','$mobile','$email')";
        mysqli_query($db,$query);
        $count++;
    }

    echo "<script>alert('updated');</script>";
    header("location:index.php");
}
}
?>
