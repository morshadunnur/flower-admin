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

                <!-- Sub menu parent -->
                <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Product</a></li>
                <!-- Sub menu -->
                <div id="sub_menu_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <ul class="side-sub-menu p-0">
                        <li class="side-sub-menu-item px-3"><a href="{{ route('product.create') }}" class="w-100 pl-4">Add Product</a></li>
                        <li class="side-sub-menu-item px-3"><a href="{{ route('product.index') }}" class="w-100 pl-4">All Products</a></li>

                    </ul>
                </div>

            </ul>
        </div>
    </div>
</div>