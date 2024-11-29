    <!--== Footer Area Start ==-->
    <footer id="footer-area">
        <!-- Footer Widget Start -->
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <!-- Single Widget Start -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-widget-wrap">
                            <div class="widgei-body">
                                <div class="footer-about">
                                    <img src="{{ asset('uploads/images/icons/footer.jpg') }}" alt="Logo"
                                        width="150px" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Widget End -->

                    @php
                        $menus = App\Models\Menu::with('subMenus')->get(['id', 'name', 'name_b']);
                    @endphp
                    <!-- Single Widget Start -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-widget-wrap">
                            <h4 class="widget-title">@lang('Useful Link')</h4>
                            <div class="widgei-body">
                                <ul class="footer-list clearfix">
                                    @foreach ($menus as $menu)
                                        @if ($menu->subMenus->count() < 1)
                                            <li><a
                                                    href="{{ route('frontend.menu.show', $menu->id) }}">{{ config('app.locale') == 'en' ? $menu->name : $menu->name_b }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li><a href="index.html">{{ __('index.m-charity') }}</a></li>
                                    <li><a href="index.html">{{ __('index.m-education') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Widget End -->
                    <!-- Single Widget Start -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-widget-wrap">
                            <h4 class="widget-title">@lang('Get In Touch')</h4>
                            <div class="widgei-body">
                                <div class="footer-social-icons">
                                    @foreach ($headers->where('type', 'social') as $header)
                                        <a href="{{ $header->link }}" target="_blank"><i
                                                class="{{ $header->icon }}"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <style>
                            .count p {
                                margin-top: 10px;
                                margin-bottom: -25px;
                                font-size: 20px;
                                color: #fff;
                                font-weight: 600;

                            }
                            .count img {
                                width: 150px;
                            }
                        </style>
                        <div class="count">
                            <p>Visitor Counter</p>
                            <a href='https://www.free-counters.org/'>Hit Counter</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=6b5bd480a5977d18e020ff1f00de19bbe373acb3'></script>
                            <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/1269397/t/1"></script>
                        </div>
                    </div>
                    <!-- Single Widget End -->
                </div>
            </div>
        </div>
        <!-- Footer Widget End -->
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="footer-bottom-text">
                            <p>&copy; {{ __('footer.copy') }}
                                <span class="pull-right">{{ __('footer.developed') }} <a href="http://lscominc.com/">LS
                                        COMMUNICATIONS</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </footer>
    <!--== Footer Area End ==-->
