<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
    <table class="adminlist">
    <thead>
        <tr>
            <th width="5">
                <?php echo JText::_( 'ID' ); ?>
            </th>
            <th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
            </th>
            <th>
                <?php echo JText::_( 'Forename' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Surname' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Subject0' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Subject1' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Subject2' ); ?>
            </th>
            <th>
            </th>
        </tr>            
    </thead>
    <?php
    $k = 0;
    for ($i=0, $n=count( $this->items ); $i < $n; $i++)
    {
        $row =& $this->items[$i];
        $checked    = JHTML::_( 'grid.id', $i, $row->id );
        $link = JRoute::_( 'index.php?option=com_replacements&controller=teachers&task=edit&cid[]='. $row->id );
        ?>
        <tr class="<?php echo "row$k"; ?>">
            <td>
                <?php echo $row->id; ?>
            </td>
            <td>
				<?php echo $checked; ?>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $row->Forename; ?></a>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $row->Surname; ?></a>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $row->Subject0; ?></a>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $row->Subject1; ?></a>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $row->Subject2; ?></a>
            </td>
            <td>
            </td>
        </tr>
        <?php
        $k = 1 - $k;
    }
    ?>
    </table>
</div>
 
<input type="hidden" name="option" value="com_replacements" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="teachers" />
 
</form>