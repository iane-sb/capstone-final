<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-primary/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <div class="bg-primary p-1.5 rounded-lg">
                    <span class="material-symbols-outlined text-white text-2xl">health_and_safety</span>
                </div>
                <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Rural Health Unit</h1>
            </a>
            
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-sm font-semibold text-slate-600 hover:text-primary transition-colors" href="{{ url('/') }}">Home</a>
                <a class="text-sm font-semibold text-slate-600 hover:text-primary transition-colors" href="{{ url('/#services') }}">Our Services</a>
                <a class="text-sm font-semibold text-slate-600 hover:text-primary transition-colors" href="{{ url('/#doctors') }}">Doctors</a>
                <a class="text-sm font-semibold text-slate-600 hover:text-primary transition-colors" href="{{ url('/#contact') }}">Contact</a>
                <a class="text-sm font-semibold text-slate-600 hover:text-primary transition-colors" href="{{ route('staff.login') }}">Staff Login</a>
            </nav>
            
            <a href="{{ route('appointment.create') }}" 
               class="bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-lg text-sm font-bold transition-all shadow-sm hidden md:block">
                Book Appointment
            </a>

            <button class="md:hidden text-slate-600">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
            
        </div>
    </div>
</header>