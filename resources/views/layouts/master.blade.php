<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo-icon.png') }}" type="image/x-icon">



    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<?php 
  function current_page($uri = "/") { 
    return strstr(request()->path(), $uri); 
  } 
?>
  
    @yield('css')
    

    <!-- Few Dynamic Styles -->
    <style type="text/css">
        .voyager .side-menu .navbar-header {
            background:#22A7F0;
            border-color:#22A7F0;
        }
        .widget .btn-primary{
            border-color:#22A7F0;
        }
        .widget .btn-primary:focus, .widget .btn-primary:hover, .widget .btn-primary:active, .widget .btn-primary.active, .widget .btn-primary:active:focus{
            background:#22A7F0;
        }
        .voyager .breadcrumb a{
            color:#22A7F0;
        }
    </style>

   

    @yield('head')
</head>

<body class="voyager">

<div id="voyager-loader">
    
        <img src="{{ asset('images/logo-icon.png') }}" alt="Voyager Loader">
   
</div>

<div class="app-container">
    <div class="fadetoblack visible-xs"></div>
    <div class="row content-container">
       <nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <div class="container-fluid">
        
        @yield('breadcrumb')
        
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                   aria-expanded="false"><img src="{{ asset('images/logo-icon.png') }}" class="profile-img"> <span
                            class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-animated">
                    <li class="profile-img">
                        @if(Auth::user()->img_url == null)
                        <img src="{{ asset('images/default.png') }}" class="profile-img">
                        @else
                         <img src="{{ asset('upload'. Auth::user()->img_url) }}" class="profile-img">
                        @endif
                        <div class="profile-body">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                    </li>
                     <li class="divider"></li>
                       <li class="class-full-of-rum">
                                                <a href="{{route('admin.profile')}}" >
                                                        <i class="voyager-person"></i>
                                                        Profile
                        </a>
                                            </li>
                                            <li >
                                                <a href="{{route('home')}}" target="_blank">
                                                        <i class="voyager-home"></i>
                                                        Home
                        </a>
                                            </li>
                    
                    <li >
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-block">
                              <i class="voyager-power"></i>
                                Logout
                            </button>
                        </form>
                       
                    </li>
                   
                    </ul>
                </li>
        
        </ul>
    </div>
</nav>

       <div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('home')}}">
                    <div class="logo-icon-container">
                        
                            <img src="{{ asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        
                    </div>
                    <div class="title">Azwaj </div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style="background-image:url({{asset('images/bg.jpg')}}); background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content">
                    @if(Auth::user()->img_url == null)
                        <img src="{{ asset('images/default.png') }}" class="avatar" alt="{{ Auth::user()->name }} avatar">
                        @else
                         <img src="{{ asset('upload'. Auth::user()->img_url) }}" class="avatar" alt="{{ Auth::user()->name }} avatar">
                        @endif
                    
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <div style="clear:both"></div>
                </div>
            </div>

        </div>
        
        <ul class="nav navbar-nav">
            <li class="{{current_page('admin') ? 'active' : '' }}">
        <a href="{{route('home')}}" target="_self" style="color:">
            <span class="icon voyager-boat"></span>
            <span class="title">Dashboard</span>
        </a>
            </li>
            
             <li class="{{current_page('Users') ? 'active' : '' }}">
        <a href="{{route('users.all')}}" target="_self" style="color:">
            <span class="icon voyager-person"></span>
            <span class="title">Users</span>
        </a>
            </li>
            
            <li class="{{current_page('Categories') ? 'active' : '' }}">
        <a href="{{route('category.all')}}" target="_self" style="color:">
            <span class="icon voyager-categories"></span>
            <span class="title">Categories</span>
        </a>
            </li>
            
             <li class="{{current_page('Video') ? 'active' : '' }}">
        <a href="{{route('video.all')}}" target="_self" style="color:">
            <span class="icon voyager-video"></span>
            <span class="title">Videos</span>
        </a>
            </li>
            
            <li class="{{current_page('Article') ? 'active' : '' }}">
        <a href="{{route('article.all')}}" target="_self" style="color:">
            <span class="icon voyager-news"></span>
            <span class="title">Articles</span>
        </a>
            </li>
            
            <li class="{{current_page('Book') ? 'active' : '' }}">
        <a href="{{route('book.all')}}" target="_self" style="color:">
            <span class="icon voyager-book"></span>
            <span class="title">Books</span>
        </a>
            </li>
            
            <li class="{{current_page('Questionnaire') ? 'active' : '' }}">
        <a href="{{route('questionnaire.all')}}" target="_self" style="color:">
            <span class="icon voyager-bar-chart"></span>
            <span class="title">Questionnaires</span>
        </a>
            </li>
            
            <li class="{{current_page('Quotation') ? 'active' : '' }}">
        <a href="{{route('quotation.all')}}" target="_self" style="color:">
            <span class="icon voyager-receipt"></span>
            <span class="title">Quotations</span>
        </a>
            </li>
            
            <li class="{{current_page('Success') ? 'active' : '' }}">
        <a href="{{route('story.all')}}" target="_self" style="color:">
            <span class="icon voyager-people"></span>
            <span class="title">Success Stories</span>
        </a>
            </li>
            
             <li class="dropdown">
        <a href="#5-dropdown-element" data-toggle="collapse" aria-expanded="false" target="_self" style="color:">
            <span class="icon voyager-tools"></span>
            <span class="title">Settings</span>
        </a>
                    <div id="5-dropdown-element" class="panel-collapse collapse ">
                <div class="panel-body">
                    <ul class="nav navbar-nav">
                         <li class="{{current_page('Banner') ? 'active' : '' }}">
        <a href="{{route('banner.all')}}" target="_self" style="color:">
            <span class="icon voyager-images"></span>
            <span class="title">Banners</span>
        </a>
            </li> 
             <li class="{{current_page('Language') ? 'active' : '' }}">
        <a href="{{route('language.all')}}" target="_self" style="color:">
            <span class="icon voyager-list"></span>
            <span class="title">Languages</span>
        </a>
            </li> 
                    
                    </ul>
                </div>
                    </div>
             </li>
        </ul>

        
    </nav>
</div>

        <script>
            (function(){
                    var appContainer = document.querySelector('.app-container'),
                        sidebar = appContainer.querySelector('.side-menu'),
                        navbar = appContainer.querySelector('nav.navbar.navbar-top'),
                        loader = document.getElementById('voyager-loader'),
                        hamburgerMenu = document.querySelector('.hamburger'),
                        sidebarTransition = sidebar.style.transition,
                        navbarTransition = navbar.style.transition,
                        containerTransition = appContainer.style.transition;

                    sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition =
                    appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =
                    navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = 'none';

                    if (window.localStorage && window.localStorage['voyager.stickySidebar'] == 'true') {
                        appContainer.className += ' expanded no-animation';
                        loader.style.left = (sidebar.clientWidth/2)+'px';
                        hamburgerMenu.className += ' is-active no-animation';
                    }

                   navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = navbarTransition;
                   sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition = sidebarTransition;
                   appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition = containerTransition;
            })();
        </script>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                @yield('page_header')
                <div id="voyager-notifications"></div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
<footer class="app-footer">
    <div class="site-footer-right">
        @if (rand(1,100) == 100)
            <i class="voyager-rum-1"></i>
        @else
        <a href="http://exagic.com" target="_blank">Exagic</a>
        @endif
       
    </div>
</footer>


<!-- Javascript Libs -->


<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


<script>
    

    @if(Session::has('message'))

    // TODO: change Controllers to use AlertsMessages trait... then remove this
    var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
    var alertMessage = {!! json_encode(Session::get('message')) !!};
    var alerter = toastr[alertType];

    if (alerter) {
        alerter(alertMessage);
    } else {
        toastr.error("toastr alert-type " + alertType + " is unknown");
    }

    @endif
</script>
@yield('javascript')



</body>
</html>
