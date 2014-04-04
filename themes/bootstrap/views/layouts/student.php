<?php
/* @var $this Controller */ 
$this->menu = array(
    array('label'=>'Public Projects','url'=>Yii::app()->baseUrl.'/student/publicProjects'),
    array('label'=>'My Applications','url'=>Yii::app()->baseUrl.'/student/applications'),
);
?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span2 first">
        <div id="sidebar" class="well" style="padding: 8px 0">
        <?php
            $this->widget('bootstrap.widgets.TbMenu', array(
                'type'=>'list',
                'items'=>array(
                    array('label'=>'PROJECTS'),
                    array('label'=>'Public Projects','icon'=>'list','url'=>Yii::app()->baseUrl.'/student/publicProjects'),
                    array('label'=>'My Applications','icon'=>'list-alt','url'=>Yii::app()->baseUrl.'/student/applications'),
                ),
            ));
        ?>
        </div><!-- sidebar -->
    </div>
    
    <div class="span10 last">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>