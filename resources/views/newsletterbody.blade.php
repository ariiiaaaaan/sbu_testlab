<html>
<head>
    {{--<link rel="stylesheet" type="text/css" href="{{asset('css/newsletter.css')}}"/>--}}
    <style type="text/css">

        a{
            text-decoration: none !important;
            color: #ffffff;
        }

        #main{
            direction:rtl;
            width:100%;
            background-color: #373737;
            text-align: center;
            padding-top: 20px;
            font-family: 'Microsoft Sans Serif', Tahoma, Arial, Verdana, Sans-Serif;
        }

        #main > tbody > tr:nth-child(odd){
            background-color: #0098bf;
            color:#373737;
        }

        #main > tbody > tr:nth-child(even){
            background-color: #373737;
            color:white;
        }

        #footer-main{
            width: 100%;
        }

        #footer-main td{
            width:33%;
        }

        #footer-main tr{
            background-color: #373737;
        }

        table.footer-part{
            font-size: 12px;
            margin: 20px 0;
        }

        table.footer-part td.icon{
            width: 40%;
            text-align: left;
        }

        table.footer-part img{
            width: 32px;
            height: auto;
        }

        table.footer-part td.info{
            text-align: right;
            color: white;
        }

        #footer-center{
            text-align: center;
            color: #ffffff;
            padding: 20px 0;
        }

        #footer-center p{
            line-height: 22px;
        }

        .footer-socials a{
            width: 40px;
            margin: 10px;
        }

        .footer-socials a img{
            width: 40px;
            height: 40px;
        }

        #cards-title{
            width: 100%;
        }

        #cards-title td.before{
            text-align: left;
        }
        #cards-title td.before img{
            transform: scale(-1,1);
        }
        #cards-title td.after{
            text-align: right;
        }
        #cards-title img{
            width: 50px;
            height: auto;
            margin: 20px 20px 20px 40px;
        }
        #cards-title-text{
            text-align: center;
            font-size: 40px;
            color: #373737;
            font-weight: bold;
        }

        .card{
            direction: rtl;
            position: relative;
            display: inline-block;
            background-color: #373737;
            width: 25%;
            margin: 0vh 1%;
            height: 320px;
            box-shadow: 0 0 4px black;
            cursor: pointer;
            overflow: hidden;
        }

        .card h4{
            margin: 5px 0;
            width: 100%;
            padding: 0 20px;
            font-size: 18px;
            line-height: 35px;
            text-align: right;
            height: 35px;
            overflow: hidden;
        }

        .card .card-date{
            color: #cccccc;
            background-color: #000000;
            font-size: 14px;
            line-height: 45px;
            height: 45px;
            width: 100%;
            text-align: right;
        }
        .card .card-date img{
            margin:0 10px 0 20px ;
            width: 40px;
            height: 40px;
            float: right;
            position: relative;
        }

        .card img.card-image{
            width: 100%;
            height: auto;
            position: absolute;
            z-index: 5;
            top: 90px;
            right: 0;
            opacity: 0.95;
            transition: top 1s,opacity .5s;
        }

        .card:hover img.card-image{
            opacity: 0;
            top: 350px;
        }

        .card:hover div.p{
            opacity: 1;
        }

        .card div.p{
            direction: rtl;
            font-size: 14px;
            height: 150px;
            padding: 0 20px 10px;
            text-align: justify;
            line-height: 18px;
            margin-top: 20px;
            overflow: hidden;
            opacity: 0;
            transition: all 1s;
            position: relative;
        }

        .card div.p::after{
            content: "";
            display: block;
            position: absolute;
            bottom: -50px;
            width: 100%;
            height: 100px;
            margin-right: -20px;
            background-image: url(http://ticksoft.sbu.ac.ir/images/fader.png);
            background-repeat: no-repeat;
            background-position: left bottom;
        }

        .card .card-btn{
            text-align: center;
            width: 40%;
            display: block;
            position: relative;
            z-index: 10;
            height: 30px;
            line-height: 30px;
            font-size: 14px;
            margin: 10px auto 10px;
            padding: 0 10px;
            color: #ffffff;
            text-decoration: none;
            background-color: rgba(0,0,0,0.7);
        }

        .card.no-img img.card-image{
            display: none;
        }

        .card.no-img .p{
            opacity: 1;
        }

        .section-btn-all {
            position: relative;
            display: block;
            width: 17%;
            height: 40px;
            line-height: 40px;
            font-size: 16px;
            margin: 20px auto;
            padding: 0 10px;
            color: #ffffff !important;
            text-decoration: none !important;
            background-color: rgba(0,0,0,0.5);
            box-shadow: 0 0 4px black;
            transition: all 1s;
        }

        .section-btn-all:hover {
            background-color: rgba(0,0,0,1);
        }

        .desc{
            position: relative;
            width: 40%;
            margin: 30px 10% 30px 40%;
            padding: 0px;
        }

        .desc.desc-1{
            margin: 10px 40% 10px 10%
        }

        .desc .content{
            position: relative;
            z-index: 10;
            font-size: 22px;
            line-height: 24px;
            transition: all 1s;
            color: white;
        }

        .desc .before{
            position: absolute;
            z-index: 5;
            left: -10px;
            bottom: -20px;
            width: 40px;
        }

        .desc .after{
            position: absolute;
            z-index: 5;
            transform: scale(-1,1);
            right: -15px;
            top: -20px;
            width: 30px;
        }
    </style>
</head>
<body>
<table id="main">
<tbody>
    <tr>
        <td><div>unsubscribe form</div></td>
    </tr>
    <tr>
        <td><div>header</div></td>
    </tr>
    <tr>
        <td><div class="desc-1 desc">
            <img class="before" src="http://demo.ticksoft.sbu.ac.ir/images/bracket.png">
            <div class="content">
                البته میشه از فونت کوچکتر و متن بیشتر استفاده کرد. اینا چزهاییه که باید در موردش صحبت کنیم.
                البته میشه از فونت کوچکتر و متن بیشتر استفاده کرد. اینا چزهاییه که باید در موردش صحبت کنیم.
                البته میشه از فونت کوچکتر و متن بیشتر استفاده کرد. اینا چزهاییه که باید در موردش صحبت کنیم.
            </div>
            <img class="after" src="http://demo.ticksoft.sbu.ac.ir/images/bracket.png">
        </div></td>
    </tr>
    <tr>
        <td><div class="desc-2 desc">
            <img class="before" src="http://demo.ticksoft.sbu.ac.ir/images/bracket.png">
            <div class="content">
                البته میشه از فونت کوچکتر و متن بیشتر استفاده کرد. اینا چزهاییه که باید در موردش صحبت کنیم.
                البته میشه از فونت کوچکتر و متن بیشتر استفاده کرد. اینا چزهاییه که باید در موردش صحبت کنیم.
                البته میشه از فونت کوچکتر و متن بیشتر استفاده کرد. اینا چزهاییه که باید در موردش صحبت کنیم.
            </div>
            <img class="after" src="http://demo.ticksoft.sbu.ac.ir/images/bracket.png">
        </div></td>
    </tr>
    <tr id="cards-tr">
        <td>
            <table id="cards-title">
                <tbody>
                <tr>
                    <td class="before"><img src="http://demo.ticksoft.sbu.ac.ir/images/bracket.png"></td>
                    <td id="cards-title-text">سلام سلام چطوری</td>
                    <td class="after"><img src="http://demo.ticksoft.sbu.ac.ir/images/bracket.png"></td>
                </tr>
                </tbody>
            </table>
            <div>
                <div class="card blog ">
                    <a href="content?id=49">
                        <h4>پروژه مالیاتی از زبان خانم منعمی</h4>
                        <div class="card-date"><img src="http://demo.ticksoft.sbu.ac.ir/images/date-icon.jpg">January 01, 1970</div>
                        <div class="p">
                            <p style="text-align: center;"><strong><span dir="RTL">تعداد زیادی باگ که نیازمندی جدید نامیده می­شود</span></strong></p> <p style="text-align: right;">به علت تجربه، متوجه شدم که این خروجی نرم­افزار مطابق خواسته و نیاز مباحث حسابداری نیست. در صورتی که اسنادی که متاسفانه به طور غیرکامل و متناقض آماده شده است نیز تاییدی بر صحبت­های بنده نیست. بعد از تلاش فراون و صحبت با تحلیل­گر و خبره ماژول، باگی که در حد <span dir="LTR">Critical</span> هست به علت اینکه در اسناد، نقیض آن وجود دارد به عنوان نیازمندی جدید در نظر گرفته می­شود.​​​​​​​</p>
                        </div>
                        <img class="card-image" src="images/blog1.jpg">
                    </a><a href="content?id=49" class="card-btn">مشاهده‌ی مطلب</a>
                </div>
                <div class="card blog  no-img  ">
                    <a href="content?id=49">
                        <h4>پروژه مالیاتی از زبان خانم منعمی</h4>
                        <div class="card-date"><span class="fa fa-calendar fa-2 2x"></span>January 01, 1970</div>
                        <div class="p">
                            <p style="text-align: center;"><strong><span dir="RTL">تعداد زیادی باگ که نیازمندی جدید نامیده می­شود</span></strong></p> <p style="text-align: right;">به علت تجربه، متوجه شدم که این خروجی نرم­افزار مطابق خواسته و نیاز مباحث حسابداری نیست. در صورتی که اسنادی که متاسفانه به طور غیرکامل و متناقض آماده شده است نیز تاییدی بر صحبت­های بنده نیست. بعد از تلاش فراون و صحبت با تحلیل­گر و خبره ماژول، باگی که در حد <span dir="LTR">Critical</span> هست به علت اینکه در اسناد، نقیض آن وجود دارد به عنوان نیازمندی جدید در نظر گرفته می­شود.​​​​​​​</p>
                        </div>
                        <img src="images/service1.png">
                    </a><a href="content?id=49" class="card-btn">مشاهده‌ی مطلب</a>
                </div>
                <div class="card blog  no-img  ">
                    <a href="content?id=49">
                        <h4>پروژه مالیاتی از زبان خانم منعمی</h4>
                        <div class="card-date"><span class="fa fa-calendar fa-2 2x"></span>January 01, 1970</div>
                        <div class="p">
                            <p style="text-align: center;"><strong><span dir="RTL">تعداد زیادی باگ که نیازمندی جدید نامیده می­شود</span></strong></p> <p style="text-align: right;">به علت تجربه، متوجه شدم که این خروجی نرم­افزار مطابق خواسته و نیاز مباحث حسابداری نیست. در صورتی که اسنادی که متاسفانه به طور غیرکامل و متناقض آماده شده است نیز تاییدی بر صحبت­های بنده نیست. بعد از تلاش فراون و صحبت با تحلیل­گر و خبره ماژول، باگی که در حد <span dir="LTR">Critical</span> هست به علت اینکه در اسناد، نقیض آن وجود دارد به عنوان نیازمندی جدید در نظر گرفته می­شود.​​​​​​​</p>
                        </div>
                        <img src="images/service1.png">
                    </a><a href="content?id=49" class="card-btn">مشاهده‌ی مطلب</a>
                </div>
                <a href="contents?type=blogs" class="section-btn-all">مشاهده‌ی تمام بلاگ‌ها</a>
        </div></td>
    </tr>
    <tr>
        <td>
            <table id="footer-main">
                <tr>
                    <td>
                        <table class="footer-part">
                            <tr><td class="icon"><img src="http://demo.ticksoft.sbu.ac.ir/images/time-icon.jpg"></td><td class="info">ساعات کاری<br>شنبه تا چهارشنبه 8 الی 21</td></tr>
                            <tr><td class="icon"><img src="http://demo.ticksoft.sbu.ac.ir/images/tel-icon.jpg"></td><td class="info">+9821------</td></tr>
                        </table>
                    </td>
                    <td id="footer-center">
                        <div class="footer-socials">
                            <a class="fb" href="xx"><img src="http://demo.ticksoft.sbu.ac.ir/images/fb-icon.jpg"></a>
                            <a class="tw" href="xx"><img src="http://demo.ticksoft.sbu.ac.ir/images/tw-icon.jpg"></a>
                            <a class="gp" href="xx"><img src="http://demo.ticksoft.sbu.ac.ir/images/gp-icon.jpg"></a>
                            <a class="ld" href="xx"><img src="http://demo.ticksoft.sbu.ac.ir/images/ld-icon.jpg"></a>
                        </div>
                        <div class="footer-text">
                            <p>دانشگاه شهید بهشتی<br>آزمایشگاه آزمون نرم‌افزار<br>copyright 2016</p>
                        </div>
                    </td>
                    <td>
                        <table class="footer-part">
                            <tr><td class="icon"><img src="http://demo.ticksoft.sbu.ac.ir/images/time-icon.jpg"></td><td class="info">ساعات کاری<br>شنبه تا چهارشنبه 8 الی 21</td></tr>
                            <tr><td class="icon"><img src="http://demo.ticksoft.sbu.ac.ir/images/tel-icon.jpg"></td><td class="info">+9821------</td></tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</tbody>
</table>
</body>
</html>