<?php defined('_JEXEC') or die('Restricted access'); ?>
 
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="Forename">
                    <?php echo JText::_( 'Forename' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="Forename" id="Forename" size="32" maxlength="64" value="<?php echo $this->teacher->Forename;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="Surname">
                    <?php echo JText::_( 'Surname' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="Surname" id="Surname" size="32" maxlength="64" value="<?php echo $this->teacher->Surname;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="Subject0">
                    <?php echo JText::_( 'Subject0' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="Subject0" id="Subject0" size="32" maxlength="128" value="<?php echo $this->teacher->Subject0;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="Subject1">
                    <?php echo JText::_( 'Subject1' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="Subject1" id="Subject1" size="32" maxlength="128" value="<?php echo $this->teacher->Subject1;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="Subject2">
                    <?php echo JText::_( 'Subject2' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="Subject2" id="Subject2" size="32" maxlength="128" value="<?php echo $this->teacher->Subject2;?>" />
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="option" value="com_replacements" />
<input type="hidden" name="id" value="<?php echo $this->teacher->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="teachers" />
</form>