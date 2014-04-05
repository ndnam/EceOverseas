<?php /* @var $this Controller */ 

$student = $this->eagerLoadStudent();
$username = Yii::app()->user->username;
$page = isset($_GET['page']) ? $_GET['page'] : 'general';

?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="span3 first">
	<div id="sidebar" class="well" style="padding: 8px 0; width: 210px">
            <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type'=>'list',
                    'items'=>array(
                        array('label'=>'PROFILE'),
                        array('label'=>'Student Info','icon'=>'list','url'=>Yii::app()->baseUrl.'/user/'.$username,'active'=>$page=='general'),
                        array('label'=>'Medical History','icon'=>'list-alt','url'=>Yii::app()->baseUrl.'/user/'.$username.'?page=medical','active'=>$page=='medical'),
                        array('label'=>'Co-Curriculum activities','icon'=>'list-alt','url'=>Yii::app()->baseUrl.'/user/'.$username.'?page=cca','active'=>$page=='cca'),
                        array('label'=>'Family Details','icon'=>'list-alt','url'=>Yii::app()->baseUrl.'/user/'.$username.'?page=family','active'=>$page=='family'),
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


