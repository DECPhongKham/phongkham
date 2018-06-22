<link href="/giaodien/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="/giaodien/css/main.css">
<script src="/giaodien/js/bootstrap.min.js"></script>
<script src="/giaodien/js/jquery-3.2.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
            <div id="passwordreset" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Mật khẩu mới</div>
                    </div>                     
                    <div class="panel-body">
                        <form id="signupform" action="<?= $this->url->get('forgotpass/forgotpass') ?>" class="form-horizontal" role="form">
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
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu mới">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Button -->                                 
                                <div class="  col-sm-offset-5 col-sm-7">
                                    <button id="btn-signup" type="button" class="btn btn-success">Xác nhận</button>
                                    <a href="/giaodien/loginregis/loginregis" style="margin-left:10px;">Quay về</a>
                                </div>                            
                            </div>                             
                        </form>
                    </div>
                </div>
            </div>             
        </div>