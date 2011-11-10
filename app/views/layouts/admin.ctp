<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<?php echo $scripts_for_layout ?>
<?php echo $this->Html->css('default'); ?> 
<?php echo $this->Html->script(array('jscalendar/jscal2', 'jscalendar/lang/en')); ?> 
<?php echo $this->Html->css('jscalendar/jscal2', 'stylesheet'); ?> 
<?php echo $this->Html->css('jscalendar/border-radius', 'stylesheet'); ?> 
</head>
<body>

<?php
  echo $this->element('header');
  echo $this->Session->flash();
  echo $content_for_layout;
?>
<div id="footer"></div>

</body>
</html>