@if($lang == "en")
    <li class="@if($page=="home"){{'active'}}@endif"><a href="#home">Home</a></li>
    <li class="@if($page=="introduction"){{'active'}}@endif"><a href="#introduction">Introduction</a></li>
    <li class="@if($page=="industry"){{'active'}}@endif"><a href="#industry">Industry</a></li>
    <li class="@if($page=="events"){{'active'}}@endif"><a href="#events">Events</a></li>
    <li class="@if($page=="Blogs"){{'active'}}@endif"><a href="#blogs">Blogs</a></li>
    <li class="@if($page=="members"){{'active'}}@endif"><a href="#members">Members</a></li>
    <li class="@if($page=="didactics"){{'active'}}@endif"><a href="#didactics">Didactics</a></li>
    <li class="@if($page=="resources"){{'active'}}@endif"><a href="#resources">Resources</a></li>
    <li class="@if($page=="papers"){{'active'}}@endif"><a href="#papers">papers</a></li>
    <li class="@if($page=="gallery"){{'active'}}@endif"><a href="#gallery">Gallery</a></li>
    <li class="@if($page=="contact"){{'active'}}@endif"><a href="#contact">Contact</a></li>
@else
    <li class="@if($page=="home"){{'active'}}@endif"><a href="#home">خانه</a></li>
    <li class="@if($page=="introduction"){{'active'}}@endif"><a href="#introduction">معرفی</a></li>
    <li class="@if($page=="industry"){{'active'}}@endif"><a href="#industry">صنعت</a></li>
    <li class="@if($page=="events"){{'active'}}@endif"><a href="#events">رویدادها</a></li>
    <li class="@if($page=="Blogs"){{'active'}}@endif"><a href="#blogs">بلاگ</a></li>
    <li class="@if($page=="members"){{'active'}}@endif"><a href="#members">اعضا</a></li>
    <li class="@if($page=="didactics"){{'active'}}@endif"><a href="#didactics">آموزشی</a></li>
    <li class="@if($page=="resources"){{'active'}}@endif"><a href="#resources">منابع</a></li>
    <li class="@if($page=="papers"){{'active'}}@endif"><a href="#papers">مقالات</a></li>
    <li class="@if($page=="gallery"){{'active'}}@endif"><a href="#gallery">گالری</a></li>
    <li class="@if($page=="contact"){{'active'}}@endif"><a href="#contact">تماس با ما</a></li>
@endif