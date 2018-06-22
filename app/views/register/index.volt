<link href="/phongkham/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="/phongkham/js/bootstrap.min.js"></script>
<script src="/phongkham/js/jquery-3.2.1.min.js"></script>
<script src="/phongkham/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/phongkham/css/loginregis.css">
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<link rel="stylesheet" type="text/css" href="/phongkham/css/main.css">
<script type="text/javascript" src="/phongkham/js/scriptdk.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
  .errorMessage{
    color: red;
  }
  .successMessage{
    color: green;
  }
</style>
<div class="container">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <a href="loginregis">Đăng nhập</a>
              </div>
              <div class="col-xs-6">
                <a href="#" class="active" id="register-form-link">Đăng ký</a>
              </div>
            </div>
            <hr>
            <?php $this->flashSession->output() ?>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="register-form" action="register/register" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Họ tên" value="">
                  </div>
                  <div class="form-group">
                    <input type="date" name="date" id="date" tabindex="1" class="form-control" placeholder="Ngày sinh" value="">
                  </div>
                  <div class="form-group">
                    <input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Địa chỉ" value="">
                  </div>
                   <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Tên đăng nhập" value="">
                  </div>
                  <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Retype Password" name="confirm-password" id="confirm-password" />
            </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Đăng ký ngay">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(function() {

    $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});

  </script>