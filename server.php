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

// cerchiamo l'indice cliccato e scambiamo la sua proprieta done nel suo contrario
if (isset($_POST['index'])) {
    $list[$_POST['index']]['done'] = !$list[$_POST['index']]['done'];
    file_put_contents('todo-list.json', json_encode($list));
}

// cerchiamo l'indice cliccato e lo eliminiamo
if (isset($_POST['indexToDelete'])) {
    array_splice($list, $_POST['indexToDelete'], 1);
    file_put_contents('todo-list.json', json_encode($list));
}

header('Content-Type: application/json');


// stampo la lista in json
echo json_encode($list);
?>