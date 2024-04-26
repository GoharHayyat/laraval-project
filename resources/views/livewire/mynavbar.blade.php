
<div>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">mywebsite</a>
            </div>
            <ul class="nav navbar-nav">
                @auth
                <li class="{{ Route::is('home') ? 'active' : '' }}" ><a wire:navigate {{Route::is('home')?'active':''}} href="/home">Home</a></li>
                
                <li class="{{ Route::is('contactus') ? 'active' : '' }}"><a wire:navigate {{Route::is('contactus')}} href="/contactus">contact us</a></li>
                @endauth
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ auth()->user()->name }}</a></li>
                    <li><a href="#" wire:click="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                @else
                    <li><a href="#" wire:click="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                @endauth
                {{-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ auth()->user()->name }}</a></li>
                <li><a href="" wire:click="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li> --}}
            </ul>
        </div>
    </nav>
</div>
