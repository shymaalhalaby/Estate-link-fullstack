<nav x-data="{ open: false, showAbout: false, showContact: false }" class="bg-babyblue border-b border-black shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="text-navy" style="height: 60px; width: 60px;" />
                </a>
                <span class="text-4xl font-bold text-navy">Estate Link</span>

                <!-- New Home link -->
                <a href="{{ route('dashboard') }}"
                    class="hidden sm:flex items-center text-white font-bold text-xl hover:text-orange">
                    Home
                </a>

            </div>


            <!-- Navigation Links -->
            <div class="hidden sm:flex items-center space-x-9 text-lg font-semibold">
                <a href="{{ route('profile.edit') }}" class="text-white hover:text-orange">Profile</a>
                <button @click="showAbout = true" class="text-white hover:text-orange">About Us</button>
                <button @click="showContact = true" class="text-white hover:text-orange">Contact Us</button>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-orange">Log Out</button>
                </form>
            </div>

            <!-- Hamburger (mobile) -->
            <div class="flex sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
            <button @click="showAbout = true" class="block w-full text-left px-4 py-2 text-gray-700">About Us</button>
            <button @click="showContact = true" class="block w-full text-left px-4 py-2 text-gray-700">Contact
                Us</button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Log Out
                </x-responsive-nav-link>
            </form>
        </div>
    </div>

    <!-- About Us Modal -->
    <div x-show="showAbout" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4 text-navy">About Us</h2>
            <p class="text-gray-700 mb-4">We are a real estate platform dedicated to connecting people with their dream
                homes. Our mission is to make real estate easy, transparent, and accessible.</p>
            <button @click="showAbout = false" class="bg-orange text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>

    <!-- Contact Us Modal -->
    <div x-show="showContact" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        x-cloak>
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 class="text-lg font-semibold mb-4 text-navy">Contact Us</h2>
            <p class="text-gray-700 mb-2">You can reach us at:</p>
            <p class="text-sm text-babyblue">Email: support@estatelink.com</p>
            <p class="text-sm text-babyblue mb-4">Phone: +123 456 7890</p>
            <button @click="showContact = false" class="bg-orange text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>
</nav>
