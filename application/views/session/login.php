<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SPSU Forager - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet" type="text/css">
  </head>
<body>
  <div align="center">
    <span class="glyphicon glyphicon-ban-circle"></span>
    <br>
    Access Denied.  Refresh to try logging in again.
  </div>
  <div class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" action="Session/login" method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Login to SPSU Forager</h4>
          </div>
          <div class="modal-body">
            <div class="row logo">
              <div class="col-sm-8 col-sm-offset-2">
                <img src="assets/images/logo-lg.jpg" class="img-responsive">
              </div>

            </div>
          <?php if ($this->session->userdata('error')) : ?>
            <div class="alert alert-danger">
              <?php 
                echo $this->session->userdata('error');
                $this->session->unset_userdata('error');
              ?>
            </div>
          <?php endif; ?>
            <div class="form-group">
              <input type="text" name="name" class="form-control input-lg" placeholder="User Name">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-spsu">Login</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  <!-- Bootstrap core JavaScript -->
  <script src="/assets/js/jquery.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {
    $('.modal').modal('show');
  })
  </script>
</body>
</html>