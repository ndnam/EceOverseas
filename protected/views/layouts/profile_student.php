<?php /* @var $this Controller */ 

$student = ControllerHelper::loadStudent();
$errors = $student->profileErrors;
$username = Yii::app()->user->username;
$page = isset($_GET['page']) ? $_GET['page'] : 'general';

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/validator.js');
?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="span3 first">
	<div id="sidebar-left" class="sidebar well" style="padding: 8px 0; width: 210px">
            <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type'=>'list',
                    'items'=>array(
                        array('label'=>'PROFILE'),
                        array('label'=>'Student Info',
                            'icon'=>'list',
                            'url'=>Yii::app()->baseUrl.'/user/'.$username,
                            'active'=>$page=='general',
                            'itemOptions'=>array('class'=>in_array('student',$errors)?'error':'')),
                        array('label'=>'Medical History',
                            'icon'=>'list-alt',
                            'url'=>Yii::app()->baseUrl.'/user/'.$username.'?page=medical',
                            'active'=>$page=='medical',
                            'itemOptions'=>array('class'=>in_array('medical',$errors)?'error':'')),
                        array('label'=>'Co-Curriculum activities',
                            'icon'=>'list-alt',
                            'url'=>Yii::app()->baseUrl.'/user/'.$username.'?page=cca',
                            'active'=>$page=='cca',
                            'itemOptions'=>array('class'=>in_array('cca',$errors)?'error':'')),
                        array('label'=>'Family Details',
                            'icon'=>'list-alt',
                            'url'=>Yii::app()->baseUrl.'/user/'.$username.'?page=family',
                            'active'=>$page=='family',
                            'itemOptions'=>array('class'=>in_array('family',$errors)?'error':'')),
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
<?php $this->endContent(); ?>

<script>
    initSaveFormConfirmation();
</script>
