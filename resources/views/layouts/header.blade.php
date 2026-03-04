<header class="sticky top-0 z-50 bg-white border-b border-black/5">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between py-4">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="bg-green-600 text-white w-10 h-10 rounded-lg flex items-center justify-center">

                    {{-- Health Shield SVG --}}
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">

                        <!-- Shield -->
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21c4.418 0 8-4.03 8-9V6.4a2 2 0 0 0-1.2-1.83l-6-2.7a2 2 0 0 0-1.6 0l-6 2.7A2 2 0 0 0 4 6.4V12c0 4.97 3.582 9 8 9Z" />

                        <!-- Medical Cross -->
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v8M8 12h8" />

                    </svg>

                </div>

                <span class="font-semibold text-lg text-gray-800">
                    Rural Health Unit
                </span>
            </a>


            {{-- Desktop Nav --}}
            <nav class="hidden md:flex items-center gap-8 text-gray-600 font-medium">
                <a href="{{ url('/') }}" class="hover:text-green-600 transition">Home</a>
                <a href="{{ url('/#services') }}" class="hover:text-green-600 transition">Our Services</a>
                <a href="{{ url('/#doctors') }}" class="hover:text-green-600 transition">Doctors</a>
                <a href="{{ url('/#contact') }}" class="hover:text-green-600 transition">Contact</a>
                <a href="{{ route('staff.login') }}" class="hover:text-green-600 transition">Login</a>
            </nav>


            {{-- Desktop CTA --}}
            <a href="{{ route('appointment.create') }}"
                class="hidden md:inline-flex bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium transition shadow-sm">
                Book Appointment
            </a>


            {{-- Mobile Menu Button --}}
            <button type="button" class="md:hidden text-gray-700" aria-label="Open menu"
                onclick="document.getElementById('mobileNav').classList.toggle('hidden')">

                {{-- Menu Icon --}}
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>

            </button>

        </div>


        {{-- Mobile Nav --}}
        <div id="mobileNav" class="md:hidden hidden pb-4">
            <div class="flex flex-col gap-3 text-gray-700 font-medium">

                <a href="{{ url('/') }}" class="py-2 border-b border-black/5">
                    Home
                </a>

                <a href="{{ url('/#services') }}" class="py-2 border-b border-black/5">
                    Our Services
                </a>

                <a href="{{ url('/#doctors') }}" class="py-2 border-b border-black/5">
                    Doctors
                </a>

                <a href="{{ url('/#contact') }}" class="py-2 border-b border-black/5">
                    Contact
                </a>

                <a href="{{ route('staff.login') }}" class="py-2 border-b border-black/5">
                    Login
                </a>

                <a href="{{ route('appointment.create') }}"
                    class="mt-2 inline-flex justify-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Book Appointment
                </a>

            </div>
        </div>

    </div>
</header>
