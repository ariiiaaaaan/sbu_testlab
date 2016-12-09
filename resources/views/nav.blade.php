@if($lang == "en")
    <li class="{{$class or ''}}"><a href="{{$preurl}}#home">Home</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#introduction">Introduction</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#industry">Industry</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#events">Events</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#blogs">Blogs</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#members">Members</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#didactics">Didactics</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#resources">Resources</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#researches">papers</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#companies">Partners</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#contact">Contact</a></li>
@else
    <li class="{{$class or ''}}"><a href="{{$preurl}}#home">خانه</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#introduction">معرفی</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#industry">صنعت</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#events">رویدادها</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#blogs">بلاگ</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#members">اعضا</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#didactics">آموزشی</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#resources">منابع</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#researches">مقالات</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#companies">همکاران</a></li>
    <li class="{{$class or ''}}"><a href="{{$preurl}}#contact">تماس با ما</a></li>
@endif