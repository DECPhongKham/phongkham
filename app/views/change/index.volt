<link href="/giaodien/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="/giaodien/js/bootstrap.min.js"></script>
<script src="/giaodien/js/jquery-3.2.1.min.js"></script>
<script src="/giaodien/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/giaodien/css/loginregis.css">
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<link rel="stylesheet" type="text/css" href="/giaodien/css/main.css">
<script type="text/javascript" src="/giaodien/js/scriptdk.js"></script>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
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
              <div class="col-xs-12">
                <a href="#" class="active" id="register-form-link">Đổi mật khẩu</a>
              </div>
            </div>
            <hr>
            <div class="col-lg-12">
            <?php $this->flashSession->output() ?>
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="register-form" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Họ tên" value="<?php echo $hoten; ?>" disabled="disabled">
                  </div>
                   <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Tên đăng nhập" value="<?php echo $user; ?>" disabled="disabled">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mật khẩu cũ" name="old-password" id="password" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mật khẩu mới" name="password" id="password" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="confirm-password" id="confirm-password" />
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                     
                        <input type="submit" name="submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Cập nhật">                        
                      </div>
                      <div class="col-sm-6 col-sm-offset-5">
                      <a href="/phongkham/dashboard/dashboard" style="text-align: center;">Quay về</a>
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
