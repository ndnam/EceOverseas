<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->registerBootstrapCss(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
</head>

<body>

<?php 
    if (Yii::app()->user->isGuest) {
        $menuItems = array(array('label'=>'Login', 'url'=>array('/site/login')));
    } else {
        $user = User::model()->with('student','staff')->findByPk(Yii::app()->user->id);
        $fullName = $user->accountType == User::TYPE_STUDENT ? $user->student->fullName : $user->staff->fullName;
        if (strlen($fullName) > 0) 
            $fullName = '('.$fullName.')';
        $menuItems = array(
            array('label'=>'Projects', 'url'=>array($user->accountType == User::TYPE_STUDENT ? '/student/publicProjects' : 'project/index'),'active'=>  in_array($this->uniqueid,['student','project'])),
            array('label'=>'Profile '.$fullName, 'url'=>array('/user/'.$user->username),'active'=> strpos(Yii::app()->request->requestUri,'user/'.Yii::app()->user->username) !== FALSE),
            array('label'=>'Logout', 'url'=>array('/site/logout'))
        );
    }
    $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>$menuItems,
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
//                        'homeLink'=>'<a href="' . Yii::app()->baseUrl . '"><i class="icon-home"></i> Home</a>',
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- page -->

</body>
<?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/script.js')?>
</html>
