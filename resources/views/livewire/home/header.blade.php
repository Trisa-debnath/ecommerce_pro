<?php

use function Livewire\Volt\{state};
use function Livewire\Volt\{on};

// for use Listener another component ,here cartupdateed Listening
on(['cartUpdated' => function () {

}]);

?>

<div>
    <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{ route('home.index') }}"><img width="250"
                     src="home/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">


             <li class="nav-item {{ request()->routeIs('home.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home.index') }}">Home</a>
    </li>
                     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
            <span class="nav-label">Pages <span class="caret"></span></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('testimonial') }}">Testimonial</a></li>
        </ul>
    </li>
                       <li class="nav-item {{ request()->routeIs('home.products') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home.index') }}#our_products">Products</a>
    </li>
                        <li class="nav-item">
                           <a class="nav-link" href="blog_list.html">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>

                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>


<li class="nav-item ml-2">
    <a class="nav-link position-relative" href="/cart" style="display: flex; align-items: center;">
    <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 20px;"></i>

    @if(session()->has('cart') && count(session('cart')) > 0)

    <span class="badge badge-danger position-absolute"
     style="top: 0; right: -5px; border-radius: 50%; padding: 2px 6px; font-size: 10px;">

            {{ count((array) session('cart')) }}
                                    </span>
                                @endif
                            </a>
                        </li>


     <li class="nav-item d-flex align-items-center ml-3">
    @if (Route::has('login'))
        @auth
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-primary mr-2">
                  Logout
                </button>
            </form>
        @else
            <!-- Login -->
            <a href="{{ route('login') }}" class="btn btn-success mr-2">
               Login
            </a>

            <!-- Register -->
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-info mr-2">
                   Register
                </a>
            @endif
        @endauth
    @endif
</li>



                     </ul>
                  </div>
               </nav>
            </div>
         </header>

</div>
