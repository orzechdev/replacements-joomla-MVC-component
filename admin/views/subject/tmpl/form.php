<?php defined('_JEXEC') or die('Restricted access'); ?>
 
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="NameSubject">
                    <?php echo JText::_( 'NameSubject' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="NameSubject" id="NameSubject" size="32" maxlength="128" value="<?php echo $this->subject->NameSubject;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="GroupSubject">
                    <?php echo JText::_( 'GroupSubject' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="GroupSubject" id="GroupSubject" size="32" maxlength="128" value="<?php echo $this->subject->GroupSubject;?>" />
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="option" value="com_replacements" />
<input type="hidden" name="id" value="<?php echo $this->subject->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="subjects" />
</form>