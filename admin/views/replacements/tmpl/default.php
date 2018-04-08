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
                <?php echo JText::_( 'TypeReplace' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'TargetDate' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'CreateDateTime' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'EditDateTime' ); ?>
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
        $link = JRoute::_( 'index.php?option=com_replacements&controller=replacements&task=edit&cid[]='. $row->id );
        ?>
        <tr class="<?php echo "row$k"; ?>">
            <td>
                <?php echo $row->id; ?>
            </td>
            <td>
				<?php echo $checked; ?>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $row->TypeReplace; ?></a>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $row->TargetDate; ?></a>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $row->CreateDateTime; ?></a>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $row->EditDateTime; ?></a>
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
<input type="hidden" name="controller" value="replacements" />
 
</form>