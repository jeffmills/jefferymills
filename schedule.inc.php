<?php
$con = mysql_connect("localhost", "sevbound_adobe", "adobe9") or die(mysql_error());
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("sevbound_core", $con);	

	$sql = "SELECT * FROM EventSchedule LEFT JOIN Event ON EventSchedule.eventId = Event.eventId";
						$resultAll = mysql_query($sql);
						if (!mysql_query($sql,$con))
						  {
						  die('Error: ' . mysql_error());
						  }
						$numAll=mysql_numrows($resultAll);


						$shedule = array();
						while ($row = mysql_fetch_assoc($resultAll)) {

							// Breakout Sessions
							$sqlBreakout = "SELECT * FROM EventBreakout WHERE eventScheduleId=".$row['eventScheduleId'];
							$breakOutResult = mysql_query($sqlBreakout);
							while($breakOutRow = mysql_fetch_assoc($breakOutResult)){
								$row['breakouts'][] = $breakOutRow;
							}

							//Speakers
							$sqlSpeakers = "SELECT * FROM EventSpeaker WHERE eventScheduleId=".$row['eventScheduleId'];
							$speakersResult = mysql_query($sqlSpeakers);
							while($speakerRow = mysql_fetch_assoc($speakersResult)){
								$row['speakers'][] = $speakerRow;
							}

							$schedule[] = $row;

						}

						$jsonResult = json_encode($schedule);
						echo $_GET['callback'] . "(" . $jsonResult . ");";

						exit;
						
						$eStartDate=mysql_result($resultAll,$i,"startDate");
						$eStopDate=mysql_result($resultAll,$i,"stopDate");
						

echo "<div class='sevenbound_schedule_nav'><a href='#sb_prev' id='sb_prev'></a><div id='sb_nav_date'>$eStartDate</div><a href='#sb_next' id='sb_next'></a></div><div id='sevenbound_schedule_container'><div class='sevenbound_schedule'><table>";
						
							$i=0;
							while($i < $numAll) {
								
								$eScheduleId=mysql_result($resultAll,$i,"eventScheduleId");
								$SchStartTime=mysql_result($resultAll,$i,"startTime");
								$SchStopTime=mysql_result($resultAll,$i,"stopTime");
								$SchTitle=mysql_result($resultAll,$i,"title");
								
								
								$sqlCheckSpeaker = "Select * from EventSpeaker where eventScheduleId=".$eScheduleId;
								$speakerResult = mysql_query($sqlCheckSpeaker);
								if (!mysql_query($sqlCheckSpeaker,$con))
								  {
								  die('Error: ' . mysql_error());
								  }
								  $numSpeakers=mysql_numrows($speakerResult);
								
								
	
								$sqlCheckBreakout = "Select * from EventBreakout where eventScheduleId=".$eScheduleId;
								$breakoutResult = mysql_query($sqlCheckBreakout);
								if (!mysql_query($sqlCheckBreakout,$con))
								  {
								  die('Error: ' . mysql_error());
								  }
								$numBreakout=mysql_numrows($breakoutResult);
								
								
								
							
					echo"<tr><td><span class='time'>$SchStartTime</span> - <span class='time'>$SchStopTime</span></td><td><h1>$SchTitle</h1>";
								
								if ($numSpeakers > 0){
									
									$c=0;
									while ($c < $numSpeakers){
										
										$speakerFName=mysql_result($speakerResult,$c,"firstName");
										$speakerLName=mysql_result($speakerResult,$c,"lastName");
										$speakerTitle=mysql_result($speakerResult,$c,"title");
										
									
								echo	"<div class='sb_scheduled_speaker'><img src='images/speaker_img.png' /><h3>$speakerFName $speakerLName</h3><p>$speakerTitle</p><div class='sb_clear'></div></div>";
									$c++;
									};
								};
								
								if ($numBreakout > 0) {
									
									echo	"
									<ul>";
									
									$d=0;
									while ($d < $numBreakout){
										
										$breakoutName=mysql_result($breakoutResult,$d,"name");
										$breakoutLocation=mysql_result($breakoutResult,$d,"location");
									
									echo	"<li><a href='#'>$breakoutName</a></li>";
									$d++;
									};
									echo	"<div class='sb_clear'></div></ul>";
								};
							echo   "</td></tr>";
							$i++;
							};
							
							
							
					echo"</table></div></div>";

				
?>