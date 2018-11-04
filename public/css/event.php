<?php

require '../src/Calendar/Events.php';
require '../views/header.php';

$events = new Calendar\Events();
if (!isset($_GET['id']))
{
	header('location: /404.php');
}

$event = $events->find($_GET['id']);


?>

<h1>
	<?= $event['name']; ?>
</h1>

<ul>
	<li>Date : </li>
	<li></li>
	<li></li>
	<li></li>
</ul>

