<?php defined('_JEXEC') or die('Restricted access'); ?>
<div id="repl_wrapper" style="padding: 15px;">
<h1 class="repl_h1" style="line-height: 120%; margin: 0;"><?php echo $this->replTitle; ?><p class="repl_p" style="font-size: 50%;"><?php echo $this->replDescription; ?></p></h1>

<?php 
$showRepl = true;
$n=count( $this->nexttable ); 
if($n!=0){
	$showRepl = false;
	?>
	<h2 class="repl_h2" style="line-height: 120%; margin: 30px 0 15px 0;"><?php echo $this->replnextdate.' - '.$this->nextrow->TargetDate; ?></h2>
	<table class="adminform">
    <?php
	$tid = false;
	$cid = false;
	$sid = false;
	$pid = false;
	$hid = false;
	$taid = false;
	?>
    <thead>
		<?php
        for ($j=0, $n; $j < $n; $j++)
        {
            $row =& $this->nexttable[$j];
            if($row->TeacherId != 0){ $tid = true; };
            if($row->ClassId != 0){ $cid = true; };
            if($row->SubjectId != 0){ $sid = true; };
            if($row->HourId != 0){ $hid = true; };
            if($row->PlaceId != 0){ $pid = true; };
            if($row->TeacherAbsentId != 0){ $taid = true; };
        }
        ?>
        <tr>
            <?php if($tid){ ?>
            <th style="padding-right:10px;">
                Nauczyciel nieobecny
            </th>
            <?php }; if($cid){ ?>
            <th style="padding-right:10px;">
                Klasa
            </th>
            <?php }; if($sid){ ?>
            <th style="padding-right:10px;">
                Przedmiot
            </th>
            <?php }; if($hid){ ?>
            <th style="padding-right:10px;">
                Godzina
            </th>
            <?php }; if($pid || $taid){ ?>
            <th>
                Zastępstwo
            </th>
            <?php }; ?>
<!--            <th width="100%">
                
            </th>-->
        </tr>
    </thead>
    <tbody>
		<?php
		$multibool = array();
		for ($i=0, $n; $i < $n; $i++)
        {
			$multibool[$i] = true;
		}
        for ($i=0, $n; $i < $n; $i++)
        {
			$multihour = 0;
			if($multibool[$i] == true){
				$row =& $this->nexttable[$i];
					for($k=$i+1, $n; $k < $n; $k++){
						$rownext =& $this->nexttable[$k];
						if($row->TeacherId==$rownext->TeacherId && $row->ClassId==$rownext->ClassId && $row->SubjectId==$rownext->SubjectId && $row->PlaceId==$rownext->PlaceId && $row->TeacherAbsentId==$rownext->TeacherAbsentId){
							if($row->HourId==$rownext->HourId-1-$multihour){
								$multihour++;
								$multibool[$k] = false;
							}
						};
					};
				
				/*$emptyhour = false;
				if(count($multihour)>1){
					for($j=0; $j<count($multihour)-1; $j++){
						$l=$j+1;
						$o=$j;
						($multihour[$o])? $multilast[$o]=1 : $multilast[$o]=0;
						while($multihour[$o] != $multihour[$l] && $multihour[$o] != false){
							$multilast[$o]++;
							$l++;
							$j++;
						};
					};
					($multihour[count($multihour)-1])? $multilast[count($multihour)-1]=1 : $multilast[count($multihour)-1]=0;
				}else if(count($multihour)=1){
					($multihour[0])? $multilast[0]=1 : $multilast[0]=0;
				}else{
					$emptyhour = true;
				}*/
				
				
				$currentid = $row->id;
				?>
				<tr id="<?php echo 'rowselement'.$currentid; ?>">
					<?php if($tid){ ?>
					<td style="padding-right:10px; padding-top:5px;">
						<?php echo $this->teacherslist[$row->TeacherId];?>
					</td>
					<?php }; if($cid){ ?>
					<td style="padding-right:10px; padding-top:5px;">
						<?php echo $this->classeslist[$row->ClassId];?>
					</td>
					<?php }; if($sid){ ?>
					<td style="padding-right:10px; padding-top:5px;">
						<?php echo $this->subjectslist[$row->SubjectId];?>
					</td>
					<?php }; if($hid){ ?>
					<td style="padding-right:10px; padding-top:5px;">
						<?php
						/*$p = $row->HourId;
						$r = false;
						for($m=0; $m < count($this->hourslist); $m++){
							if($multihour[$m]){
								$p++;
								$r = true;
							}else if($r){
								$m = count($this->hourslist);
							}
						}*/
						if($multihour == 0){
							echo $this->hourslist[$row->HourId];
						}else{
							echo $this->hourslist[$row->HourId].' - '.$this->hourslist[$row->HourId + $multihour];
						}
						?>
					</td>
					<?php }; if($pid || $taid){ ?>
					<td style="padding-top:5px;">
						<?php 
						if($row->PlaceId != 0 && $row->TeacherAbsentId != 0){
							echo $this->teacherslist[$row->TeacherAbsentId].' - '.$this->placeslist[$row->PlaceId];
						}else if($row->PlaceId != 0){
							echo $this->placeslist[$row->PlaceId];
						}else if($row->TeacherAbsentId != 0){
							echo $this->teacherslist[$row->TeacherAbsentId];
						};
						?>
					</td>
					<?php }; ?>
		<!--            <td width="100%">
					</td>-->
				</tr>
				<?php
			}
        }
        ?>
    </tbody>
</table>
<?php
}
$n=count( $this->currenttable );
if($n!=0){
	$showRepl = false;
	?>
	<h2 class="repl_h2" style="line-height: 120%; margin: 30px 0 15px 0;"><?php echo $this->replcurdate.' - '.$this->currentrow->TargetDate; ?></h2>
	<table class="adminform">
    <?php
	$tid = false;
	$cid = false;
	$sid = false;
	$pid = false;
	$hid = false;
	$taid = false;
	?>
    <thead>
		<?php
        for ($j=0, $n; $j < $n; $j++)
        {
            $row =& $this->currenttable[$j];
            if($row->TeacherId != 0){ $tid = true; };
            if($row->ClassId != 0){ $cid = true; };
            if($row->SubjectId != 0){ $sid = true; };
            if($row->HourId != 0){ $hid = true; };
            if($row->PlaceId != 0){ $pid = true; };
            if($row->TeacherAbsentId != 0){ $taid = true; };
        }
        ?>
        <tr>
            <?php if($tid){ ?>
            <th style="padding-right:10px;">
                Nauczyciel nieobecny
            </th>
            <?php }; if($cid){ ?>
            <th style="padding-right:10px;">
                Klasa
            </th>
            <?php }; if($sid){ ?>
            <th style="padding-right:10px;">
                Przedmiot
            </th>
            <?php }; if($hid){ ?>
            <th style="padding-right:10px;">
                Godzina
            </th>
            <?php }; if($pid || $taid){ ?>
            <th>
                Zastępstwo
            </th>
            <?php }; ?>
<!--            <th width="100%">
                
            </th>-->
        </tr>
    </thead>
    <tbody>
		<?php
		$multibool = array();
		for ($i=0, $n; $i < $n; $i++)
        {
			$multibool[$i] = true;
		}
        for ($i=0, $n; $i < $n; $i++)
        {
			$multihour = 0;
			if($multibool[$i] == true){
				$row =& $this->currenttable[$i];
					for($k=$i+1, $n; $k < $n; $k++){
						$rownext =& $this->currenttable[$k];
						if($row->TeacherId==$rownext->TeacherId && $row->ClassId==$rownext->ClassId && $row->SubjectId==$rownext->SubjectId && $row->PlaceId==$rownext->PlaceId && $row->TeacherAbsentId==$rownext->TeacherAbsentId){
							if($row->HourId==$rownext->HourId-1){
								$multihour++;
								$multibool[$k] = false;
							}
						};
					};
				
				/*$emptyhour = false;
				if(count($multihour)>1){
					for($j=0; $j<count($multihour)-1; $j++){
						$l=$j+1;
						$o=$j;
						($multihour[$o])? $multilast[$o]=1 : $multilast[$o]=0;
						while($multihour[$o] != $multihour[$l] && $multihour[$o] != false){
							$multilast[$o]++;
							$l++;
							$j++;
						};
					};
					($multihour[count($multihour)-1])? $multilast[count($multihour)-1]=1 : $multilast[count($multihour)-1]=0;
				}else if(count($multihour)=1){
					($multihour[0])? $multilast[0]=1 : $multilast[0]=0;
				}else{
					$emptyhour = true;
				}*/
				
				
				$currentid = $row->id;
				?>
				<tr id="<?php echo 'rowselement'.$currentid; ?>">
					<?php if($tid){ ?>
					<td style="padding-right:10px; padding-top:5px;">
						<?php echo $this->teacherslist[$row->TeacherId];?>
					</td>
					<?php }; if($cid){ ?>
					<td style="padding-right:10px; padding-top:5px;">
						<?php echo $this->classeslist[$row->ClassId];?>
					</td>
					<?php }; if($sid){ ?>
					<td style="padding-right:10px; padding-top:5px;">
						<?php echo $this->subjectslist[$row->SubjectId];?>
					</td>
					<?php }; if($hid){ ?>
					<td style="padding-right:10px; padding-top:5px;">
						<?php
						/*$p = $row->HourId;
						$r = false;
						for($m=0; $m < count($this->hourslist); $m++){
							if($multihour[$m]){
								$p++;
								$r = true;
							}else if($r){
								$m = count($this->hourslist);
							}
						}*/
						if($multihour == 0){
							echo $this->hourslist[$row->HourId];
						}else{
							echo $this->hourslist[$row->HourId].' - '.$this->hourslist[$row->HourId + $multihour];
						}
						?>
					</td>
					<?php }; if($pid || $taid){ ?>
					<td style="padding-top:5px;">
						<?php 
						if($row->PlaceId != 0 && $row->TeacherAbsentId != 0){
							echo $this->teacherslist[$row->TeacherAbsentId].' - '.$this->placeslist[$row->PlaceId];
						}else if($row->PlaceId != 0){
							echo $this->placeslist[$row->PlaceId];
						}else if($row->TeacherAbsentId != 0){
							echo $this->teacherslist[$row->TeacherAbsentId];
						};
						?>
					</td>
					<?php }; ?>
		<!--            <td width="100%">
					</td>-->
				</tr>
				<?php
			}
        }
        ?>
    </tbody>
</table>
<?php
}
if($showRepl){
	?>
    <h2 class="repl_h2" style="line-height: 120%; margin: 30px 0 15px 0;"><?php echo $this->replInfo; ?></h2>
    <?php
}
?>
</div>