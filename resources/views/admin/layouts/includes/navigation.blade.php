<div class="sidebar"  data-background-color="white">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{ activeNav('admin.dashboard') }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item{{ activeNav(['admin.user.*']) }} ">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-users-cog"></i>
                        <p>Admin</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav(['admin.user.*']) }}" id="base">
                        <ul class="nav nav-collapse">
                            @can('user-manage')
                            <li class="{{ activeSubNav('admin.user.*')}}">
                                <a href="{{ route('admin.user.index') }}">
                                    <span class="sub-item">User</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                @can('header-manage')
                <li class="nav-item {{ activeNav('admin.header.*') }}">
                    <a href="{{ route('admin.header.index') }}">
                        <i class="fa-solid fa-heading"></i>
                        <p>Header</p>
                    </a>
                </li>
                @endcan

                @can('member-manage')
                <li class="nav-item {{ activeNav('admin.member.*') }}">
                    <a href="{{ route('admin.member.index') }}">
                        <i class="fa-solid fa-users"></i>
                        <p>Member</p>
                    </a>
                </li>
                @endcan

                @can('menu-manage')
                <li class="nav-item {{ activeNav('admin.menu.*') }}">
                    <a href="{{ route('admin.menu.index') }}">
                        <i class="fas fa-bars"></i>
                        <p>Menu</p>
                    </a>
                </li>
                @endcan

                @can('slider-manage')
                <li class="nav-item {{ activeNav('admin.slider.*') }}">
                    <a href="{{ route('admin.slider.index') }}">
                        <i class="far fa-images"></i>
                        <p>Slider</p>
                    </a>
                </li>
                @endcan

                @can('profession-manage')
                <li class="nav-item {{ activeNav('admin.profession.*') }}">
                    <a href="{{ route('admin.profession.index') }}">
                        <i class="fa-solid fa-business-time"></i>
                        <p>Profession</p>
                    </a>
                </li>
                @endcan

                @can('gallery-category-manage')
                <li class="nav-item {{ activeNav('admin.gallery-cat.*') }}">
                    <a href="{{ route('admin.gallery-cat.index') }}">
                        <i class="far fa-images"></i>
                        <p>Gallery Category</p>
                    </a>
                </li>
                @endcan

                @can('photo-gallery-manage')
                <li class="nav-item {{ activeNav('admin.photo-gallery.*') }}">
                    <a href="{{ route('admin.photo-gallery.index') }}">
                        <i class="far fa-images"></i>
                        <p>Photo Galleries</p>
                    </a>
                </li>
                @endcan

                @can('video-gallery-manage')
                <li class="nav-item {{ activeNav('admin.video-gallery.*') }}">
                    <a href="{{ route('admin.video-gallery.index') }}">
                        <i class="fas fa-video"></i>
                        <p>Video Galleries</p>
                    </a>
                </li>
                @endcan

                @can('event-manage')
                <li class="nav-item {{ activeNav('admin.event.*') }}">
                    <a href="{{ route('admin.event.index') }}">
                        <i class="fas fa-envelope"></i>
                        <p>Event</p>
                    </a>
                </li>
                @endcan

                @can('message-manage')
                <li class="nav-item {{ activeNav('admin.message.*') }}">
                    <a href="{{ route('admin.message.edit',1) }}">
                        <i class="fas fa-envelope"></i>
                        <p>Message</p>
                    </a>
                </li>
                @endcan

                @can('about-manage')
                <li class="nav-item {{ activeNav('admin.about.*') }}">
                    <a href="{{ route('admin.about.edit',1) }}">
                        <i class="fas fa-info-circle"></i>
                        <p>About</p>
                    </a>
                </li>
                @endcan

                @can('blog-manage')
                <li class="nav-item {{ activeNav('admin.blog.*') }}">
                    <a href="{{ route('admin.blog.index') }}">
                        <i class="fab fa-blogger"></i>
                        <p>Blog</p>
                    </a>
                </li>
                @endcan



                <li class="nav-item {{ activeNav(['admin.role.*','admin.backup.*','admin.visitorInfo.*','admin.permission.*']) }}">
                    <a data-toggle="collapse" href="#settings">
                        <i class="fa-solid fa-gears"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{openNav(['admin.role.*','admin.backup.*','admin.visitorInfo.*','admin.permission.*'])}}" id="settings">
                        <ul class="nav nav-collapse">
                            @canany('role-manage','permission-manage')
                            <li class="{{ activeSubNav('admin.role.*','admin.permission.*')}}">
                                <a href="{{ route('admin.role.index') }}">
                                    <span class="sub-item">@lang('nav.role-permission')</span>
                                </a>
                            </li>
                            @endcanany
                            @canany('backup-manage')
                            <li class="{{ activeSubNav('admin.backup.*')}}">
                                <a href="{{ route('admin.backup.password') }}">
                                    <span class="sub-item">App Backup</span>
                                </a>
                            </li>
                            @endcanany
                            @canany('visitor-manage')
                            <li class="{{ activeSubNav('admin.visitorInfo.*')}}">
                                <a href="{{ route('admin.visitorInfo.index') }}">
                                    <span class="sub-item">Visitor Info</span>
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>


{{--
                <li class="nav-item">
                    <a href="widgets.html">
                        <i class="fas fa-desktop"></i>
                        <p>Widgets</p>
                        <span class="badge badge-success">4</span>
                    </a>
                </li> --}}


                {{-- <li class="nav-item">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-bars"></i>
                        <p>Menu Levels</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a data-toggle="collapse" href="#subnav1">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav1">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-toggle="collapse" href="#subnav2">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Level 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
