<header class="bg-white shadow-sm border-b border-green-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">

            <!-- Logo Section -->
            <div class="flex items-center space-x-3">
                <div class="bg-green-600 p-3 rounded-2xl shadow-md">
                    <!-- Medical Cross -->
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-xl font-bold text-green-700">
                        CareQueue Clinic
                    </h1>
                    <p class="text-xs text-gray-500">
                        Online Appointment & Smart Queuing
                    </p>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-10">

                <a href="#" class="text-gray-600 hover:text-green-600 font-medium transition">
                    Home
                </a>

                <a href="#" class="text-gray-600 hover:text-green-600 font-medium transition">
                    Our Services
                </a>

                <a href="#" class="text-gray-600 hover:text-green-600 font-medium transition">
                    Doctors
                </a>

                <a href="#" class="text-gray-600 hover:text-green-600 font-medium transition">
                    Contact
                </a>

                <!-- CTA Buttons -->
                <a href="#" 
                   class="text-green-600 font-semibold hover:underline">
                    Login
                </a>

                <a href="#" 
                   class="bg-green-600 text-white px-6 py-2.5 rounded-xl shadow-md hover:bg-green-700 transition font-semibold">
                    Book Appointment
                </a>

            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="menu-btn" class="text-green-700 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-green-50 border-t border-green-100">
        <div class="px-6 py-5 space-y-4">

            <a href="#" class="block text-gray-700 hover:text-green-600 font-medium">
                Home
            </a>

            <a href="#" class="block text-gray-700 hover:text-green-600 font-medium">
                Our Services
            </a>

            <a href="#" class="block text-gray-700 hover:text-green-600 font-medium">
                Doctors
            </a>

            <a href="#" class="block text-gray-700 hover:text-green-600 font-medium">
                Contact
            </a>

            <div class="pt-4 border-t border-green-200 space-y-3">
                <a href="#" 
                   class="block text-center text-green-600 font-semibold">
                    Login
                </a>

                <a href="{{ route('appointment.create') }}" 
                   class="block text-center bg-green-600 text-white py-2.5 rounded-xl shadow hover:bg-green-700 transition">
                    Book Appointment
                </a>
            </div>

        </div>
    </div>
</header>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
