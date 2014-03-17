<?php
/* @var $this StudentController */
/* @var $project Project */
/* @var $selectedProjects array */
?>   

<tr>
    <td><input type="checkbox" name="projectId[]" value="<?=$project->id?>" 
        <?= in_array($project->id, $selectedProjects) ? "checked":""?>>
    </td>
    <td><?= $project->title?></td>
    <td><?= $project->description?></td>
    <td><?= $project->location->name?></td>
    <td><?= $project->startDate?></td>
    <td><?= $project->endDate?></td>
    <td><?= $project->teamSize?></td>
    <td><?= $project->deadline?></td>
</tr>
    
