<nav>
    <ul>
        <li><a class="{{ Request::is('/') ? 'active' : null }}" href="/">Welcome</a></li>
        <li><a class="{{ Request::is('about') ? 'active' : null }}" href="/about">About Us</a></li>
        <li><a class="{{ Request::is('service') ? 'active' : null }}" href="/service">Services</a></li>
    </ul>
</nav>
