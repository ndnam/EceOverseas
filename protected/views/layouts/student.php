<?php
/* @var $this Controller */ 
$action = $this->action->id;
?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span3 first">
        <?php $this->renderPartial('/layouts/_student_left_sidebar'); ?>
    </div>
    
    <div class="span9 last">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>