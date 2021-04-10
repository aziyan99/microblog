<div class="header">
    <span class="header-title">{{ $setting->name }}</span>&nbsp;<span class="header-subtitle">{{ $setting->short_desc }}</span>
</div>
<div class="menu-wrapper">
    <ul class="menu">
        @php
            $name = Route::currentRouteName()
        @endphp
        <li>
            <a href="{{ route('home') }}" class="{{ ($name == "home" || $name == "home.category") ? 'active' : '' }}">Home</a>
        </li>
        <li>
            <a href="{{ route('categories') }}" class="{{ ($name == "categories") ? 'active' : '' }}">Category</a>
        </li>
        <li>
            <a href="{{ route('about') }}" class="{{ ($name == "about") ? 'active' : '' }}">About</a>
        </li>
    </ul>
</div>
