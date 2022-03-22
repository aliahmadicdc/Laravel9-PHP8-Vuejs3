<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('front.home')}}">Laravel 9</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @auth
                <li class="nav-item @if(str_contains(getCurrentUrl(),route('panel.dashboard'))) active @endif">
                    <a class="nav-link" href="{{route('panel.dashboard')}}">Panel</a>
                </li>
            @else
                <li class="nav-item @if(getCurrentUrl()==route('login')) active @endif">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            @endauth
            <li class="nav-item @if(getCurrentUrl()==route('front.home')) active @endif">
                <a class="nav-link" href="{{route('front.home')}}">Home<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
