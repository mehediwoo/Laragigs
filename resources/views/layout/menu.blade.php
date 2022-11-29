<nav class="flex justify-between items-center mb-4">
    <a href="{{ url('/') }}"
        ><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo"
    /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @if (session()->has('email'))
        <li>
            <a href="{{ url('/manage') }}" class="hover:text-laravel"
                ><i class="fa-solid fa-user-plus"></i> Manage Gigs</a
            >
        </li>
        <li>
            <a href="{{ url('/logOUt') }}" class="hover:text-laravel"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Log Out</a
            >
        </li>
        @else
        <li>
            <a href="{{ url('/register') }}" class="hover:text-laravel"
                ><i class="fa-solid fa-user-plus"></i> Register</a
            >
        </li>
        <li>
            <a href="{{ url('/login') }}" class="hover:text-laravel"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a
            >
        </li>
        @endif
    </ul>
</nav>
