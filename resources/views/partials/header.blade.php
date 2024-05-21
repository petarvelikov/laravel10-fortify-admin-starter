<nav class="navbar navbar-expand-lg fixed-top0 bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin"><i class="bi bi-speedometer">&nbsp;</i>Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="bi bi-house-door">&nbsp;</i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/items"><i class="bi bi-shop">&nbsp;</i>Items</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-md-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right">&nbsp;</i>Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-at">&nbsp;</i>Register</a>
                        </li>
                    @else
                        <li><a class="nav-link" href=""><i class="bi bi-cart4">&nbsp;</i>My cart</a></li>

                        <li class="nav-item dropdown" style="margin-left: 27px;">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-person"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="{{ url('my-profile') }}"><i class="bi bi-person-lines-fill">&nbsp;&nbsp;</i>My profile</a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-left"></i>
                                    &nbsp;
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>   
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

