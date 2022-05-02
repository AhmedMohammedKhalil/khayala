<div class="col-lg-3 col-md-12">
    <aside class="widget-area" id="secondary">


        <section class="widget widget_recent_entries">
            <h3 class="widget-title">الرئيسية</h3>
            <ul>
                <li><a href="{{ route('doctor.profile') }}">البروفايل</a></li>
                <li><a href="{{ route('doctor.changePassword') }}">تغيير الباسورد</a></li>
                <li><a href="{{ route('doctor.settings') }}">الإعدادات</a></li>
                <li><a href="{{ route('doctor.logout') }}">خروج</a></li>
            </ul>
        </section>


        <section class="widget widget_recent_comments">
            <h3 class="widget-title">لوحة التحكم</h3>
            <ul>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('doctor.cases') }}">الحالات</a>
                    </span>
                </li>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('doctor.bookings') }}">طلبات حجز المواعيد</a>
                    </span>
                </li>
            </ul>
        </section>
    </aside>
</div>
