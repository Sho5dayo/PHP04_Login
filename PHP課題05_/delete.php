<?php



require_once('funcs.php');
$pdo = dbConnect();
error_log(var_export("\n" . $_GET, true), 3, 'delete_id.txt');
error_log(var_export("\n" . $_POST, true), 3, 'delete_id.txt');

// $id = $_GET['id'];
$id = $_POST['delete'];


// error_log(var_export("\n" . $column, true), 3, 'delete_id.txt');
// error_log(var_export("\n" . $row, true), 3, 'delete_id.txt');
// error_log(var_export($id, true), 3, 'delete_id.txt');
//２．データ登録SQL作成
$stmt = $pdo->prepare('DELETE
                    FROM
                        scoring_machine
                    WHERE
                        id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($status);
} else {
    redirect('score.php');
}
