
<?php
foreach(Lesson::getDayList() as $key => $day):
	if(!isset($lessons[$key])) continue;
	$i = 0;
?>
<h3>
	<?php echo $day;?>
</h3>
<table class="items">
	<?php
	foreach($lessons[$key] as $lesson):
		$class = 'blue';
		if($lesson->isFlasher == Lesson::WEEK_TOP)
			$class = 'green';
		if($lesson->isFlasher == Lesson::WEEK_BOTTOM)
			$class = 'yellow';
	?>
		<tr class="<?php echo $class;?>">
			<td>
				<?php echo ++$i;?>
			</td>
			<td>
				<?php echo $lesson->subject->name;?>
				&nbsp;(
				<?php echo Lesson::getTypeList()[$lesson->type];?>
				)
			</td>
			<td>
				<?php echo $lesson->group->name;?>
			</td>
			<td>
				<?php echo $lesson->room->name;?>
			</td>
			<td>
				<?php echo Lesson::getTimeList()[$lesson->time];?>
			</td>
			<td>
				<?php echo Lesson::getIsFlasherList()[$lesson->isFlasher];?>
			</td>
		</tr>
	<?php endforeach;?>
</table>
<?php endforeach;?>

<style>
	table{
		color: #FFFFFF;
	}
	.blue{
		background: #80CFFF;
	}
	.green{
		background: forestgreen;
	}
	.yellow{
		background: #ffdf20;
	}
	table td{
		border: 1px solid #000000;
	}
</style>