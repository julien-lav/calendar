<!DOCTYPE html>
<html>
<head>
	<title>Calendar</title>
	<link rel="stylesheet" type="text/css" href="/ccs/calendar.css">
</head>
<body>

	<?php
	require '../src/Date/Month.php';

	
	try 
	{
	$month = new App\Date\Month($_GET['month'] ? null, $_GET['year']  null);
	}
	catch (\Exception $e)
	{
	$month = new App\Date\Month();
	}
	$start = $month->getStratingDay()->modify('last monday');

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
					?>
				<td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?>">
					<?php if ($i === 0 ); ?>
					<div class="calendar__weekday"><?= $day ;?></div>
				<?php endif; ?>
					<div class="calendar__day"><?= $date->format('d') ;?></div>
				<?php endforeach; >

					<!-- ->format('d') --> 
				</td>

			</tr>

			<?php endfor; ?>
		</table>


</body>
</html>