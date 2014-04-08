<?php
/* @var $this Controller */ 
$this->menu = array(
    array('label'=>'Public Projects','url'=>Yii::app()->baseUrl.'/student/publicProjects'),
    array('label'=>'My Applications','url'=>Yii::app()->baseUrl.'/student/applications'),
);
$action = $this->action->id;
?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span3 first">
        <div id="sidebar" class="well" style="padding: 8px 0;width:240px">
        <?php
            $this->widget('bootstrap.widgets.TbMenu', array(
                'type'=>'list',
                'items'=>array(
                    array('label'=>'PROJECTS'),
                    array('label'=>'Public Projects','icon'=>'list','url'=>Yii::app()->baseUrl.'/student/publicProjects','active'=>$action=='publicprojects'),
                    array('label'=>'My Applications','icon'=>'list-alt','url'=>Yii::app()->baseUrl.'/student/applications','active'=>$action=='applications'),
                    array('label'=>'Download Declaration Form','icon'=>'list-alt','url'=>Yii::app()->baseUrl.'/site/download?fname=YEP Declaration and Idemnity Form.pdf'),
                ),
            ));
        ?>
        </div><!-- sidebar -->
    </div>
    
    <div class="span9 last">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>