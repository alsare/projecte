<h1><a href= <?=$_SERVER['PHP_SELF']?>>Projecte J-Suite</a></h1>
<?php My\Helpers::flash("Required name is empty");?>
<?php $flash = My\Helpers::flash(); ?>
<?php if (!empty($flash)): ?>
<div class="flash">
   <ul>
       <?php foreach ($flash as $msg): ?>
       <li class="flash__message"><?= $msg ?></li>
       <?php endforeach; ?>
   </ul>
</div>
<?php endif; ?>
