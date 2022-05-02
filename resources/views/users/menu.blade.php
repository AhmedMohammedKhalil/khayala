<div class="col-lg-3 col-md-12">
    <aside class="widget-area" id="secondary">


        <section class="widget widget_recent_entries">
            <h3 class="widget-title">الرئيسية</h3>
            <ul>
                <li><a href="{{ route('user.profile') }}">البروفايل</a></li>
                <li><a href="{{ route('user.changePassword') }}">تغيير الباسورد</a></li>
                <li><a href="{{ route('user.settings') }}">الإعدادات</a></li>
                <li><a href="{{ route('user.logout') }}">خروج</a></li>
            </ul>
        </section>


        <section class="widget widget_recent_comments">
            <h3 class="widget-title">لوحة التحكم</h3>
            <ul>
                <li>
                    <span class="comment-author-link">
                            <a href="#">المشتريات</a>
                    </span>
                </li>

                <li>
                    <span class="comment-author-link">
                        <a href="{{ route('user.booking.trainer.show') }}">حجز مواعيد المدربين</a>
                    </span>
                </li>
                <li>
                    <span class="comment-author-link">
                        <a href="{{ route('user.booking.doctor.show') }}">حجز مواعيد الدكاترة</a>
                    </span>
                </li>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('user.booking.competition.show') }}">إشتراكات المسابقات</a>
                    </span>
                </li>
            </ul>
        </section>
    </aside>
</div>
