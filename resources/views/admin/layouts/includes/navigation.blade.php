<div class="sidebar" data-background-color="white">
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
                @if (user()->permission == 1)
                    @php
                        $admin = ['admin.user.*', 'admin.profession.*'];
                    @endphp
                    <li class="nav-item{{ activeNav($admin) }} ">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-users-cog"></i>
                            <p>Admin</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ openNav($admin) }}" id="base">
                            <ul class="nav nav-collapse">
                                {{-- @can removed --}}
                                    <li class="{{ activeSubNav('admin.user.*') }}">
                                        <a href="{{ route('admin.user.index') }}">
                                            <span class="sub-item">User</span>
                                        </a>
                                    </li>
                                {{-- @endcan removed --}}
                                {{-- @can removed --}}
                                    <li class="{{ activeSubNav('admin.profession.*') }}">
                                        <a href="{{ route('admin.profession.index') }}">
                                            <span class="sub-item">Profession</span>
                                        </a>
                                    </li>
                                {{-- @endcan removed --}}
                            </ul>
                        </div>
                    </li>

                    {{-- @can removed --}}
                        <li class="nav-item {{ activeNav('admin.header.*') }}">
                            <a href="{{ route('admin.header.index') }}">
                                <i class="fa-solid fa-heading"></i>
                                <p>Header</p>
                            </a>
                        </li>
                    {{-- @endcan removed --}}

                    {{-- @can removed --}}
                        <li class="nav-item{{ activeNav(['admin.member.*']) }} ">
                            <a data-toggle="collapse" href="#member">
                                <i class="fas fa-users-cog"></i>
                                <p>Member</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ openNav(['admin.member.*']) }}" id="member">
                                <ul class="nav nav-collapse">
                                    <li class="{{ activeSubNav(['admin.member.index', 'admin.member.edit']) }}">
                                        <a href="{{ route('admin.member.index') }}">
                                            <span class="sub-item">Member Manage</span>
                                        </a>
                                    </li>
                                    <li class="{{ activeSubNav('admin.member.create') }}">
                                        <a href="{{ route('admin.member.create') }}">
                                            <span class="sub-item">Add New Member</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- <li class="nav-item {{ activeNav('admin.member.*') }}">
                        <a href="{{ route('admin.member.index') }}">
                            <i class="fa-solid fa-users"></i>
                            <p>Member</p>
                        </a>
                    </li> --}}
                    {{-- @endcan removed --}}

                    {{-- @can removed --}}
                        <li class="nav-item {{ activeNav('admin.menu.*') }}">
                            <a href="{{ route('admin.menu.index') }}">
                                <i class="fas fa-bars"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                    {{-- @endcan removed --}}

                    {{-- @can removed --}}
                        <li class="nav-item {{ activeNav('admin.slider.*') }}">
                            <a href="{{ route('admin.slider.index') }}">
                                <i class="far fa-images"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                    {{-- @endcan removed --}}
                @endif


                @php
                    $gallery = ['admin.gallery-cat.*', 'admin.photo-gallery.*', 'admin.video-gallery.*'];
                @endphp
                <li class="nav-item {{ activeNav($gallery) }}">
                    <a data-toggle="collapse" href="#gallery">
                        <i class="far fa-images"></i>
                        <p>Gallery</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav($gallery) }}" id="gallery">
                        <ul class="nav nav-collapse">
                            {{-- @can removed --}}
                                <li class="{{ activeSubNav('admin.gallery-cat.*') }}">
                                    <a href="{{ route('admin.gallery-cat.index') }}">
                                        <span class="sub-item">Category</span>
                                    </a>
                                </li>
                            {{-- @endcan removed --}}any
                            {{-- @canany removed --}}
                                <li class="{{ activeSubNav('admin.photo-gallery.*') }}">
                                    <a href="{{ route('admin.photo-gallery.index') }}">
                                        <span class="sub-item">Photo</span>
                                    </a>
                                </li>
                            {{-- @endcan removed --}}any
                            {{-- @canany removed --}}
                                <li class="{{ activeSubNav('admin.video-gallery.*') }}">
                                    <a href="{{ route('admin.video-gallery.index') }}">
                                        <span class="sub-item">Video</span>
                                    </a>
                                </li>
                            {{-- @endcan removed --}}any
                        </ul>
                    </div>
                </li>

                {{-- @can removed --}}
                    <li class="nav-item {{ activeNav('admin.event.*') }}">
                        <a href="{{ route('admin.event.index') }}">
                            <i class="fas fa-envelope"></i>
                            <p>Event</p>
                        </a>
                    </li>
                {{-- @endcan removed --}}
                @if (user()->permission == 1)
                    {{-- @can removed --}}
                        <li class="nav-item {{ activeNav('admin.message.*') }}">
                            <a href="{{ route('admin.message.edit', 1) }}">
                                <i class="fas fa-envelope"></i>
                                <p>Message</p>
                            </a>
                        </li>
                    {{-- @endcan removed --}}

                    {{-- @can removed --}}
                        <li class="nav-item {{ activeNav('admin.about.*') }}">
                            <a href="{{ route('admin.about.edit', 1) }}">
                                <i class="fas fa-info-circle"></i>
                                <p>About</p>
                            </a>
                        </li>
                    {{-- @endcan removed --}}
                @endif
                {{-- @can removed --}}
                    <li class="nav-item {{ activeNav('admin.blog.*') }}">
                        <a href="{{ route('admin.blog.index') }}">
                            <i class="fab fa-blogger"></i>
                            <p>Blog</p>
                        </a>
                    </li>
                {{-- @endcan removed --}}
                {{-- @can removed --}}
                    <li class="nav-item {{ activeNav('admin.blog.*') }}">
                        <a href="{{ route('admin.humanitarian-assistance.index') }}">
                            <i class="fab fa-blogger"></i>
                            <p>Humanitarian Assistance</p>
                        </a>
                    </li>
                {{-- @endcan removed --}}

                <li class="nav-item {{ activeNav('admin.literatures.*') }}">
                    <a href="{{ route('admin.literatures.index') }}">
                        <i class="fa-solid fa-book"></i>
                        <p>Literature</p>
                    </a>
                </li>

                {{-- <li
                    class="nav-item {{ activeNav(['admin.role.*', 'admin.backup.*', 'admin.visitorInfo.*', 'admin.permission.*']) }}">
                    <a data-toggle="collapse" href="#settings">
                        <i class="fa-solid fa-gears"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ openNav(['admin.role.*', 'admin.backup.*', 'admin.visitorInfo.*', 'admin.permission.*']) }}"
                        id="settings">
                        <ul class="nav nav-collapse">
                                <li class="{{ activeSubNav('admin.backup.*') }}">
                                    <a href="{{ route('admin.backup.password') }}">
                                        <span class="sub-item">App Backup</span>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </li> --}}

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