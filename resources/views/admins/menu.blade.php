<div class="col-lg-3 col-md-12">
    <aside class="widget-area" id="secondary">


        <section class="widget widget_recent_entries">
            <h3 class="widget-title">Main</h3>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.profile') }}">Profile</a></li>
                <li><a href="{{ route('admin.changePassword') }}">Change Password</a></li>
                <li><a href="{{ route('admin.settings') }}">Settings</a></li>
                <li><a href="{{ route('admin.logout') }}">Log Out</a></li>
            </ul>
        </section>


        <section class="widget widget_recent_comments">
            <h3 class="widget-title">Dashboard</h3>
            <ul>
                <li>
                    <span class="comment-author-link">
                            <a href="#">Competitions</a>
                    </span> 
                </li>
                <li>
                    <span class="comment-author-link">
                            <a href="#">User Reservatins</a>
                    </span> 
                </li>
            </ul>
        </section>
    </aside>
</div>