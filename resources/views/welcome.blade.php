{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
     @vite('resources/css/app.css')
     @include('layouts.header')
</head>
<body>
     

    <main class="py-6">
        @yield('content')
    </main>
    


</body>
</html> --}}

@extends('layouts.app')

@section('content')

    <section class="relative py-16 lg:py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:gap-12">
                <div class="lg:w-1/2 mb-12 lg:mb-0">
                    <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold uppercase tracking-widest text-primary bg-primary/10 rounded-full">Community Health First</span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-slate-900 leading-[1.1] mb-6">
                        Quality Healthcare <br/><span class="text-primary">Made Accessible</span>
                    </h1>
                    <p class="text-lg text-slate-600 mb-10 leading-relaxed max-w-xl">
                        Book appointments online and manage your clinic visits with our Smart Queuing system. Experience healthcare designed for your convenience.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('appointment.create') }}" class="bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-xl text-base font-bold shadow-lg shadow-primary/20 flex items-center justify-center gap-2 transition-all">
                            <span class="material-symbols-outlined">calendar_today</span>
                            Book Your Appointment
                        </a>
                        <a href="#services" class="border border-primary/20 bg-white px-8 py-4 rounded-xl text-base font-bold text-slate-700 hover:bg-primary/5 flex items-center justify-center gap-2 transition-all">
                            <span class="material-symbols-outlined">info</span>
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <div class="relative">
                        <div class="absolute -top-6 -left-6 w-24 h-24 bg-primary/10 rounded-full blur-2xl"></div>
                        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-primary/20 rounded-full blur-3xl"></div>
                        <img alt="Healthcare Unit" class="rounded-2xl shadow-2xl relative z-10 w-full object-cover aspect-[4/3]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCn2LhAh3_XmtWn4ZwV4JdEZpfajcanJx6QFWXMRlNm-3Fiyl8bxGG8NXUU6cY5-GHbIt5DifuFPvUkQUAj6Q6ISIG6Wzcco2HcZ719_069r5-eZtiHqHuvcXSxG_00ERgSbWGtZhmouLUKK11mChC5Li7QJJd9iY4SNdrJifxjph22_7I5QjPp3FLx6dZOSyniGhoaQAKiHoaGTabcNzJFIwQBidJr5-RR1RU_w4BSwDhndTxN88MUTMvJ6CgAt-kxTxwchFMCcKs"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white" id="services">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-4">Our Primary Services</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">We offer comprehensive primary care services to ensure the health and well-being of every family member in our community.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group p-8 rounded-2xl border border-primary/10 bg-background-light hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">stethoscope</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">General Check-up</h3>
                    <p class="text-slate-600 leading-relaxed">Comprehensive physical examinations and health screenings to keep you and your family in top health year-round.</p>
                </div>
                <div class="group p-8 rounded-2xl border border-primary/10 bg-background-light hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">dentistry</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Dental Services</h3>
                    <p class="text-slate-600 leading-relaxed">Professional oral health care including routine cleanings, fillings, and dental treatments for all ages.</p>
                </div>
                <div class="group p-8 rounded-2xl border border-primary/10 bg-background-light hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">child_care</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Maternal Care</h3>
                    <p class="text-slate-600 leading-relaxed">Specialized prenatal and postnatal care for expectant mothers and newborns ensuring a healthy start for every child.</p>
                </div>
            </div>
        </div>
    </section>

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
                            <span class="material-symbols-outlined text-primary text-3xl">event_available</span>
                        </div>
                        <h4 class="text-lg font-bold mb-2">1. Book Online</h4>
                        <p class="text-sm text-slate-600">Select your service and preferred time slot through our website.</p>
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-white rounded-full border-4 border-primary flex items-center justify-center mb-6 shadow-lg">
                            <span class="material-symbols-outlined text-primary text-3xl">qr_code_2</span>
                        </div>
                        <h4 class="text-lg font-bold mb-2">2. Get QR Ticket</h4>
                        <p class="text-sm text-slate-600">Receive a digital ticket with a unique QR code for your appointment.</p>
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-white rounded-full border-4 border-primary flex items-center justify-center mb-6 shadow-lg">
                            <span class="material-symbols-outlined text-primary text-3xl">check_circle</span>
                        </div>
                        <h4 class="text-lg font-bold mb-2">3. Arrive & Check-in</h4>
                        <p class="text-sm text-slate-600">Scan your QR code at the entrance to confirm your arrival instantly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <section class="py-20 bg-white" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-extrabold mb-8">Visit Our Center</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/10 p-3 rounded-lg text-primary shrink-0">
                                <span class="material-symbols-outlined">location_on</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Our Location</h4>
                                <p class="text-slate-600">123 Healthway Drive, San Jose Municipality, Rural Province</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/10 p-3 rounded-lg text-primary shrink-0">
                                <span class="material-symbols-outlined">schedule</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Working Hours</h4>
                                <p class="text-slate-600">Monday - Friday: 8 AM - 5 PM</p>
                                <p class="text-slate-600">Saturday: 8 AM - 12 PM</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="bg-primary/10 p-3 rounded-lg text-primary shrink-0">
                                <span class="material-symbols-outlined">phone_in_talk</span>
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
                        <span class="material-symbols-outlined text-6xl mb-4">map</span>
                        <p class="font-bold">Interactive Map Component</p>
                        <div class="absolute inset-0 bg-primary/5 pointer-events-none"></div>
                        <img class="absolute inset-0 w-full h-full object-cover opacity-20 grayscale" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlm5P27H_WcG6dQeQAotKegkwcTINxhVsl0p-ZawXMiqhTn5SKySxHcYb-bCYby3dx6F39wBlCLisOv_yaHYgcK6KRPPpGrEGctwsMGi9ivniEfkZviSybIqUeCH_nWnophiH7Ni1iYydcDvLpVYkCCxVIwLpEG79KXGSXqPBSHXDGUU0VKPALleDcPHSY4Xk3qACF5pxqx9EgnMyGkbKr6RMx7E4tQ6Kw_k9qESTsmw2I1jr3oxe4WmAc6C8QFiEMln4gluqBqVU"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection