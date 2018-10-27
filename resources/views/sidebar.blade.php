<!-- Sidebar -->
<nav id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <div class="side-header side-content bg-white-op">
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>
                <a class="h5 text-white" href="index.html">
                    <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">
                    {{ config('app.name', 'Laravel') }}
                    </span>
                </a>
            </div>
            <div class="side-content side-content-full">
                <ul class="nav-main">
                    <li>
                        <a class="active" href="{{ route('home') }}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-film"></i><span class="sidebar-mini-hide">Manage Movies</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('movie_add') }}"><i class="fa fa-plus"></i> Add Movie</a>
                            </li>
                            <li>
                                <a href="{{ route('movie_manage') }}"><i class="fa fa-edit"></i> Manage Movie</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-desktop"></i><span class="sidebar-mini-hide">Manage Screen</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('screen_add') }}"><i class="fa fa-plus"></i> Add Screen</a>
                            </li>
                            <li>
                                <a href="{{ route('screen_manage') }}"><i class="fa fa-edit"></i> Manage Screen</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-clock-o"></i><span class="sidebar-mini-hide">Manage Show</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('show_add') }}"><i class="fa fa-plus"></i> Add Show</a>
                            </li>
                            <li>
                                <a href="{{ route('show_manage') }}"><i class="fa fa-edit"></i> Manage Show</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-film"></i><span class="sidebar-mini-hide">Upcoming Movies</span></a>
                        <ul>
                            <li>
                                <a href="base_ui_widgets.html"><i class="fa fa-plus"></i> Add Movie</a>
                            </li>
                            <li>
                                <a href="base_ui_widgets.html"><i class="fa fa-minus"></i> Remove Movie</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="base_pages_dashboard.html"><i class="fa fa-comments"></i><span class="sidebar-mini-hide">Feedbacks</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- <li>
    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Chat</a>
    <ul>
        <li>
            <a href="base_ui_chat_full.html">Full</a>
        </li>
        <li>
            <a href="base_ui_chat_fixed.html">Fixed</a>
        </li>
        <li>
            <a href="base_ui_chat_popup.html">Popup</a>
        </li>
    </ul>
</li> -->