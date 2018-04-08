<?php defined('_JEXEC') or die('Restricted access'); ?>
 
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="NumHour">
                    <?php echo JText::_( 'NumHour' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="NumHour" id="NumHour" size="32" maxlength="11" value="<?php echo $this->hour->NumHour;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="StartHour">
                    <?php echo JText::_( 'StartHour' ); ?>:
                </label>
            </td>
            <td style="width:89px; float:left;">
                <input style="height: 25px;" class="text_area" type="number" name="StartH" id="StartH" size="32" min="0" max="23" value="<?php echo date('H', strtotime($this->hour->StartHour));?>" />
                godz.
            </td>
            <td style="width:89px; float:left;">
                <input style="height: 25px;" class="text_area" type="number" name="StartM" id="StartM" size="32" min="0" max="59" value="<?php echo date('i', strtotime($this->hour->StartHour));?>" />
                min.
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="EndHour">
                    <?php echo JText::_( 'EndHour' ); ?>:
                </label>
            </td>
            <td style="width:89px; float:left;">
                <input style="height: 25px;" class="text_area" type="number" name="EndH" id="EndH" size="32" min="0" max="23" value="<?php echo date('H', strtotime($this->hour->EndHour));?>" />
                godz.
            </td>
            <td style="width:89px; float:left;">
                <input style="height: 25px;" class="text_area" type="number" name="EndM" id="EndM" size="32" min="0" max="59" value="<?php echo date('i', strtotime($this->hour->EndHour));?>" />
                min.
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="TypeHour">
                    <?php echo JText::_( 'TypeHour' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="TypeHour" id="TypeHour" size="32" maxlength="128" value="<?php echo $this->hour->TypeHour;?>" />
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="StartHour" id="StartHour" size="32" maxlength="8" value="<?php echo $this->hour->StartHour;?>" />
<input type="hidden" name="EndHour" id="EndHour" size="32" maxlength="8" value="<?php echo $this->hour->EndHour;?>" />
<input type="hidden" name="option" value="com_replacements" />
<input type="hidden" name="id" value="<?php echo $this->hour->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="hours" />
</form>