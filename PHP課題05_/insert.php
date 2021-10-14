<?php

// $id = $_POST['id'];
$date = $_POST['date'];
$vs = $_POST['vs'];
$w_l = $_POST['w_l'];
$score = $_POST['score'];
// echo ($date);


// dbconnect
try {
  $pdo = new PDO('mysql:dbname=scoring_machine;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('DBConnectError:' . $e->getMessage());
}

// SQL
$stmt = $pdo->prepare("INSERT INTO `scoring_machine`(id, date, vs, w_l, score) VALUES (NULL,:date,:vs,:w_l,:score)");
// bind
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':vs', $vs, PDO::PARAM_STR);
$stmt->bindValue(':w_l', $w_l, PDO::PARAM_STR);
$stmt->bindValue(':score', $score, PDO::PARAM_STR);

// try
$status = $stmt->execute();

// data regist
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("ErrorMessage:" . $error[2]);
} else {
    header('Location: index.php');
}
