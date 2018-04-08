<?php defined('_JEXEC') or die('Restricted access'); ?>

<script type='text/javascript'>
	function addInput(){
		
		
	}
</script>
 
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <table class="adminform">
        <tr>
            <td width="100" align="right" class="key">
                <label for="TypeReplace">
                    <?php echo JText::_( 'TypeReplace' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="TypeReplace" id="TypeReplace" size="32" maxlength="128" value="<?php echo $this->replacement->TypeReplace;?>" />
            </td>
            <td width="100" align="right" class="key">
                <label>
                    <?php echo JText::_( 'ID' ); ?>:
                </label>
            </td>
            <td>
                <label>
					<?php echo $this->replacement->id;?>
                </label>
            </td>
            <td width="100" align="right" class="key">
                <label>
                </label>
            </td>
            <td>
                <label>
                </label>
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="TargetDate">
                    <?php echo JText::_( 'TargetDate' ); ?>:
                </label>
            </td>
            <td>
                <?php 
				echo JHTML::calendar(($this->replacement->TargetDate == '')? date("Y-m-d") : $this->replacement->TargetDate,'TargetDate', 'TargetDate', '%Y-%m-%d',array('size'=>'8','maxlength'=>'10','class'=>'text_area',));
				?>
            </td>
            <td width="100" align="right" class="key">
                <label for="CreateDateTime">
                    <?php echo JText::_( 'CreateDateTime' ); ?>:
                </label>
            </td>
            <td>
                <label>
                <?php echo $this->replacement->CreateDateTime;?>
                </label>
            </td>
            <td width="100" align="right" class="key">
                <label for="EditDateTime">
                    <?php echo JText::_( 'EditDateTime' ); ?>:
                </label>
            </td>
            <td>
                <label>
                <?php echo $this->replacement->EditDateTime;?>
                </label>
            </td>
        </tr>
    </table>
    <table class="adminform">
    <thead>
        <tr>
            <th width="5">
                <?php echo JText::_( 'ID' ); ?>
            </th>
            <th width="20">
				<input type="checkbox" id="selectallrow" name="toggle" value="" onclick="CheckReplAll(this.checked);" />
            </th>
            <th>
                Nauczyciel nieobecny
            </th>
            <th>
                Klasa
            </th>
            <th>
                Przedmiot
            </th>
            <th>
                Miejsce
            </th>
            <th>
                Godzina
            </th>
            <th>
                Nauczyciel zastępujący
            </th>
            <th width="100" align="right" class="key">
                
            </th>
            <th>
                
            </th>
            <th width="100%">
                
            </th>
        </tr>
    </thead>
	<?php
	$n=count( $this->currenttable );
	$lastid;
	$firstmake = false;
	if($n == 0){
		$firstmake = true;
		$n++;
	};
    for ($i=0, $n; $i < $n; $i++)
    {
        $row =& $this->currenttable[$i];
        $checked    = JHTML::_( 'grid.id', $i, $row->id );
		//isCheckedReplRow
		$currentid = $row->id;
		$lastid = $currentid;
        ?>
        <tr id="<?php echo 'rowselement'.(($firstmake)? '1' : $currentid); /*echo 'rowselement';*/ ?>">
            <td>
                <?php echo (($firstmake)? '1' : $currentid); ?>
            </td>
            <td>
                <?php /*echo $checked;*/ ?>
                <input type="checkbox" class="selectrow" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo (($firstmake)? '1' : $currentid);?>" onclick="isCheckedReplRow(this.checked, this.value);">
            </td>
            <td>
                <?php echo JHTML::_('select.genericlist', $this->teacherslist,'newtable['.$currentid.'][TeacherId]', 'class="inputbox" ','value','text', explode(',', $row->TeacherId));?>
            </td>
            <td>
                <?php echo JHTML::_('select.genericlist', $this->classeslist,'newtable['.$currentid.'][ClassId]', 'class="inputbox" ','value','text', explode(',', $row->ClassId));?>
            </td>
            <td>
                <?php echo JHTML::_('select.genericlist', $this->subjectslist,'newtable['.$currentid.'][SubjectId]', 'class="inputbox" ','value','text', explode(',', $row->SubjectId));?>
            </td>
            <td>
                <?php echo JHTML::_('select.genericlist', $this->placeslist,'newtable['.$currentid.'][PlaceId]', 'class="inputbox" ','value','text', explode(',', $row->PlaceId));?>
            </td>
            <td>
                <?php echo JHTML::_('select.genericlist', $this->hourslist,'newtable['.$currentid.'][HourId]', 'class="inputbox" ','value','text', explode(',', $row->HourId));?>
            </td>
            <td>
                <?php echo JHTML::_('select.genericlist', $this->teacherslist,'newtable['.$currentid.'][TeacherAbsentId]', 'class="inputbox" ','value','text', explode(',', $row->TeacherAbsentId));?>
            </td>
            <!--<td width="100" align="right" class="key">
                <label for="HourVar">-->
                    <?php /*echo JText::_( 'HourVar' );*/ ?>
                <!--</label>
            </td>-->
            <!--<td>
                <input class="text_area" type="text" name="HourVar" id="HourVar" size="32" maxlength="11" value="<?php /*echo $this->replacement->HourVar;*/?>" />
            </td>-->
            <td width="100%">
                
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
	print "
	<script type='text/javascript'>
		//var mojen = ".$n.";
		//if(mojen == 0){
		//	alert('Równe zero');
		//}else{
		//	alert('Nie równe zero');
		//};
		
		
		//for(i=1; i<=itmz.length; i++){
		//	
		//}
		
		
		//itmz.setAttribute('onchange', function(){toggleSelect(transport_select_id);});
		
		function addInput(){
			
			var adminforms = document.getElementsByClassName('adminform');
			var container = adminforms[1].getElementsByTagName('tbody')[0];
			
			
			var itma=container.getElementsByTagName('tr');
			var itmb=itma[itma.length - 1];
			var cln=itmb.cloneNode(true);
			
			container.appendChild(cln);
			
			var itmc = itmb.getElementsByTagName('td');
			
			
			var itmy=container.getElementsByTagName('tr');
			var itmz=itmy[itmy.length - 1].getElementsByTagName('td');
			var itemvalue = itmz[1].getElementsByTagName('input')[0].value;
			itemvalue++;
			itmy[itmy.length - 1].id = 'rowselement' + itemvalue.toString();
			
			//Element nr 1
			var newid = parseInt(itmz[0].innerHTML);
			newid++;
			itmz[0].innerHTML = newid.toString();
			
			//Element nr 2
			var input1 = itmz[1].getElementsByTagName('input')[0];
			input1_id1 = newid;
			input1_id1--;
			input1.id = 'cb' + input1_id1.toString();
			input1.value = newid.toString();
			
			//Element nr 3
			var select1 = itmz[2].getElementsByTagName('select')[0];
			select1.id = 'newtable'+ newid.toString() +'TeacherId';
			select1.setAttribute('name','newtable['+ newid.toString() +'][TeacherId]');
			var select1old = itmc[2].getElementsByTagName('select')[0];
			select1.selectedIndex = select1old.selectedIndex;
			
			//Element nr 4
			var select2 = itmz[3].getElementsByTagName('select')[0];
			select2.id = 'newtable'+ newid.toString() +'ClassId';
			select2.setAttribute('name','newtable['+ newid.toString() +'][ClassId]');
			var select2old = itmc[3].getElementsByTagName('select')[0];
			select2.selectedIndex = select2old.selectedIndex;
			
			//Element nr 5
			var select3 = itmz[4].getElementsByTagName('select')[0];
			select3.id = 'newtable'+ newid.toString() +'SubjectId';
			select3.setAttribute('name','newtable['+ newid.toString() +'][SubjectId]');
			var select3old = itmc[4].getElementsByTagName('select')[0];
			select3.selectedIndex = select3old.selectedIndex;
			
			//Element nr 6
			var select4 = itmz[5].getElementsByTagName('select')[0];
			select4.id = 'newtable'+ newid.toString() +'PlaceId';
			select4.setAttribute('name','newtable['+ newid.toString() +'][PlaceId]');
			var select4old = itmc[5].getElementsByTagName('select')[0];
			select4.selectedIndex = select4old.selectedIndex;
			
			//Element nr 7
			var select5 = itmz[6].getElementsByTagName('select')[0];
			select5.id = 'newtable'+ newid.toString() +'HourId';
			select5.setAttribute('name','newtable['+ newid.toString() +'][HourId]');
			var select5old = itmc[6].getElementsByTagName('select')[0];
			var select5hour = select5old.selectedIndex;
			var select5optlen = select5old.getElementsByTagName('option').length - 1;
			if (select5hour!=null && select5hour>0 && select5hour<select5optlen){
				select5hour++;
			}
			select5.selectedIndex = select5hour;
			
			//Element nr 8
			var select6 = itmz[7].getElementsByTagName('select')[0];
			select6.id = 'newtable'+ newid.toString() +'TeacherAbsentId';
			select6.setAttribute('name','newtable['+ newid.toString() +'][TeacherAbsentId]');
			var select6old = itmc[7].getElementsByTagName('select')[0];
			select6.selectedIndex = select6old.selectedIndex;
		}
		
		function isCheckedReplRow(isitchecked, itvalue){
			var rowchecked = document.getElementById('rowselement' + itvalue);
			var selectrow = document.getElementsByClassName('selectrow');
			var selectallrow = document.getElementById('selectallrow');
			var selectrowstat;
			if (isitchecked){
				rowchecked.className = 'RowsChecked';
				var ilen = 0;
				do{
					selectrowstat = selectrow[ilen].checked;
					ilen++;
				}while(selectrowstat == true && ilen < selectrow.length);
				if(selectrowstat){
					for(i=0; i<selectrow.length; i++){
						selectallrow.checked = true;
					};
				};
			}
			else {
				rowchecked.className = '';
				selectallrow.checked = false;
			}
		}
		function CheckReplAll(isitchecked){
			var contactual = document.getElementsByClassName('adminform')[1].getElementsByTagName('tbody')[0];
			var rowschecked = contactual.getElementsByTagName('tr');
			var selectrow = contactual.getElementsByClassName('selectrow');
			if (isitchecked){
				rowschecked.className = 'RowsChecked';
				for(i=0; i<selectrow.length; i++){
					selectrow[i].checked = true;
				};
			}
			else {
				rowschecked.className = '';
				for(i=0; i<selectrow.length; i++){
					selectrow[i].checked = false;
				};
			}
		}
		function deleteInput(){
			var selectrow = document.getElementsByClassName('selectrow');
			var contactual = document.getElementsByClassName('adminform')[1].getElementsByTagName('tbody')[0];
			var toremove;
			var removenum;
			var notdeleted = false; // Jesli pierwsza linijka (row) jest jedynym pozostajacym to false
			for(i=selectrow.length-1; i>=0; i--){
				if(selectrow[i].checked){
					if(i!=0 || notdeleted){
						removenum = selectrow[i].value;
						toremove = document.getElementById('rowselement' + removenum.toString());
						contactual.removeChild(toremove);
					}else{
						var itmy=contactual.getElementsByTagName('tr');
						var itmz=itmy[0].getElementsByTagName('td');
						
						//Element nr 1
						var newid = 1;
						itmz[0].innerHTML = newid.toString();
						
						//Element nr 2
						var selectallrow = document.getElementById('selectallrow');
						var input1 = itmz[1].getElementsByTagName('input')[0];
						input1_id1 = newid;
						input1_id1--;
						input1.id = 'cb' + input1_id1.toString();
						input1.value = newid.toString();
						input1.checked = false;
						selectallrow.checked = false;
						
						//Element nr 3
						var select1 = itmz[2].getElementsByTagName('select')[0];
						select1.id = 'newtable'+ newid.toString() +'TeacherId';
						select1.setAttribute('name','newtable['+ newid.toString() +'][TeacherId]');
						select1.selectedIndex = '0';
						
						//Element nr 4
						var select2 = itmz[3].getElementsByTagName('select')[0];
						select2.id = 'newtable'+ newid.toString() +'ClassId';
						select2.setAttribute('name','newtable['+ newid.toString() +'][ClassId]');
						select2.selectedIndex = '0';
						
						//Element nr 5
						var select3 = itmz[4].getElementsByTagName('select')[0];
						select3.id = 'newtable'+ newid.toString() +'SubjectId';
						select3.setAttribute('name','newtable['+ newid.toString() +'][SubjectId]');
						select3.selectedIndex = '0';
						
						//Element nr 6
						var select4 = itmz[5].getElementsByTagName('select')[0];
						select4.id = 'newtable'+ newid.toString() +'PlaceId';
						select4.setAttribute('name','newtable['+ newid.toString() +'][PlaceId]');
						select4.selectedIndex = '0';
						
						//Element nr 7
						var select5 = itmz[6].getElementsByTagName('select')[0];
						select5.id = 'newtable'+ newid.toString() +'HourId';
						select5.setAttribute('name','newtable['+ newid.toString() +'][HourId]');
						select5.selectedIndex = '0';
						
						//Element nr 8
						var select6 = itmz[7].getElementsByTagName('select')[0];
						select6.id = 'newtable'+ newid.toString() +'TeacherAbsentId';
						select6.setAttribute('name','newtable['+ newid.toString() +'][TeacherAbsentId]');
						select6.selectedIndex = '0';
					}
				}else{
					notdeleted = true; // Pierwsza linijka (row) jest nie jest jedynym pozostajacym czyli true
				}
			}
		}
	</script>
	";
	?>
    <div onclick="addInput()" style="margin-right: 15px; float:left; cursor: pointer;">
        <div title="Dodaj" style="height: 32px; width: 32px; margin-left:auto; margin-right:auto;" class="icon-32-new"></div>
        <div style="text-align: center;">Dodaj</div>
    </div>
    <div onclick="deleteInput()" style="margin-right: 15px; float:left; cursor: pointer;">
        <div title="Usuń zaznaczone" style="height: 32px; width: 32px; margin-left:auto; margin-right:auto;" class="icon-32-delete"></div>
        <div style="text-align: center;">Usuń zaznaczone</div>
    </div>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="option" value="com_replacements" />
<input type="hidden" name="id" value="<?php echo $this->replacement->id; ?>" />
<input type="hidden" name="CreateDateTime" value="<?php echo $this->replacement->CreateDateTime;?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="replacements" />
</form>