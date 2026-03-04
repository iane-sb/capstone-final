@extends('layouts.app')

@section('content')

    {{-- HERO (UPDATED TO MATCH IMAGE) --}}
    <section class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- LEFT --}}
                <div>
                    <span class="inline-flex items-center px-4 py-2 mb-6 text-[11px] font-bold uppercase tracking-widest text-primary bg-primary/10 rounded-full">
                        Community Health First
                    </span>

                    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-[1.05]">
                        Quality Healthcare
                        <br />
                        <span class="text-primary">Made Accessible</span>
                    </h1>

                    <p class="mt-6 text-slate-600 max-w-lg leading-relaxed">
                        Book appointments online and manage your clinic visits with our Smart Queuing system.
                        Experience healthcare designed for your convenience.
                    </p>

                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('appointment.create') }}"
                           class="inline-flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 text-white px-7 py-3.5 rounded-lg text-sm font-semibold shadow-sm transition">
                            {{-- calendar icon --}}
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                            </svg>
                            Book Your Appointment
                        </a>

                        <a href="#services"
                           class="inline-flex items-center justify-center gap-2 bg-white border border-black/10 hover:bg-black/5 px-7 py-3.5 rounded-lg text-sm font-semibold text-slate-700 transition">
                            {{-- info icon --}}
                            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 11.25h1.5v5.25h-1.5v-5.25ZM12 7.5h.008v.008H12V7.5Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21a9 9 0 1 0-9-9 9 9 0 0 0 9 9Z" />
                            </svg>
                            Learn More
                        </a>
                    </div>
                </div>

                {{-- RIGHT (TEAL MOCKUP CARD LIKE IMAGE) --}}
                <div class="flex justify-center lg:justify-end">
                    <div class="w-full max-w-lg bg-teal-200 rounded-2xl shadow-xl p-10 flex items-center justify-center min-h-[320px]">
                        <div class="w-48 h-64 bg-white/25 rounded-2xl border-4 border-white flex flex-col items-center justify-center">
                            <div class="w-24 h-24 rounded-full bg-white/25 flex items-center justify-center mb-6">
                                {{-- medical icon --}}
                                <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m6-6H6" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 3h7.5A2.25 2.25 0 0 1 18 5.25v13.5A2.25 2.25 0 0 1 15.75 21h-7.5A2.25 2.25 0 0 1 6 18.75V5.25A2.25 2.25 0 0 1 8.25 3Z" />
                                </svg>
                            </div>

                            {{-- small "carousel dots" like the mockup --}}
                            <div class="flex gap-2">
                                <span class="w-2 h-2 rounded-full bg-white/70"></span>
                                <span class="w-2 h-2 rounded-full bg-white/40"></span>
                                <span class="w-2 h-2 rounded-full bg-white/40"></span>
                                <span class="w-2 h-2 rounded-full bg-white/40"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- SERVICES (UNCHANGED except icons) --}}
    <section class="py-20 bg-white" id="services">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-4">Our Primary Services</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">We offer comprehensive primary care services to ensure the health and well-being of every family member in our community.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group p-8 rounded-2xl border border-primary/10 bg-background-light hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        {{-- stethoscope-ish icon --}}
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 3v6a3 3 0 0 0 6 0V3M7 3h10" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 12v2.25A4.75 4.75 0 0 0 16.75 19H18a3 3 0 1 0 0-6h-1" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">General Check-up</h3>
                    <p class="text-slate-600 leading-relaxed">Comprehensive physical examinations and health screenings to keep you and your family in top health year-round.</p>
                </div>

                <div class="group p-8 rounded-2xl border border-primary/10 bg-background-light hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        {{-- tooth icon --}}
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 4.5c-1.5 0-3 1.23-3 3.75 0 2.25 1.125 4.5 2.25 6.75.75 1.5 1.5 3 .75 4.5 0 0 1.5 0 2.25-2.25.75-2.25.75-3.75 1.5-3.75s.75 1.5 1.5 3.75C14.25 19.5 15.75 19.5 15.75 19.5c-.75-1.5 0-3 .75-4.5 1.125-2.25 2.25-4.5 2.25-6.75 0-2.52-1.5-3.75-3-3.75-1.5 0-2.25.75-3 .75s-1.5-.75-3-.75Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Dental Services</h3>
                    <p class="text-slate-600 leading-relaxed">Professional oral health care including routine cleanings, fillings, and dental treatments for all ages.</p>
                </div>

                <div class="group p-8 rounded-2xl border border-primary/10 bg-background-light hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        {{-- baby icon --}}
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a8 8 0 1 0-8-8 8 8 0 0 0 8 8Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.5 10.5h.01M14.5 10.5h.01M9.75 14.25c.75.75 1.5 1.125 2.25 1.125s1.5-.375 2.25-1.125" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 6.75C10.5 5.25 11.25 4.5 12 4.5s1.5.75 2.25 2.25" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Maternal Care</h3>
                    <p class="text-slate-600 leading-relaxed">Specialized prenatal and postnatal care for expectant mothers and newborns ensuring a healthy start for every child.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SMART QUEUE (icons replaced) --}}
    <section class="py-20 bg-primary/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-4">Smart Queuing System</h2>
                <p class="text-slate-600">Save time and skip the long lines with our digital queue management system.</p>
            </div>
            <div class="relative">
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-primary/20 -translate-y-1/2 -z-10"></div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-white rounded-full border-4 border-primary flex items-center justify-center mb-6 shadow-lg">
                            {{-- calendar-check --}}
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9 14.25 1.5 1.5 4.5-4.5" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold mb-2">1. Book Online</h4>
                        <p class="text-sm text-slate-600">Select your service and preferred time slot through our website.</p>
                    </div>

                    <div class="flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-white rounded-full border-4 border-primary flex items-center justify-center mb-6 shadow-lg">
                            {{-- QR-ish icon --}}
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 4h6v6H4V4Zm10 0h6v6h-6V4ZM4 14h6v6H4v-6Zm10 6v-6h6v6h-6Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14 14h3m-3 3h6" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold mb-2">2. Get QR Ticket</h4>
                        <p class="text-sm text-slate-600">Receive a digital ticket with a unique QR code for your appointment.</p>
                    </div>

                    <div class="flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-white rounded-full border-4 border-primary flex items-center justify-center mb-6 shadow-lg">
                            {{-- check circle --}}
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold mb-2">3. Arrive & Check-in</h4>
                        <p class="text-sm text-slate-600">Scan your QR code at the entrance to confirm your arrival instantly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- DOCTORS (UNCHANGED) --}}
    <section class="py-20" id="doctors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-4">Meet Our Medical Team</h2>
                <p class="text-slate-600">Dedicated professionals committed to providing the best care for our community.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all border border-primary/5">
                    <img alt="Dr. Elena Cruz" class="w-full h-72 object-cover object-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDhL6n7WWraGI4o5gtPpWTDy0_3ukcGV5I2igvT39RoqM7R_t-sHa83zOpPZbOrBLDatzxcjSzyG_lN1uuKaA5LMoGaeRE3LuU5and-n0Wxnc6dhvgb897ohWtUrA0190tjayLJdzfpp3cmNAlUT467zjQYN6JWGXl1OXZH4_48mhg9q641PpbOdUNd9vurAZN6eJKYZseQQc4Etk1xYuwTZeIges_tfNtLE5VpOfWJ4Fj-yjvPl4wuWr5m6m4aZo2ehuVSlY59buk"/>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900">Dr. Elena Cruz</h3>
                        <p class="text-primary font-semibold text-sm mb-4">General Physician</p>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6">Expert in preventive medicine with over 12 years of experience in rural community health.</p>
                        <button class="w-full py-2 bg-primary/10 text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-colors">View Profile</button>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all border border-primary/5">
                    <img alt="Dr. Marcus Reyes" class="w-full h-72 object-cover object-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBwTDCiQudy5dNxNrsc7hVM9UBrf63-V8B0IKSsnxELSqKC_zdG7P1Gw1kNYjdMGYiqHE82YdmKX5hEvPLKrpvC23D5nSbrG_cdqhQBMXd3U0CKyGBlzl157VYg9KkikxxsgiiG5t2hArLXzX2vG7RcTfX-Q22PEbFGpEa5mya_gitI3rKgMMILxVdOfLJ0reAkl9L5P3kTb2RNVP9B6KNGhItoY4p-T1vATZVpumR-lRJmWdwQjbtlGKsLhd7ai5MlAOdF2i3flQg"/>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900">Dr. Marcus Reyes</h3>
                        <p class="text-primary font-semibold text-sm mb-4">Pediatrician</p>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6">Specializing in child development and pediatric infectious diseases for over 8 years.</p>
                        <button class="w-full py-2 bg-primary/10 text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-colors">View Profile</button>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all border border-primary/5">
                    <img alt="Dr. Sarah Lim" class="w-full h-72 object-cover object-top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDhcKzBJFqViS-h28sF3vaonxusGN3vSIybVP-GoTQ8cmMVHjwKuEhBsIdhfmShULrmENhgeZjPMAIS_zf9Tzk1vr3Tw0PqujXFKTx75DYTqf2-l8K1N6sO4SjKGYn0nwa_LOUxmTcoPKTYwU8rCUVt2UXxKcnTC9sBC0bXy6QMj8VkhCPjPmS015HBRirREbLw-qH6L9isM5byvXSs0vddvrp5dbH_PbHmd8joHUW18BeTsFtv3ZsF1Kcpcd15vjAb0ARytJQSSoA"/>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900">Dr. Sarah Lim</h3>
                        <p class="text-primary font-semibold text-sm mb-4">Dentist</p>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6">A specialist in restorative dentistry and oral hygiene education for families.</p>
                        <button class="w-full py-2 bg-primary/10 text-primary font-bold rounded-lg hover:bg-primary hover:text-white transition-colors">View Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTACT (icons replaced) --}}
    <section class="py-20 bg-white" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-extrabold mb-8">Visit Our Center</h2>
                    <div class="space-y-6">

                        <div class="flex items-start gap-4">
                            <div class="bg-primary/10 p-3 rounded-lg text-primary shrink-0">
                                {{-- location --}}
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21s7-4.5 7-11a7 7 0 1 0-14 0c0 6.5 7 11 7 11Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 10.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Our Location</h4>
                                <p class="text-slate-600">123 Healthway Drive, San Jose Municipality, Rural Province</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-primary/10 p-3 rounded-lg text-primary shrink-0">
                                {{-- clock --}}
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6l4 2" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Working Hours</h4>
                                <p class="text-slate-600">Monday - Friday: 8 AM - 5 PM</p>
                                <p class="text-slate-600">Saturday: 8 AM - 12 PM</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-primary/10 p-3 rounded-lg text-primary shrink-0">
                                {{-- phone --}}
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372a1.125 1.125 0 0 0-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97a1.125 1.125 0 0 0 .417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Contact Details</h4>
                                <p class="text-slate-600">Appointments: (555) 123-4567</p>
                                <p class="text-primary font-bold">Emergency: 911</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="rounded-2xl overflow-hidden h-[400px] shadow-lg border border-primary/10">
                    <div class="w-full h-full bg-slate-200 flex flex-col items-center justify-center text-slate-500 relative">
                        {{-- map icon --}}
                        <svg class="w-14 h-14 mb-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 20.25 3.75 18V4.5L9 6.75l6-3 5.25 2.25V19.5L15 17.25l-6 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 6.75v13.5M15 3.75v13.5" />
                        </svg>

                        <p class="font-bold">Interactive Map Component</p>
                        <div class="absolute inset-0 bg-primary/5 pointer-events-none"></div>
                        <img class="absolute inset-0 w-full h-full object-cover opacity-20 grayscale"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlm5P27H_WcG6dQeQAotKegkwcTINxhVsl0p-ZawXMiqhTn5SKySxHcYb-bCYby3dx6F39wBlCLisOv_yaHYgcK6KRPPpGrEGctwsMGi9ivniEfkZviSybIqUeCH_nWnophiH7Ni1iYydcDvLpVYkCCxVIwLpEG79KXGSXqPBSHXDGUU0VKPALleDcPHSY4Xk3qACF5pxqx9EgnMyGkbKr6RMx7E4tQ6Kw_k9qESTsmw2I1jr3oxe4WmAc6C8QFiEMln4gluqBqVU" />
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection