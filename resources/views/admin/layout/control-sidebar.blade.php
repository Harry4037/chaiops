<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

    <div class="c-sidebar-brand">
<!--        <img class="c-sidebar-brand-full" src="{{ asset("assets/brand/coreui-base-white.svg") }}" width="118" height="46" alt="Logo">
        <img class="c-sidebar-brand-minimized" src="{{asset("assets/brand/coreui-signet-white.svg")}}" width="118" height="46" alt="Logo">-->
        CHAIOPS
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="/admin">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>
                Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.user.index') }}">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>
                User Managment
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.category.index') }}">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>
                Category Managment
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.product.index') }}">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>
                Product Managment
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.blog.index') }}">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>
                Blog Managment
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.contact.index') }}">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>
                Contact Form Managment
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.franchise.index') }}">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>
                Franchise Managment
            </a>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>