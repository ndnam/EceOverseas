<?php
/* @var $this StudentController */
/* @var $student Student */
/* @var $form CActiveForm */
?>

<h1>Application Summary</h1>

<h3>Student information</h3>
<table>
        <?php 
            foreach ($student->attributes as $name=>$value) {
                echo '<tr>';
                echo '<th>' . $student->getAttributeLabel($name) .'</th>';
                echo '<td>' . $value . '</td>';
                echo '</ts>';
            }
        ?>
</table>

<h3>... put everything else here</h3>

<form action="" method="POST">
    <input type="hidden" name="save" value="1">
        <input type="submit" value="Back" name="btnBack" id="btnBack" step="6">
    <?= CHtml::submitButton('Finish') ?>
</form>