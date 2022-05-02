<div class="col-lg-3 col-md-12">
    <aside class="widget-area" id="secondary">


        <section class="widget widget_recent_entries">
            <h3 class="widget-title">الرئيسية</h3>
            <ul>
                <li><a href="{{ route('admin.profile') }}">البروفايل</a></li>
                <li><a href="{{ route('admin.changePassword') }}">تغيير الباسورد</a></li>
                <li><a href="{{ route('admin.settings') }}">الإعدادات</a></li>
                <li><a href="{{ route('admin.logout') }}">خروج</a></li>
            </ul>
        </section>
        <section class="widget widget_recent_comments">
            <h3 class="widget-title">لوحة التحكم</h3>
            <ul>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('admin.dashboard') }}">الإحصائيات</a>
                    </span>
                </li>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('admin.competitions') }}">المسابقات</a>
                    </span>
                </li>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('admin.booking.competition.show') }}">إشتراكات المسابقات</a>
                    </span>
                </li>
            </ul>
        </section>
    </aside>
</div>
