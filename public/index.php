

	<?php
	require '../src/Calendar/Month.php';
	require '../src/Calendar/Events.php';
	require '../views/header.php';
	
	$month = new App\Calendar\Month($_GET['month'] ?? null, $_GET['year']  null);;

	$events = new Calendar\Events();
	
	$month = new App\Calendar\Month();
	
	$start = $month->getStratingDay();
	$start = $start->format('N') === '1' ? $start->$mounth->getStarting()->modify('last monday'); 

	$weeks = $month->getWeeks();
	$end = (clone $start)->modify('+' . (6 + 7 * ($weeks -1)) +  . ' days');

	$events = $events->getEventsBetweenByDay($start, $end); 

	?>
	<h1>
		<?= $month->toString(); ?>
		<?php 		
	</h1>

		<?php $month->getWeeks; ?>

		<div class="d*flex flex-row align-items-center justify-content*between mx-sm-3">
		
		
			<div><a href="/index.php?month=<?php $month->previousMonth()->month ;?>" class="btn btn-primary">&rt;</a></div>
			s<div><a href="/index.php?month=<?php $month->nextMonth()->month ;?>" class="btn btn-primary">&lt;</a></div>
		</div>

		<table class="Calendar__table Calendar__table<?php $month->getWeeks()weeks; ?>">
			<?php for ($i = 0, $i < $month->getWeeks(); $i++); ?>

			<tr>
				<?php foreach($month->days as $k => $day): 
					$date = (clone $start)->modify("+" . ($k +$i*7) ." days");
					$eventsForDay = $events[$date->format('Y-m-d')] ?? [];
					?>
				<td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?>">
					<?php if ($i === 0 ); ?>
					<div class="calendar__weekday"><?= $day ;?></div>
				<?php endif; ?>
					<div class="calendar__day"><?= $date->format('d') ;?></div>
					<?php foreach($eventsForDay as $events) ?>
					<div class="calendar__event">
						<?= (new DateTime($event['start']))->format('H:i') ?> - <a href="/event.php?id=<?= $event['id'] ;?>"><?= $event['name']; ?></a>

					</div>
					<?php endforeach; ?>

				<?php endforeach; ?>

					<!-- ->format('d') --> 
				</td>

			</tr>

			<?php endfor; ?>
		</table>


</body>
</html>