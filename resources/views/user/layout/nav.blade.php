    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light d-sm-none d-xs-none d-lg-block navbar-full">

        <!-- Navbar brand -->
        <a class="navbar-brand text-uppercase d-none" href="#">Navbar</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
            aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse">

            <!-- Links -->
            <ul class="navbar-nav m-auto justify-content-center">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle text-uppercase" href="category.html">
                        Home
                        <span class="sr-only">(current)</span> </a>
                    <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3">
                        <div class="sub-menu mb-xl-0 mb-4">
                            <ul class="list-unstyled">
                                <li>
                                    <a class="menu-item pl-0" href="index.html">
                                        Home 1 </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="index2.html">
                                        Home 2 </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="index3.html">
                                        Home 3 </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="index4.html">
                                        Home 4 </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="index5.html">
                                        Home 5 </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mega-dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase"
                        href="{{ route('proByCate', 1) }}">Category</a>
                    <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3">
                        <div class="row">
                            @foreach ($formattedCategories as $category)
                                <div class="col-md-12 col-xl-4 sub-menu mb-xl-0 mb-4">
                                    <h6 class="sub-title text-uppercase font-weight-bold white-text">
                                        {{ $category['name'] }}</h6>
                                    <!--Featured image-->
                                    <ul class="list-unstyled">
                                        @foreach ($category['genres'] as $genre)
                                            <li>
                                                <a href="{{ route('proByCate', $genre->GenreID) }}"
                                                    class="menu-item pl-0" href="filter-toggle.html">
                                                    {{ $genre->GenreName }} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase" href="category.html">
                        Shop
                        <span class="sr-only">(current)</span> </a>
                    <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3">
                        <div class="sub-menu mb-xl-0 mb-4">
                            <ul class="list-unstyled">
                                <li>
                                    <a class="menu-item pl-0" href="product-grid.html">
                                        product grid </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="product-sticky-right.html">
                                        sticky right </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="product-extended-layout.html">
                                        Extended layout </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="product-details.html">
                                        Default layout </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="product-compact.html">
                                        compact layout </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase" href="category.html">Blog</a>
                    <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3">
                        <div class="sub-menu">
                            <h6 class="sub-title text-uppercase font-weight-bold white-text d-none">Featured</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="menu-item pl-0" href="blog-2-column.html">
                                        blog 2 column </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="blog-3-column.html">
                                        blog 3 column </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="blog-2-column-masonary.html">
                                        blog masonary </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="blog-list.html">
                                        blog list </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="blog-details.html">
                                        blog details </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase" href="category.html">Pages</a>
                    <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3">
                        <div class="sub-menu">
                            <ul class="list-unstyled">
                                <li>
                                    <a class="menu-item pl-0" href="about-us.html">
                                        About us </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="accordions.html">
                                        Accordions </a>
                                </li>
                                <li>
                                    <a class="menu-item pl-0" href="buttons.html">
                                        Buttons </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-uppercase" href="contact-us.html">contact us</a>
                </li>
            </ul>
            <!-- Links -->
        </div>
        <!-- Collapsible content -->

    </nav>
    <!-- Navbar -->
