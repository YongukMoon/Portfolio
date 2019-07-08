<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Moon</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('articles.index') }}">{{ trans('layouts.nav.articles_link') }} <span class="sr-only">(current)</span></a></li>
                {{-- <li><a href="#">Link</a></li> --}}
            </ul>
            <form class="navbar-form navbar-left" action="{{ route('articles.index') }}" method="get">
                <div class="form-group">
                    <input type="text" name="q" class="form-control" placeholder="{{ trans('layouts.nav.search_placeholder') }}">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if ($user=Auth::user())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('sessions.destroy') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ trans('layouts.nav.btn_logout') }}</a></li>
                            <li><a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-address-card" aria-hidden="true"></i> {{ trans('layouts.nav.btn_profile') }}</a></li>
                            <li><a href={{ route('passwords.edit', $user->id) }}><i class="fa fa-key" aria-hidden="true"></i> {{ trans('layouts.nav.btn_pw_change') }}</a></li>
                            {{-- <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li> --}}
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('sessions.create') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{ trans('layouts.nav.btn_login') }}</a></li>
                    <li><a href="{{ route('users.create') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{ trans('layouts.nav.btn_register') }}</a></li>
                @endif

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-language"></i> {{ trans('layouts.nav.language') }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (config('project.locales') as $locale => $language)
                            <li {!! ($locale==$currentLocale) ? 'class="active"' : '' !!}>
                                <a href="{{ route('locale', ['locale'=>$locale, 'return'=>urlencode($currentUrl)]) }}">{{ $language }}</a>
                            </li>
                        @endforeach
                        {{-- <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li> --}}
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>