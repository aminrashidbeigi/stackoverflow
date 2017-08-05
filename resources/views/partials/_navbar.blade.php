<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">StackOverFlow</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/questions">Questions<span class="sr-only">(current)</span></a></li>
                <li><a href="/questions/create">Ask<span class="sr-only">(current)</span></a></li>
                {{--<li><a href="/about">About</a></li>--}}
                {{--<li><a href="/contact">Contact</a></li>--}}
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} ({{ \Illuminate\Support\Facades\Auth::user()->notifications }})<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Categories</a></li>
                            <li><a href="#">Tags</a></li>
                            <li><a href="#">Posts</a></li>
                            <li role="separator" class="divider"></li>

                            <li>
                                {!! Form::open(['route' => 'logout']) !!}
                                {{ Form::submit('Logout', array('class' => 'btn btn-default btn-block')) }}
                                {!! Form::close() !!}

                            </li>
                        </ul>
                    </li>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>