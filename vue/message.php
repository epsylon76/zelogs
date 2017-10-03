<div id="page-wrapper">
  <!-- /.row -->
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-<?php echo $message_couleur; ?>">
        <div class="panel-heading">
          <?php echo $message_titre; ?>
        </div>
        <div class="panel-body">
          <?php echo $message_corps."<br><br>"; ?>
          <?php if(isset($message_url))
          {?>
            <a href="<?php echo $message_url; ?>" class="btn btn-lg btn-primary">Ok</a>
            <?php
          } ?>
          <?php if(isset($message_retour))
          {?>
          <a href="<?php echo $message_retour; ?>" class="btn btn-lg btn-default">Retour</a>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
