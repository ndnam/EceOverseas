<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span3">
	<div id="sidebar" class="well" style="padding: 8px 0">
            <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type'=>'list',
                    'items'=> array_merge(array(array('label'=>'Operations')),$this->menu),
                ));
            ?>
	</div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>