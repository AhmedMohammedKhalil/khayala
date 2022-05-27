<div class="col-lg-3 col-md-12">
    <aside class="widget-area" id="secondary">


        <section class="widget widget_recent_entries">
            <h3 class="widget-title">الرئيسية</h3>
            <ul>
                <li><a href="{{ route('trainer.profile') }}">البروفايل</a></li>
                <li><a href="{{ route('trainer.changePassword') }}">تغيير الباسورد</a></li>
                <li><a href="{{ route('trainer.settings') }}">الإعدادات</a></li>
                <li><a href="{{ route('trainer.logout') }}">خروج</a></li>
            </ul>
        </section>


        <section class="widget widget_recent_comments">
            <h3 class="widget-title">لوحة التحكم</h3>
            <ul>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('trainer.products') }}">المنتجات</a>
                    </span>
                </li>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('trainer.works') }}">الأعمال</a>
                    </span>
                </li>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('trainer.orders') }}">طلبات المنتجات</a>
                    </span>
                </li>
                <li>
                    <span class="comment-author-link">
                            <a href="{{ route('trainer.bookings') }}">جدول المواعيد</a>
                    </span>
                </li>
            </ul>
        </section>
    </aside>
</div>
