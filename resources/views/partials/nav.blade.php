<nav>
    <ul>
        <li><a class="{{ Request::is('/') ? 'active' : null }}" href="{{ route('welcome') }}">Welcome</a></li>
        <li><a class="{{ Request::is('about') ? 'active' : null }}" href="{{ route('about') }}">About Us</a></li>
        <li><a class="{{ Request::is('services') ? 'active' : null }}" href="{{ route('services.index') }}">Services</a></li>
        <li><a class="{{ Request::is('customers') ? 'active' : null }}" href="{{ route('customers.index') }}">Customers</a></li>
    </ul>
</nav>
