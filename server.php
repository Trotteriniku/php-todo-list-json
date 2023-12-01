<?php


$filecontent = file_get_contents("todo-list.json");






// decodifico la stringa in un array php
$list = json_decode($filecontent, true);


// pushiamo l'oggetto task precedentemente preso nella action "addTask"
if (isset($_POST['task'])) {
    $newtask = [
        "name" => $_POST['task'],
        "done" => false
    ];

    array_push($list, $newtask);
    file_put_contents('todo-list.json', json_encode($list));
}



header('Content-Type: application/json');


// stampo la lista in json
echo json_encode($list);
?>