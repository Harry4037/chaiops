<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <span class="c-header-toggler-icon"></span>
    </button>
    <a class="c-header-brand d-sm-none" href="#">
        <img class="c-header-brand" src="{{ asset("/assets/brand/coreui-base.svg") }}" width="97" height="46" alt="CoreUI Logo">
    </a>
    <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <span class="c-header-toggler-icon"></span>
    </button>
    <ul class="c-header-nav ml-auto mr-4">

        <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar"><img class="c-avatar-img" src="{{ asset("assets/img/avatars/6.jpg") }}" alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">

                <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
                <a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                    <use xlink:href="{{ asset("icons/sprites/free.svg#cil-user") }}"></use>
                    </svg> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('admin.change-password')}}">
                    <svg class="c-icon mr-2">
                    <use xlink:href="{{ asset("icons/sprites/free.svg#cil-user") }}"></use>
                    </svg>Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                    <use xlink:href="{{ asset("icons/sprites/free.svg#cil-account-logout") }}"></use>
                    </svg>
                    <form action="{{ route("admin.logout") }}" method="POST"> 
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-ghost-dark btn-block">Logout</button>
                    </form>
                </a>
            </div>
        </li>
    </ul>

    <!-- BREADCURMS -->
    <!--    <div class="c-subheader px-3">
            <ol class="breadcrumb border-0 m-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
            </ol>
        </div>-->
</header>