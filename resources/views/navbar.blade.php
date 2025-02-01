<aside x-data="{ open: true }" :class="open ? 'w-64' : 'w-16'" class="bg-primaryGreen text-white h-full transition-all duration-300">
    <div class="flex flex-col h-full">
        <div class="p-4 flex items-center">
            <button @click="open = !open" class="text-white focus:outline-none">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <nav :class="open ? 'block' : 'hidden'" class="flex-1 px-2">
            <a class="{{ request()->is('dashboard') ? 'bg-[#46926E]' : '' }} block p-2 my-2 rounded-md hover:bg-[#46926E] transition" href="{{ route('dashboard.home') }}">
                <span x-show="open" class="ml-2">Home</span>
            </a>
            <a class="{{ request()->is('dashboard/products') ? 'bg-[#46926E]' : '' }} block p-2 my-2 rounded-md hover:bg-[#46926E] transition" href="{{ route('dashboard.products') }}">
                <span x-show="open" class="ml-2">Products</span>
            </a>
            <a class="{{ request()->is('dashboard/orders') ? 'bg-[#46926E]' : '' }} block p-2 my-2 rounded-md hover:bg-[#46926E] transition" href="{{ route('dashboard.orders') }}">
                <span x-show="open" class="ml-2">Orders</span>
            </a>
        </nav>
    </div>
</aside>
