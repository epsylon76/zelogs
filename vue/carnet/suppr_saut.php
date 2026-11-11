<div class="container">
  <div class="section">
    <div class="box">
      <p class="title">Supprimer ce saut ?</p>
      <p>
        <?php echo e(date_unix_humain($saut['date'])); ?> &mdash; <?php echo e($saut['lieu']); ?>
        &mdash; <?php echo e($saut['immat']); ?> &mdash; <?php echo (int) $saut['nb']; ?> saut(s)
      </p>
      <br>
      <form method="post" action="zelogsv3.php?page=suppr_saut">
        <?php echo csrf_champ(); ?>
        <input type="hidden" name="element" value="<?php echo (int) $saut['itemid']; ?>">
        <button type="submit" class="button is-danger">Supprimer</button>
        <a href="zelogsv3.php?page=carnet" class="button">Annuler</a>
      </form>
    </div>
  </div>
</div>
