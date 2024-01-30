<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{route('admin.slider.index')}}"><span class="app-menu__label">Slider Images</span></a>
        <li><a class="app-menu__item active" href="{{route('admin.d_image.index')}}"><span class="app-menu__label">Doctor Images</span></a>
        </li>
        <li><a class="app-menu__item active" href="{{route('admin.sponsor.index')}}"><span class="app-menu__label">Sponsors</span></a>
        <li><a class="app-menu__item active" href="{{route('admin.program.index')}}"><span class="app-menu__label">Tv Programs</span></a>
        <li><a class="app-menu__item active" href="{{route('admin.setting.index')}}"><span class="app-menu__label">Settings</span></a>
        <li><a class="app-menu__item active" href="{{route('admin.language.index')}}"><span class="app-menu__label">Languages</span></a>
        </li>
        <li><a class="app-menu__item active" href="{{route('admin.blogs.index',$lang)}}"><span class="app-menu__label">Blogs</span></a>
        </li>
        <li><a class="app-menu__item active" href="{{route('admin.category.index',$lang)}}"><span
                    class="app-menu__label">Categories</span></a></li>
        <li><a class="app-menu__item active" href="{{route('admin.teams.index',$lang)}}"><span class="app-menu__label">Teams</span></a>
        <li><a class="app-menu__item active" href="{{route('admin.quotes.index',$lang)}}"><span class="app-menu__label">Quotes</span></a>
        <li><a class="app-menu__item active" href="{{route('admin.about_menu.index',$lang)}}"><span class="app-menu__label">About Us Menu</span></a>
        <li><a class="app-menu__item active" href="{{route('admin.about.index',$lang)}}"><span class="app-menu__label">About </span></a>
        <li><a class="app-menu__item active" href="{{route('admin.doctor.index',$lang)}}"><span class="app-menu__label">Head Doctor</span></a>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon bi bi-table"></i><span class="app-menu__label">Tables</span><i
                    class="treeview-indicator bi bi-chevron-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.teams.index',$lang)}}"><i
                            class="icon bi bi-circle-fill"></i> Teams</a></li>
                <li><a class="treeview-item" href="{{route('admin.slider.index')}}"><i
                            class="icon bi bi-circle-fill"></i> Slider Images</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon bi bi-file-earmark"></i><span class="app-menu__label">Pages</span><i
                    class="treeview-indicator bi bi-chevron-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="blank-page.html"><i class="icon bi bi-circle-fill"></i> Blank
                        Page</a></li>
                <li><a class="treeview-item" href="page-login.html"><i class="icon bi bi-circle-fill"></i> Login
                        Page</a></li>
                <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon bi bi-circle-fill"></i>
                        Lockscreen Page</a></li>
                <li><a class="treeview-item" href="page-user.html"><i class="icon bi bi-circle-fill"></i> User Page</a>
                </li>
                <li><a class="treeview-item" href="page-invoice.html"><i class="icon bi bi-circle-fill"></i> Invoice
                        Page</a></li>
                <li><a class="treeview-item" href="page-mailbox.html"><i class="icon bi bi-circle-fill"></i> Mailbox</a>
                </li>
                <li><a class="treeview-item" href="page-error.html"><i class="icon bi bi-circle-fill"></i> Error
                        Page</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon bi bi-code-square"></i><span
                    class="app-menu__label">Docs</span></a></li>
    </ul>
</aside>
