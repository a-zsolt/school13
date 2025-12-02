<ul class="nav nav-pills">
    <li class="nav-item">
        <a href="{{route('page.home')}}"
           @class(['nav-link', 'active' => request()->routeIs('page.home')])aria-current="page">Home</a>
    </li>
    <li class="nav-item">
        <a href="{{route('page.contact')}}"
           @class(['nav-link', 'active' => request()->routeIs('page.contact')])aria-current="page">Contact</a>
    </li>
    <li class="nav-item">
        <a href="{{route('page.about')}}"
           @class(['nav-link', 'active' => request()->routeIs('page.about')])aria-current="page">About</a>
    </li>
</ul>
