<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand fw-bold" href="/">
MyShop
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto align-items-center">

<li class="nav-item">
<a class="nav-link" href="/">Home</a>
</li>

<li class="nav-item ms-3">

<a class="nav-link position-relative" href="{{ route('cart.page') }}">

🛒 Cart

<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

{{ count(session('cart', [])) }}

</span>

</a>

</li>

</ul>

</div>

</div>

</nav>