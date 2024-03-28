<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="javascript: void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span>
                    {{ auth()->user()->name }}
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg  dropdown-menu-right">
                <li class="user-footer">
                    <form method="POST" action="{{ route('logout') }}">
                        @method('POST')
                        @csrf
                        <button class="nav-link border-0 btn-block rounded pointer-event" title="Выйти">
                            <i class="fa fa-fw fa-power-off text-danger"></i>
                            Выход
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>


