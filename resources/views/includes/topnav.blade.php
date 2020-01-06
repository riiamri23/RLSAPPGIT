
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
                <div class="brand-logo text-center">
                    <a href="{{URL::to('/')}}">
                        {{-- <b class="logo-abbr"><img style="max-height:50px" src="{{URL::asset('assets/images/Ump-logo.png')}}" alt=""> </b> --}}
                        <span class="logo-compact">
                        {{-- <span class="brand-title"><img style="max-height:50px" src="{{URL::asset('assets/images/Ump-logofull.png')}}" alt=""> --}}
                            {{-- <img src="{{URL::asset('assets/images/logo-text.png')}}" alt=""> --}}
                        </span>
                    </a>
                </div>
            </div>
            <!--**********************************
                Nav header end
            ***********************************-->
    
            <!--**********************************
                Header start
            ***********************************-->
            <div class="header">    
                <div class="header-content clearfix">
                    
                    <div class="nav-control">
                        <div class="hamburger">
                            <span class="toggle-icon"><i class="icon-menu"></i></span>
                        </div>
                    </div>
                    <div class="header-left">
                        {{-- <div class="input-group icons">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                            </div>
                            <input type="search" class="form-control" placeholder="Cari Data" aria-label="Cari Data" id="Cari">
                            <div class="drop-down animated flipInX d-md-none">
                                <form action="#">
                                    <input type="text" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div> --}}
                    </div>
                    <div class="header-right">
                        @guest
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                            {{-- | <a  href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                            @endif
                        @else
                        <ul class="clearfix">
                            <li class="icons dropdown">
                                <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                    <span class="activity active"></span>
                                    <img src="{{URL::asset('assets/images/user/form-user.png')}}" height="40" width="40" alt="">
                                </div>
                                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                    <div class="dropdown-content-body">
                                        
                                        <ul>
                                            <li>Hello, {{Auth::user()->name}}</li>
                                            <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();"><i class="icon-key"></i> <span>Logout</span></a>
                                            </li>
                                            
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        </ul>
                                    </div>
                                </div>

                            </li>
                        </ul>
                        @endguest
                    </div>
                </div>
            </div>
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->