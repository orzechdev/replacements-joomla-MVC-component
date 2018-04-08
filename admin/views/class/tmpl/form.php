<?php defined('_JEXEC') or die('Restricted access'); ?>
 
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="NumClass">
                    <?php echo JText::_( 'NumClass' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="NumClass" id="NumClass" size="32" maxlength="8" value="<?php echo $this->classvar->NumClass;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="TypeClass">
                    <?php echo JText::_( 'TypeClass' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="TypeClass" id="TypeClass" size="32" maxlength="8" value="<?php echo $this->classvar->TypeClass;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="GroupClass">
                    <?php echo JText::_( 'GroupClass' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="GroupClass" id="GroupClass" size="32" maxlength="8" value="<?php echo $this->classvar->GroupClass;?>" />
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="option" value="com_replacements" />
<input type="hidden" name="id" value="<?php echo $this->classvar->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="classes" />
</form>