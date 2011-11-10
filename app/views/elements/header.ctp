<div id="header">
  <div class="wrapper">
    <div class="top">
      <div id="logo">
        <?php echo $this->Html->image("logo_h.png", array("alt" => "FKF League", 'url' => '/')); ?>
      </div>
      <?php if(isset($current_user)) { ?>
        <nav class="account">
          <ul>
            <li><span class="username"><?= $current_user['username']; ?></span></li>
            <li><?php echo $html->link("Account settings", '/users/settings'); ?></li>
            <li><?php echo $html->link("Sign out", '/users/logout'); ?></li>
          </ul>
        </nav>
      <?php } else { ?>
        <nav class="account">
          <ul>
            <li><?php echo $html->link("Sign in", '/users/login'); ?></li>
          </ul>
        </nav>
      <?php } ?>
    </div>
    <?php if(isset($current_user)) { ?>
      <nav class="menu">
        <ul>
          <li><?php echo $html->link("Tournaments", '/tournaments'); ?></li>
          <li><?php echo $html->link("Gamers", '/gamers'); ?></li>
          <li><?php echo $html->link("Teams", '/teams'); ?></li>
        </ul>
      </nav>
    <?php } ?>
  </div>
</div>
