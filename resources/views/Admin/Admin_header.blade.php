 <title>Gold Hallmarking Management System</title>
<link rel="icon" type="image/gif/png" href="web_images/title_image.png">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="web_images/weblogo.png" alt="Avatar Logo" style="width:50px;" class="rounded-pill">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav ms-auto">
                <script>
                    function display_ct6() {
                        var x = new Date()
                        var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
                        hours = x.getHours() % 12;
                        hours = hours ? hours : 12;
                        var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
                        var x1 = x1 + "  -  " + hours + ":" + x.getMinutes() + ":" + x.getSeconds() + ":" + ampm;
                        document.getElementById('ct6').innerHTML = x1;
                        display_c6();
                    }

                    function display_c6() {
                        var refresh = 1000; // Refresh rate in milli seconds
                        mytime = setTimeout('display_ct6()', refresh)
                    }
                    display_c6()
                </script>
                <span id='ct6' style="background-color: #eedf0a"></span>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('/admin_user') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('/contact') }}">Contact Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('/order') }}">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Payment</a>
                </li>

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             <img src="web_images/Admin.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            {{ Auth::user()->name }}
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                             <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                {{ __('Change Profile') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('admin.change_pass') }}">
                                {{ __('Change Password') }}
                            </a>


                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
