<header>
    <h1>Pim Hakkert - Personal Blog</h1>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        |
        @if($isAuthenticated)
        <a href="{{ route('admin.home') }}">Admin</a>
        |
        @endif
        <a href="https://pimhakkert.com">pimhakkert.com</a>
    </nav>
</header>
