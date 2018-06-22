<link href="/phongkham/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="/phongkham/css/main.css">
<script src="/phongkham/js/bootstrap.min.js"></script>
<script src="/phongkham/js/jquery-3.2.1.min.js"></script>
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
            <div id="passwordreset" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Đặt lại mật khẩu</div>
                    </div>
                    <div style="text-align: center;"><?php $this->flashSession->output() ?></div>
                                         
                    <div class="panel-body">
                        <form id="forgot-form" action="{{ url('forgotpass/forgotpass') }}" class="form-horizontal" role="form" method= "POST">
                            <div class="form-group">
                                <label for="username" class=" control-label col-sm-5">Tên tài khoản</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="username" placeholder="Nhập tên tài khoản">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class=" control-label col-sm-5">Mật khẩu mới</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class=" control-label col-sm-5">Xác nhận mật khẩu</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="confirmation" placeholder="Xác nhận mật khẩu mới">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Button -->                                 
                                <div class="  col-sm-offset-5 col-sm-7">
                                    <input id="btn-submit" type="submit" class="btn btn-success" name="btn-signup" value="Xác nhận">
                                    <a href="/phongkham/loginregis" style="margin-left:10px;">Quay về</a>
                                </div>                            
                            </div>                             
                        </form>
                    </div>
                </div>
            </div>             
        </div>