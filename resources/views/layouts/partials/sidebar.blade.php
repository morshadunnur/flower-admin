<div class="side-bar side-bar-lg-active" data-theme="purple">
    <!-- Brand details -->
    <div class="side-menu-brand d-flex flex-column justify-content-center align-items-center clear mt-3">
        <img src="{{ asset('qbadminui/img/QbyteIcon.png') }}" alt="bran_name" class="brand-img">
        <a href="{{ route('home') }}" class="brand-name mt-2 ml-2 font-weight-bold">QBAdminUI</a>
    </div>
    <!-- Side bar menu -->
    <div class="the_menu mt-5">
        <!-- Heading -->
        <div class="side-menu-heading d-flex">
            <h6 class=" font-weight-bold pb-2 mx-3"> Mr Admin </h6>
            <a  class="font-weight-bold ml-auto px-3"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
            >
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>

        <!-- Menu item -->
        <div id="accordion">
            <ul class="side-menu p-0 m-0 mt-3">
                <li class="side-menu-item px-3"><a href="{{ route('home') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
                <li class="side-menu-item px-3"><a href="{{ route('categories') }}" class="w-100 py-3 pl-4">Category</a></li>
                <li class="side-menu-item px-3"><a href="{{ route('product.index') }}" class="w-100 py-3 pl-4">{{ __('Products') }}</a></li>
                <!-- Sub menu parent -->
{{--                <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Category</a></li>--}}
{{--                <!-- Sub menu -->--}}
{{--                <div id="sub_menu_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">--}}
{{--                    <ul class="side-sub-menu p-0">--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="alert.html" class="w-100 pl-4">Alert</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="accordion.html" class="w-100 pl-4">Accordion</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="badge.html" class="w-100 pl-4">Badge</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="button.html" class="w-100 pl-4">Button</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="bootstrap_tab.html" class="w-100 pl-4">Bootstrap tab</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="cards.html" class="w-100 pl-4">Cards</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="carousels.html" class="w-100 pl-4">Carousels</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="dropdown.html" class="w-100 pl-4">Dropdown</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="list.html" class="w-100 pl-4">Llist</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="modal.html" class="w-100 pl-4">Modals</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="paginations.html" class="w-100 pl-4">Paginations</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="progressbar.html" class="w-100 pl-4">Progressbar</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="tooltip.html" class="w-100 pl-4">Tooltip</a></li>--}}
{{--                        <li class="side-sub-menu-item px-3"><a href="typography.html" class="w-100 pl-4">Typography</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

            </ul>
        </div>
    </div>
</div>