<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title><?php echo $title_for_layout ?></title>
<?php echo $html->meta('favicon.ico', '/favicon.ico', array('type' =>'icon')); ?>
<?php echo $scripts_for_layout ?>
<?php echo $this->Html->css(array('reset', 'style')); ?> 
<?php echo $this->Html->script(array('prototype', 'jscalendar/jscal2', 'jscalendar/lang/en')); ?> 
<?php echo $this->Html->css('jscalendar/jscal2', 'stylesheet'); ?> 
<?php echo $this->Html->css('jscalendar/border-radius', 'stylesheet'); ?> 
</head>

<body>
<div id="content">
<div class="wrapper">
<?php
  echo $this->Session->flash();
  echo $content_for_layout;
?>
</div>
</div>
<?php echo $this->Js->writeBuffer(); ?>
</body>
</html>