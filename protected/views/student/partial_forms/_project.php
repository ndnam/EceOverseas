<?php
/* @var $this StudentController */
/* @var $project Project */

// Retrieve info from session to repopulate the form
$usingPsea = $support = null;
if (isset($_SESSION['Project']) && isset($_SESSION['Project'][$project->id]) && is_array($_SESSION['Project'][$project->id])) {
    foreach ($_SESSION['Project'][$project->id] as $attr => $value) {
        $$attr = $value; //Set value to $usingPsea and $support
    }
}
?>   

<tr>
    <td><input type="checkbox" name="projectId[]" value="<?=$project->id?>" class="cbSelectPrj" <?= $isSelected ? "checked":""?>></td>
    <td><?= $project->title?></td>
    <td><?= $project->description?></td>
    <td><?= $project->location->name?></td>
    <td><?= $project->startDate?></td>
    <td><?= $project->endDate?></td>
    <td><?= $project->teamSize?></td>
    <td><?= $project->deadline?></td>
    <td><input id="Project_<?= $project->id ?>_usingPsea" class="cbPsea" type="checkbox" name="Project[<?= $project->id ?>][usingPsea]" value="1" <?= $isSelected ? '' : 'disabled'?> <?php if ($usingPsea) echo 'checked'; ?>></td>
    <td><textarea id="Project_<?= $project->id ?>_support" class="taSupport" maxlength="500" name="Project[<?= $project->id ?>][support]" style="width:220px" <?= $isSelected ? '' : 'disabled'?>><?= $support ?></textarea></td>
</tr>
    
