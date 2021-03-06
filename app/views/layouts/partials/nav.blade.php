<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Larabook</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="">{{ link_to_route('users_path', 'Brows Users') }}</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if($currentUser)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $currentUser->username }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>{{ link_to_route('profile_path', 'Your Profile', $currentUser->username) }}</li>
                            <li>{{ link_to_route('statuses_path', 'Statuses') }}</li>
                            <li class="divider"></li>
                            <li>{{ link_to_route('logout_path', 'Log Out') }}</li>
                        </ul>
                    </li>
                @else
                    <li>{{ link_to_route('register_path', 'Register') }}</li>
                    <li>{{ link_to_route('login_path', 'Log In') }}</li>
                @endif
            </ul>
        </div>
    </div>
</nav>