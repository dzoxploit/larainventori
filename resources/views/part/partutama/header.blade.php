<!-- Main Header -->
<header class="main-header">
    
            <!-- Logo -->
            <a href="{{ url("/dashboard") }}" class="logo main"><img src="{{ asset("image/lara.png") }}" style=" Padding-bottom:30px;width:100px;height:100px;"></a>
    
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu"role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
    
                        <!-- Notifications Menu -->
                        
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ asset('images/'.Auth::user()->path_image) }}" class="img-circle" alt="User Image" />
                                    <p>
                                    {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                                        <small>Member since {{{ isset(Auth::user()->created_at) ? Auth::user()->created_at->diffForHumans() : Auth::user()->email }}}</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                    
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{url('user/show', Auth::user()->id)}}"class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                    {{ Form::open(array('url' => '/logout')) }}
                                    {{ Form::submit(trans('Logout'), ['class' => 'btn btn-default btn-flat']) }}
                                    {{ Form::close() }}
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>