<header>
    <div class="container">
    <div class="logo">
      <a href="<?php echo $BASE; ?>/">SPITDATA</a>
    </div>

    <nav>
      <?php if ($currentPage=='generator'): ?>
        <a href="<?php echo $BASE; ?>/generator" class="active">GUI GENERATOR</a>
        <?php else: ?><a href="<?php echo $BASE; ?>/generator">GUI GENERATOR</a>
      <?php endif; ?>
      <?php if ($currentPage=='api'): ?>
        <a href="<?php echo $BASE; ?>/api" class="active">API DOC</a>
        <?php else: ?><a href="<?php echo $BASE; ?>/api">API DOC</a>
      <?php endif; ?>
    </nav>
    </div>
</header>