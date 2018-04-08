<?php defined('_JEXEC') or die('Restricted access'); ?>
 
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="NamePlace">
                    <?php echo JText::_( 'NamePlace' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="NamePlace" id="NamePlace" size="32" maxlength="128" value="<?php echo $this->place->NamePlace;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="NumPlace">
                    <?php echo JText::_( 'NumPlace' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="NumPlace" id="NumPlace" size="32" maxlength="11" value="<?php echo $this->place->NumPlace;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="FloorPlace">
                    <?php echo JText::_( 'FloorPlace' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="FloorPlace" id="FloorPlace" size="32" maxlength="11" value="<?php echo $this->place->FloorPlace;?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key">
                <label for="AddressPlace">
                    <?php echo JText::_( 'AddressPlace' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="AddressPlace" id="AddressPlace" size="32" maxlength="128" value="<?php echo $this->place->AddressPlace;?>" />
            </td>
        </tr>
    </table>
    </fieldset>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="option" value="com_replacements" />
<input type="hidden" name="id" value="<?php echo $this->place->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="places" />
</form>