<?php
/* @var $this Controller */ 
$action = $this->action->id;
?>
<div id="sidebar-left" class="sidebar well" style="padding: 8px 0;width:240px">
<?php
    $this->widget('bootstrap.widgets.TbMenu', array(
        'type'=>'list',
        'items'=>array(
            array('label'=>'PROJECTS'),
            array('label'=>'Public Projects','icon'=>'list','url'=>Yii::app()->baseUrl.'/student/publicProjects','active'=>$action=='publicprojects'),
            array('label'=>'My Applications','icon'=>'list-alt','url'=>Yii::app()->baseUrl.'/student/applications','active'=>$action=='applications'),
            array('label'=>'Download Declaration Form','icon'=>'download','url'=>Yii::app()->baseUrl.'/site/download?type=public&path=YEP Declaration and Idemnity Form.pdf'),
        ),
    ));
?>
</div><!-- sidebar -->