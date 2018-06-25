<?php
if ($_SESSION['login_us'] == 'ok') {
    ?>
    <section class="mt-4">
        <div class="container margin_t_b_30">
            <div class="row">
                <div class="col-sm-2">
                    <b>Họ và tên</b>
                </div>
                <div class="col-sm-8">
                    <?php if (isset($_GET['section']) && $_GET['section'] == 'name' && isset($_GET['view'])) { ?>
                        <form action="/" method="post">
                            <input type="text" name="name" value="">
                            <br>
                            <input type="hidden" name="id"
                                   value="">
                            <input type="hidden" name="section" value="name">
                            <input type="submit" value="Lưu" class="btn btn-primary mt-3">
                            <a href="" class="btn btn-outline-danger mt-3"
                               onclick="window.history.go(-1); return false;">Hủy</a>

                        </form>
                    <?php } else { ?>
                        <p><?php echo "Nguyen Van A" ?></p>
                    <?php } ?>
                </div>
                <div class="col-sm-2 pull-right">
                    <a href="index.php?page=suaTK&section=name&view">Chỉnh sửa</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-2">
                    <b>Email</b>
                </div>
                <div class="col-sm-8">
                    <?php if (isset($_GET['section']) && $_GET['section'] == 'email' && isset($_GET['view'])) { ?>
                        <form action="" method="post">
                            <input type="text" name="email" value="<?php echo @$user[0]['accounts']['email'] ?>">
                            <br>
                            <input type="hidden" name="id"
                                   value="<?php echo $_SESSION['infoUser']['accounts']['id'] ?>">
                            <input type="hidden" name="section" value="email">
                            <input type="submit" value="Lưu" class="btn btn-primary mt-3">
                            <a href="" class="btn btn-outline-danger mt-3"
                               onclick="window.history.go(-1); return false;">Hủy</a>

                        </form>
                    <?php } else { ?>
                        <p><?php echo "abac@aaa.com" ?></p>
                    <?php } ?>
                </div>
                <div class="col-sm-2 pull-right">
                    <a href="index.php?page=suaTK&section=email&view">Chỉnh sửa</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-2">
                    <b>Số điện thoại</b>
                </div>
                <div class="col-sm-8">
                    <?php if (isset($_GET['section']) && $_GET['section'] == 'phone' && isset($_GET['view'])) { ?>
                        <form action="" method="post">
                            <input type="text" name="phone" value="<?php echo $user[0]['accounts']['phone'] ?>">
                            <br>
                            <input type="hidden" name="id"
                                   value="<?php echo $_SESSION['infoUser']['accounts']['id'] ?>">
                            <input type="hidden" name="section" value="phone">
                            <input type="submit" value="Lưu" class="btn btn-primary mt-3">
                            <a href="" class="btn btn-outline-danger mt-3"
                               onclick="window.history.go(-1); return false;">Hủy</a>
                        </form>
                    <?php } else { ?>
                        <p><?php echo "016222015" ?></p>
                    <?php }
                    ?>
                </div>
                <div class="col-sm-2 pull-right">
                    <a href="index.php?page=suaTK&section=phone&view">Chỉnh sửa</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-2">
                    <b>Mật khẩu</b>
                </div>
                <div class="col-sm-8">
                    <?php if (isset($_GET['section']) && $_GET['section'] == 'password' && isset($_GET['view'])) { ?>
                        <p>Bạn nên sử dụng mật khẩu mạnh mà mình chưa sử dụng ở đâu khác</p>
                        <form action="" method="post">
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    Mật khẩu bạn nhập không chính xác vui lòng nhập lại!!
                                </div>
                            <?php } ?>
                            <input type="hidden" name="id"
                                   value="<?php echo $_SESSION['infoUser']['accounts']['id'] ?>">
                            <input type="hidden" name="section" value="password">
                            <input type="password" name="oldPass" class="oldPass" placeholder="Mật khẩu cũ"
                                   required>
                            <br/>
                            <input type="password" class="newPass mt-1" name="newPass" placeholder="Mật khẩu mới"
                                   required>
                            <br/>
                            <input type="password" class="confirmPass mt-1" name="confirmPass"
                                   placeholder="Mật khẩu nhập lại" onchange="checkPass()" required>
                            <br/>
                            <span class="notice mt-2"></span>
                            <input type="submit" value="Lưu" class="btn btn-primary mt-3 saveData"
                                   onsubmit="checkPass()">
                            <a href="" class="btn btn-outline-danger mt-3"
                               onclick="window.history.go(-1); return false;">Hủy</a>
                        </form>

                    <?php } else { ?>
                        <p>Bạn nên sử dụng mật khẩu mạnh mà mình chưa sử dụng ở đâu khác</p>
                    <?php } ?>
                </div>
                <div class="col-sm-2 pull-right">
                    <a href="index.php?page=suaTK?section=password&view">Chỉnh sửa</a>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <script>
        function checkPass() {
            var oldPass = $('.oldPass').val();
            var newPass = $('.newPass').val();
            var confPass = $('.confirmPass').val();
            if (oldPass != null && newPass != null && confPass != null) {
                if (newPass != confPass) {
                    $('span.notice').append("<div class=\"alert alert-warning\">\n" +
                        "    Mật khẩu mới và mật khẩu nhập lại không trùng nhau" +
                        "  </div>");
                    $('input.saveData').attr("disabled", true);
                }
            } else {
                $('input.saveData').attr("disabled", true);
            }
        }

    </script>
<?php } ?>