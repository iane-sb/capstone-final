<footer class="bg-slate-900 text-slate-300 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">

            {{-- Brand --}}
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-2 mb-6">

                    <div class="bg-green-600 p-1.5 rounded-lg text-white">

                        {{-- Medical Shield Logo --}}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21c4.418 0 8-4.03 8-9V6.4a2 2 0 0 0-1.2-1.83l-6-2.7a2 2 0 0 0-1.6 0l-6 2.7A2 2 0 0 0 4 6.4V12c0 4.97 3.582 9 8 9Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6M9 12h6"/>
                        </svg>

                    </div>

                    <h2 class="text-xl font-bold text-white">
                        Rural Health Unit
                    </h2>
                </div>

                <p class="text-sm leading-relaxed">
                    Dedicated to bringing world-class healthcare to our rural communities through technology and compassion.
                </p>
            </div>


            {{-- Quick Links --}}
            <div>
                <h3 class="text-white font-bold mb-6">Quick Links</h3>

                <ul class="space-y-4 text-sm">
                    <li>
                        <a class="hover:text-green-400 transition-colors" href="#">
                            Book Online
                        </a>
                    </li>

                    <li>
                        <a class="hover:text-green-400 transition-colors" href="#">
                            Our Services
                        </a>
                    </li>

                    <li>
                        <a class="hover:text-green-400 transition-colors" href="#">
                            Health Tips
                        </a>
                    </li>

                    <li>
                        <a class="hover:text-green-400 transition-colors" href="#">
                            Patient Portal
                        </a>
                    </li>
                </ul>
            </div>


            {{-- Services --}}
            <div>
                <h3 class="text-white font-bold mb-6">Services</h3>

                <ul class="space-y-4 text-sm">
                    <li>
                        <a class="hover:text-green-400 transition-colors" href="#">
                            Immunization
                        </a>
                    </li>

                    <li>
                        <a class="hover:text-green-400 transition-colors" href="#">
                            Family Planning
                        </a>
                    </li>

                    <li>
                        <a class="hover:text-green-400 transition-colors" href="#">
                            Lab Testing
                        </a>
                    </li>

                    <li>
                        <a class="hover:text-green-400 transition-colors" href="#">
                            Pharmacy
                        </a>
                    </li>
                </ul>
            </div>


            {{-- Emergency --}}
            <div>
                <h3 class="text-white font-bold mb-6">Emergency Hotlines</h3>

                <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                    <p class="text-green-400 font-black text-2xl mb-1">
                        911
                    </p>

                    <p class="text-xs uppercase tracking-widest text-slate-400">
                        National Emergency
                    </p>
                </div>
            </div>

        </div>


        {{-- Bottom Bar --}}
        <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">

            <p>
                © {{ date('Y') }} Rural Health Unit. All rights reserved.
            </p>

            <div class="flex gap-6">
                <a class="hover:text-white transition-colors" href="#">
                    Privacy Policy
                </a>

                <a class="hover:text-white transition-colors" href="#">
                    Terms of Service
                </a>
            </div>

        </div>

    </div>
</footer>