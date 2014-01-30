<div class="page-header">
  <h1>
    Welcome to the SPSU Forager!
    <small>Use the options below to get started</small>
  </h1>
</div>
<?php if ($alert) :?>
<div class="alert alert-<?php echo $alert->type;?>">
  <?php echo $alert->message; ?>
</div>
<?php endif; ?>

<?php if ($this->session->userdata('rank') == 1) : ?>
<div class="row">
  <div class="col-sm-3 col-sm-offset-1">
    <a 
      href="Scan/start" 
      class="btn btn-block btn-lg btn-success"
      <?php if ($scanInProgress) echo 'disabled'; ?>>
      <span class="btn-text">Start Scan</span>
      <span class="glyphicon glyphicon-search"></span>
    </a>
  </div>
  <div class="col-sm-3">
    <a 
      href="Scan/cancel" 
      class="btn btn-block btn-lg btn-danger"
      <?php if (!$scanInProgress) echo 'disabled'; ?>>
      <span class="btn-text">Cancel Scan</span>
      <span class="glyphicon glyphicon-remove"></span>
    </a>
  </div>
  <div class="col-sm-3">
    <a href="#" class="btn btn-block btn-lg btn-warning" disabled>
      <span class="btn-text">Settings</span>
      <span class="glyphicon glyphicon-cog"></span>
    </a>
  </div>
</div>
<?php endif; ?>
<div class="row">
  <div class="col-sm-9 col-sm-offset-1">
    <a href="#" class="btn btn-block btn-lg btn-info" disabled>
      <span class="btn-text">View Reports</span>
      <span class="glyphicon glyphicon-list-alt"></span>
    </a>
  </div>
</div>