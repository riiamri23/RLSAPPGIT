@include('includes.header')

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        @guest
        @else
            @include('includes.topnav')
            @include('includes.sidebar')
        @endguest

        <!--**********************************
            Content body start
        ***********************************-->
        
        <div class="content-body">
            
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    @if(!empty($url) && empty($id))
                        {{ Breadcrumbs::render($url) }}
                    @endif
                    @if (!empty($url)&& !empty($id))
                        {{ Breadcrumbs::render($url, $id) }}  
                    @endif
                </div>
            </div>
            

            <!-- row -->
            <!-- #/ container -->
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @guest
        @else
            @include('includes.contentfooter')
        @endguest
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

@include('includes.scripts')
@if(!empty($script))
@include($script)

@endif
@include('includes.footer')