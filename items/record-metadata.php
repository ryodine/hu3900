<div class="item-records">
    <table>
    <?php foreach ($elementsForDisplay as $setName => $setElements): ?>
        <?php if ($showElementSetHeadings): ?>
        <h2><?php echo html_escape(__($setName)); ?></h2>
        <?php endif; ?>
        <?php foreach ($setElements as $elementName => $elementInfo): ?>
        <tr id="<?php echo text_to_id(html_escape("$setName $elementName"));?>">
            <td><?php echo html_escape(__($elementName)); ?></td>
            <td>
                <?php foreach ($elementInfo['texts'] as $text): ?>
                <div class="element-text five columns omega"><p><?php echo $text; ?></p></div>
                <?php endforeach; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </table>
</div><!-- end element-set -->
