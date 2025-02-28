<div class="w-full flex items-center justify-between gap-4 font-Roboto font-medium text-black max-w-2xl p-6 lg:max-w-7xl mx-auto">
    <a href="{{ route('home') }}">
        <svg class="w-[120px] h-[34px]">
            <use xlink:href="/icons.svg#logo-header"></use>
        </svg>
    </a>
    <nav>
        <ul class="gap-x-20 hidden md:flex">
            <li>
                <a href="/discovery">Discovery</a>
            </li>
            <li>
                <a href="/about">About</a>
            </li>
            <li>
                <a href="/contact-us">Contact us</a>
            </li>
        </ul>
    </nav>
    <div class="flex items-center gap-2">
        <div class="gap-4 flex">
{{--            <button>--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />--}}
{{--                </svg>--}}
{{--            </button>--}}
            <livewire:navigation-cart/>
        </div>
        <div class="md:hidden dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn m-1 border-0 hover:bg-primaryGreen hover:text-primaryWhite">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-primaryWhite rounded-box z-[1] w-52 p-2 shadow">
                <li class="hover:bg-primaryGreen rounded-lg">
                    <a href="/discovery">Discovery</a>
                </li>
                <li class="hover:bg-primaryGreen rounded-lg">
                    <a href="/about">About</a>
                </li>
                <li class="hover:bg-primaryGreen rounded-lg">
                    <a href="/contact-us">Contact us</a>
                </li>
            </ul>
        </div>
    </div>
</div>
