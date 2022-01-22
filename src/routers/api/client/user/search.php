<?php

if (!isset($_POST['user'], $_POST['type'])) {
    echo json_encode(array('status' => false, 'error' => 'Invalid request'));
    exit;
}

try {
    $Execute = new $InitD["Users"]["Responsive"];
    $ExecuteSearch = $Execute->searchUser($_POST);
    if ($ExecuteSearch) {
        echo json_encode(array('status' => true, 'id' => $ExecuteSearch["player_id"]));
    } else {
        echo json_encode(array('status' => false, 'msg' => 'User not found'));
    }
    exit;
} catch (Exception $e) {
    echo json_encode(array('status' => false, 'msg' => 'Erro interno'));
    exit;
}
