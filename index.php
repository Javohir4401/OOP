<?php

require 'WorkDay.php';

$workDay = new WorkDay();

if (isset($_POST['name']) && isset($_POST['arrived_at']) && isset($_POST['left_at'])) {
    if (!empty($_POST['name']) && !empty($_POST['arrived_at']) && !empty($_POST['left_at'])) {
        $workDay->store($_POST['name'], $_POST['arrived_at'], $_POST['left_at']);
    }
}
$records = $workDay->getWorDayList();


$debt = $workDay->calculateDebtTimeForEachUser();
if (isset($_GET['done']) && !empty($_GET['done'])) {
    $workDay->markAsDone($_GET['done']);
}

require 'view.php';

?>