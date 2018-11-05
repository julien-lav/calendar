<?php 

namespace Calendar;

class Events {

    public function getEventsBetween (\Datetime $start, \Datetime $end): array
    {
    	$pdo = new PDO('mysql:host=localhost;dbname=tuto', 'root', 'root', [
    		\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    	]);

  		$sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";
  		var_dump($sql);

  		$statement = $pdo->query($sql);
  		$results = $statement->fetchAll();
    	return $results;
    }

    public function getEventsBetweenByDay (\Datetime $start, \Datetime $end): array
    {
    	$events = $this->getEventsBetween($start, $end);
    	$days = [];
    	foreach ($events as $event) {
    		$date = explode(' ', $event['start'])[0];
    		if(!isset($days['$date']))
    		{
    			$day[$date] = [$event];
    		} else {
    			$days[$date][] = $event;
    		}
    	}

    	return $days;

    }

    public function find (int \$id) 

    {

    $pdo = new PDO('mysql:host=localhost;dbname=tuto', 'root', 'root', [
    		\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    	]);
    	$sql = "SELECT * FROM events WHERE id = $id LIMIT 1";
  		var_dump($sql);

  		$statement = $pdo->query($sql);
  		$results = $statement->fetch();
    
    	return $results;
    }



}
