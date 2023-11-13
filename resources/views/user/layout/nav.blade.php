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
                    <a class="nav-link text-uppercase" href="/">
                        Trang chủ
                    </a>
                </li>
                <li class="nav-item dropdown mega-dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase"
                        href="{{ route('categoryhome') }}">Danh mục</a>
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
                    <a class="nav-link text-uppercase" href="#">
                        Shop
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-uppercase" href="#">Blog</a>
                </li>
            </ul>
            <!-- Links -->
        </div>
        <!-- Collapsible content -->

    </nav>
    <!-- Navbar -->
