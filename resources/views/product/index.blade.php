@extends('layouts.app')

@section('content')
    <div class="container-fluid px-0" id="productPage" v-cloak>
        <!-- The side bar -->
    @include('layouts.partials.sidebar')

    <!-- Main section -->
        <main class="bg-light main-full-body">

            <!-- Theme changer -->
            <div class="theme-option p-4">
                <div class="theme-pck">
                    <i class="fas fa-cog fa-lg"></i>
                </div>
                <p>Navbar:</p>
                <div class="side-nav-themes d-flex flex-row">
                    <p class="p-3 rounded side-nav-theme-primary side-nav-theme" theme-color="purple"></p>
                    <p class="p-3 rounded ml-2 side-nav-theme-light side-nav-theme" theme-color="light"></p>
                </div>
            </div>

            <!-- The navbar -->
            <nav class="navbar navbar-expand navbar-light bg-light py-3">
                <p class="navbar-brand mb-0 pb-0">
                    <span></span>
                    <span></span>
                    <span></span>
                </p>
                <!-- Navbar search section -->
                <div class="navb-search ml-5 d-none d-md-block">
                    <form action="#" method="POST">
                        <div class="input-group search-round">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn border" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Navbar right menu section -->
                <div class="navb-menu ml-auto d-flex flex-row">
                    <!-- Message dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2 pt-1">
                        <!-- Icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted position-relative" data-toggle="dropdown">
                            <!-- Message -->
                            <i class="far fa-envelope fa-2x"></i>
                            <span class="badge badge-danger position-absolute notification-badge">3</span>
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-max-height p-0">
                            <!-- Dropdown item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <!-- Profile image -->
                                    <div class="notification-icon bg-secondary-c pt-3"><img
                                                src="{{ asset('qbadminui/img/profile.jpg') }}" alt="img"
                                                class="w-75 img-round"></div>
                                    <!-- Message notification -->
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="mb-0">James <span class="badge badge-pill badge-primary">1</span></p>
                                        <small>James : Hey! Are you busy?</small>
                                    </div>
                                </div>
                            </a>
                            <!-- Dropdown item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <!-- Profile image -->
                                    <div class="notification-icon bg-secondary-c pt-3"><img
                                                src="{{ asset('qbadminui/img/profile.jpg') }}" alt="img"
                                                class="w-75 img-round"></div>
                                    <!-- Message notification -->
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="mb-0">Jhone <span class="badge badge-pill badge-primary">1</span></p>
                                        <small>Jhone : Hey! I need help.</small>
                                    </div>
                                </div>
                            </a>
                            <!-- Dropdown item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <!-- Profile image -->
                                    <div class="notification-icon bg-secondary-c pt-3"><img
                                                src="{{ asset('qbadminui/img/profile.jpg') }}" alt="img"
                                                class="w-75 img-round"></div>
                                    <!-- Message notification -->
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="mb-0">Mariam <span class="badge badge-pill badge-primary">1</span></p>
                                        <small>Mariam : information</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Notification dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2 pt-1">
                        <!-- icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted position-relative" data-toggle="dropdown">
                            <!-- Notification -->
                            <i class="far fa-bell fa-2x"></i>
                            <span class="badge badge-primary position-absolute notification-badge">3</span>
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu dropdown-menu-right p-0 dropdown-menu-max-height">
                            <!-- Menu item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <div class="notification-icon bg-secondary-c pt-3 px-3"><i
                                                class="far fa-envelope text-primary fa-lg"></i></div>
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="mb-0">New message <span
                                                    class="badge badge-pill badge-primary">New</span></p>
                                        <small>James : Hey! Are you busy?</small>
                                    </div>
                                </div>
                            </a>
                            <!-- Menu item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <div class="notification-icon bg-secondary-c pt-3 px-3"><i
                                                class="fas fa-clipboard-list text-success fa-lg"></i></div>
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="m-0">New order received <span class="badge badge-pill badge-success">New</span>
                                        </p>
                                        <small>3 iPhone x</small>
                                    </div>
                                </div>
                            </a>
                            <!-- Menu item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0 pr-2">
                                <div class="d-flex flex-row border-bottom">
                                    <div class="notification-icon bg-secondary-c pt-3 px-3"><i
                                                class="fas fa-box-open text-warning fa-lg"></i></div>
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="m-0">Product out of stock <span
                                                    class="badge badge-pill badge-warning small">1</span></p>
                                        <small>Headphone E63</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Profile action dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2">
                        <!-- Icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted" data-toggle="dropdown"><img
                                    src="{{ asset('qbadminui/img/profile.jpg') }}" alt="profile" class="profile-avatar"></a>
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-max-height">
                            <!-- Menu items -->
                            <a href="#" class="dropdown-item disabled small"><i class="far fa-user mr-1"></i> Md.Maruf
                                Ahmed</a>
                            <a href="#" class="dropdown-item text-secondary-light">Account setting</a>
                            <a href="#" class="dropdown-item text-secondary-light">Billing history</a>
                            <a class="dropdown-item text-secondary-light"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            >Sign out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>


            <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                <div class="page-heading border-bottom d-flex flex-row">
                    <h5 class="font-weight-normal">Products</h5>
                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Product Title</label>
                                    <input type="text" id="title" class="form-control" v-model="product.title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Product Description</label>
                                    <textarea rows="5" cols="10" id="description" class="form-control" v-model="product.description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="sku">Product Sku</label>
                                    <input type="text" id="sku" class="form-control" v-model="product.sku">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select v-model="product.category_id" id="category" class="form-control">
        @foreach($categories as $category_id => $category_name)
                                            <option value="{{ $category_id }}">{{ $category_name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form group">
                                    <input type="file" class="form-control" id="featureImage" ref="featureImage" accept="image/*" @change.prevent="handleFeatureImage">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select v-model="product.status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="2">In Active</option>
                                        <option value="3">Pending</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="published_by">{{ __('Published By') }}</label>
                                    <input type="text" class="form-control" id="published_by" value="{{ auth()->user()->name }}" readonly>
                                </div>

                                <button class="btn btn-success" @click.prevent="StoreProduct('{{ route('product.store') }}')">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <!-- Footer section -->
        <footer class="footer-full-body p-4 d-flex flex-row justify-content-between text-secondary">
            <p>&copy; Copyright. <a href="https://qbytesoft.com" target="_Blank">Qbytesoft</a></p>
            <p>Version 1.0.0</p>
        </footer>
    </div>
@endsection
@push('js')

    <script src="{{ asset('js/pages/pagination.js') }}"></script>
    <script type="module" src="{{ asset('js/pages/product.js') }}"></script>
@endpush