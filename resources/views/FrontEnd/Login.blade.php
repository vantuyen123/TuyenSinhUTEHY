@extends('FrontEnd.Base')
@section('title','Đăng nhập')
@section('main')
<div id="content">

    <div id="content-main">
        <center>
            <div class="mess">

            </div>
            <div id="login">
                <form method="post">
                    {{csrf_field()}}
                <div class="title">
                    ĐĂNG NHẬP</div>
                <div class="center">
                    <div class="left">
                        Tên đăng nhập:
                    </div>
                    <div class="right">
                        <input name="email" type="text" id="ctl00_ContentPlaceHolder1_Login1_txtUsername" /></div>
                    <div class="left">
                        Mật khẩu:</div>
                    <div class="right">
                        <input name="password" type="password" id="ctl00_ContentPlaceHolder1_Login1_txtPassword" /></div>
                    <div class="left">
                    </div>
                    <div class="right">
                        <button class="btnRegisterCourse" style="height:23px;width:96px;float:left;">
                        Đăng nhập
                        </button>
                    </div>
                    <div class="left">
                    </div>
                    <div class="right">
                        <a id="ctl00_ContentPlaceHolder1_Login1_hplFoget" href="PasswordRecovery.html">Bạn quên mật khẩu?</a>
                    </div>
                    <div class="error">

                    </div>
                </div>
                </form>
            </div>

        </center>
    </div>
    <div id="content-right">
        <div>
            <a title="Hỏi đáp & tư vấn" href="FAQ.html">
                <img alt="" style="width: 100%" src="Images/Design/hoidap.jpg" />
            </a>
        </div>
        <br />

        <div class="block">
            <div class="wrap">

                <h3>
                    LIÊN KẾT WEBSITE</h3>
                <ul class="top">

                    <li><a href='http://utehy.edu.vn/' target="_blank">
                            Trường ĐHSPKT Hưng Yên</a> </li>

                    <li><a href='http://fit.utehy.edu.vn/' target="_blank">
                            Khoa Công nghệ Thông tin</a> </li>

                    <li><a href='http://fee.utehy.edu.vn/' target="_blank">
                            Khoa Điện - Điện tử</a> </li>

                    <li><a href='http://fme.utehy.edu.vn/' target="_blank">
                            Khoa Cơ khí</a> </li>

                    <li><a href='http://khoacokhidongluc.utehy.edu.vn/' target="_blank">
                            Khoa Cơ khí động lực</a> </li>

                    <li><a href='http://khoamay.utehy.edu.vn/' target="_blank">
                            Khoa CN May & Thời trang</a> </li>

                    <li><a href='http://khoakinhte.utehy.edu.vn/' target="_blank">
                            Khoa Kinh tế</a> </li>

                    <li><a href='http://khoahoa.utehy.edu.vn/' target="_blank">
                            Khoa CN Hóa & Môi trường</a> </li>

                    <li><a href='http://spkt.utehy.edu.vn/' target="_blank">
                            Khoa Sư phạm kỹ thuật</a> </li>

                    <li><a href='http://khoangoaingu.utehy.edu.vn/' target="_blank">
                            Khoa Ngoại ngữ</a> </li>

                    <li><a href='http://khoakhcb.utehy.edu.vn/' target="_blank">
                            Khoa Khoa học cơ bản</a> </li>

                    <li><a href='http://khoallct.utehy.edu.vn/' target="_blank">
                            Khoa Lý luận chính trị</a> </li>

                </ul>

            </div>
        </div>


        <div class="block">
            <div class="wrap">
                <h3>
                    LƯỢT TRUY CẬP</h3>
                <center>
                    <div style="padding-top: 10px">
                        <!-- Histats.com  START  (standard)-->
                        <script type="text/javascript">                    document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
                        <a href="http://www.histats.com/" target="_blank" title="free hit counter">
                            <script type="text/javascript">
                                try {
                                    Histats.start(1, 2611237, 4, 203, 118, 65, "00011001");
                                    Histats.track_hits();
                                } catch (err) { };
                            </script>
                        </a>
                        <noscript>
                            <a href="index.blade.php" target="_blank">
                                <img src="../sstatic1.histats.com/09469.gif?2611237&amp;101" alt="free hit counter" border="0"></a></noscript>
                        <!-- Histats.com  END  -->
                    </div>
                </center>
            </div>
        </div>

    </div>
    <div style="clear: both">
    </div>

</div>
    @stop