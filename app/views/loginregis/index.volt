<link href="/phongkham/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="/phongkham/js/bootstrap.min.js"></script>
<script src="/phongkham/js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/phongkham/css/loginregis.css">
<link rel="stylesheet" type="text/css" href="/phongkham/css/main.css">
<!------ Include the above in your HEAD tag ---------->
      <style type="text/css">
        .errorMessage{
          color: red;
        }
      </style>
<div class="container">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <a href="#" class="active" id="login-form-link">Đăng nhập</a>
              </div>
              <div class="col-xs-6">
                <a href="register">Đăng ký</a>
              </div>
            </div>
            <hr>
            <?php $this->flashSession->output() ?>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="{{ url('loginregis/loginregis') }}" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Tên đăng nhập" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mật khẩu">
                  </div>
                  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Ghi nhớ</label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Đăng nhập">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="text-center">
                          <a href="forgotpass" tabindex="5" class="forgot-password">Quên mật khẩu?</a>
                        </div>
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
  