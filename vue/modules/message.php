<div class="section">
  <div class="container">
    <div class="columns">
      <div class="column">
        <div class="box has-background-light">
          <div class="title">
            <?php echo $message_titre; ?>
          </div>
          <div>
            <?php echo $message_corps . "<br><br>"; ?>
            <?php if (isset($message_url)) { ?>
              <a href="<?php echo $message_url; ?>" class="button is-primary">Ok</a>
            <?php
            } ?>
            <?php if (isset($message_retour)) { ?>
              <a href="<?php echo $message_retour; ?>" class="button">Retour</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>