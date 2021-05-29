<div class="clearfix">
  <div class="hint-text">Total de Registros: <?php echo $totrows; ?></div>
  <ul class="crud-pagination pagination">
    <?php
      if ($page > 1) {
        $prev = $page - 1;
        $classPrev = "class=\"page-item\"";
      } else {
        $classPrev = "class=\"page-item disabled\"";
      } 
    ?>
    <li <?php echo $classPrev ?> ><a href="?page=<?php echo $prev ?>" class="page-item"><i class="material-icons">&#xe5e0;</i></a></li>
      <?php
        for ($i = 1; $i <= $totpages; $i++) {
          $style = "";
          if ($page == $i) {
            $style = "class=\"active page-item\"";
           } else {
            $style = "class=\"page-item\"";
          }
      ?>
    <li <?php echo $style; ?>><a href="index.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
    <?php }; ?>
    <?php
      if ($page < $totpages) {
        $next = $page + 1;
        $classNext = "class=\"page-item\"";
      } else {
        $classNext = "class=\"page-item disabled\"";
      } 
    ?>
    <li <?php echo $classNext; ?> ><a href="?page=<?php echo $next ?>" class="page-item"><i class="material-icons">&#xe5e1;</i></a></li>
  </ul>
</div>


