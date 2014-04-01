<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
                $menuItems = array(
                    array('label' => 'Home', 'url' => array('/site/index')),
                );
                if (Yii::app()->user->isGuest) {
                    array_push($menuItems, array('label'=>'Login', 'url'=>array('/site/login')));
                } else {
                    $user = User::model()->with('student','staff')->findByPk(Yii::app()->user->id);
                    $fullName = $user->accountType == User::TYPE_STUDENT ? $user->student->fullName : $user->staff->fullName;
                    if (strlen($fullName) > 0) 
                        $fullName = '('.$fullName.')';
                    array_push($menuItems,
                        array('label'=>'Projects', 'url'=>array($user->accountType == User::TYPE_STUDENT ? '/student/publicProjects' : 'project/index')),
                        array('label'=>'Profile '.$fullName, 'url'=>array('/user/'.$user->username)),
                        array('label'=>'Logout', 'url'=>array('/site/logout'))
                    );
                }
                $this->widget('zii.widgets.CMenu',array('items'=>$menuItems,)); 
                ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Ndnam.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/script.js')?>
</html>
