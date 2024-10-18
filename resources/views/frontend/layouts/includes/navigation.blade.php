 {{-- <!--== Header Area Start ==--> --}}
 <header id="header-area">
     <div class="preheader-area">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-sm-7 col-7">
                     <div class="preheader-left">
                         @foreach ($headers->where('type', 'text') as $header)
                             <a><i class="{{ $header->icon }}" aria-hidden="true"></i> {{ $header->content }}</a>
                         @endforeach
                     </div>
                 </div>

                 <div class="col-lg-6 col-sm-5 col-5 text-right">
                     <div class="preheader-right">
                         <ul>
                             <li class="nav-item">
                                 <a class="nav-link" href="" data-toggle="modal"
                                     data-target="#loginModal">@lang('index.h-login')</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('frontend.register.index') }}">@lang('index.h-member')</a>
                             </li>
                             @if (config('app.locale') == 'en')
                                 <li class="nav-item">
                                     <a class="nav-link" href="/locale/bn">Bangla</a>
                                 </li>
                             @else
                                 <li class="nav-item">
                                     <a class="nav-link" href="/locale/en">English</a>
                                 </li>
                             @endif
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="header-bottom-area" id="fixheader">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <nav class="main-menu navbar navbar-expand-lg navbar-light">
                         <a class="navbar-brand" href="{{ route('frontend.index') }}">
                             <img src="{{ asset('uploads/images/icons/logo.jpg') }}" alt="Hridoye88"
                                 style="height: 101px; width: auto;">
                         </a>
                         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menucontent"
                             aria-controls="menucontent" aria-expanded="false">
                             <span class="navbar-toggler-icon"></span>
                         </button>

                         <div class="collapse navbar-collapse" id="menucontent">
                             <ul class="navbar-nav ml-auto">
                                 <li class="nav-item {{ activeNav('frontend.index') }}"><a class="nav-link"
                                         href="{{ route('frontend.index') }}">@lang('index.m-home')</a>
                                 </li>
                                 <li class="nav-item {{ activeNav('frontend.about.index') }}">
                                     <a class="nav-link"
                                         href="{{ route('frontend.about.index') }}">@lang('index.m-about')</a>
                                 </li>
                                 <li class="nav-item {{ activeNav('frontend.member.index') }}">
                                    <a class="nav-link"
                                         href="{{ route('frontend.member.index') }}">@lang('index.m-member')</a>
                                        </li>
                                 <li class="nav-item dropdown {{ activeNav(['frontend.photoGallery.*','frontend.videoGallery.*']) }}">
                                     <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                         data-toggle="dropdown" role="button">@lang('index.m-gallery')</a>
                                     <ul class="dropdown-menu">
                                         <li class="nav-item">
                                             <a class="nav-link"
                                                 href="{{ route('frontend.photoGallery.index') }}">@lang('index.m-photo')</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link"
                                                 href="{{ route('frontend.videoGallery.index') }}">@lang('index.m-video')</a>
                                         </li>
                                     </ul>
                                 </li>
                                 {{-- @php
                                     $menus = App\Models\Menu::with('subMenus')->get(['id', 'name', 'name_b']);
                                 @endphp --}}
                                 <li class="nav-item {{ activeNav('frontend.blog.index') }}">
                                     <a class="nav-link"
                                         href="{{ route('frontend.blog.index') }}">@lang('index.m-blog')</a>
                                 </li>
                                 <li class="nav-item {{ activeNav('frontend.about.index') }}">
                                     <a class="nav-link"
                                         href="{{ route('frontend.about.index') }}">@lang('index.m-contact')</a>
                                 </li>
                             </ul>
                         </div>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!--== Header Area End ==-->

 <!-- Login Modal -->
 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="loginModalLabel">@lang('index.h-login')</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form method="POST" action="{{ route('loginProcess') }}">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="email">@lang('register.email')</label>
                         <input type="email" name="email"class="form-control" id="email"
                             value="{{ old('email') }}">
                     </div>
                     <div class="form-group">
                         <label for="password">@lang('index.h-password')</label>
                         <input type="password" name="password" class="form-control" id="password"
                             value="{{ old('password') }}">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary btn-lg">@lang('global.submit')</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
