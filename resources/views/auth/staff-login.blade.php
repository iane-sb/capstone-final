@extends('layouts.app')

@section('title', 'Staff Login')

@section('content')
<div class="min-h-[calc(100vh-80px)] bg-background-light flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-primary/10 p-8 relative overflow-hidden">
        
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary/5 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-primary/5 rounded-full blur-2xl"></div>

        <div class="relative z-10">
            <div class="text-center mb-8">
                <div class="inline-flex bg-primary/10 p-4 rounded-2xl mb-4 text-primary shadow-sm">
                    <span class="material-symbols-outlined text-4xl">admin_panel_settings</span>
                </div>
                <h2 class="text-2xl font-extrabold text-slate-900">
                    Staff Portal Access
                </h2>
                <p class="text-slate-500 mt-2 text-sm">Sign in to manage queues and appointments</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200 flex items-start gap-3 text-sm">
                    <span class="material-symbols-outlined text-red-500 shrink-0">error</span>
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('staff.login.submit') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-slate-400 text-lg">mail</span>
                        </div>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               class="w-full pl-11 border border-slate-300 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary focus:outline-none transition-colors"
                               placeholder="admin@example.com">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-slate-400 text-lg">lock</span>
                        </div>
                        <input type="password"
                               name="password"
                               required
                               class="w-full pl-11 border border-slate-300 rounded-xl px-4 py-3 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-primary focus:border-primary focus:outline-none transition-colors"
                               placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm pt-2">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox"
                               name="remember"
                               class="rounded border-slate-300 text-primary focus:ring-primary w-4 h-4 transition-colors">
                        <span class="ml-2 text-slate-600 font-medium">Remember my device</span>
                    </label>
                </div>

                <button type="submit"
                        class="w-full bg-primary text-white py-3.5 rounded-xl font-bold shadow-lg shadow-primary/30 hover:bg-primary/90 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2 mt-4">
                    <span>Secure Login</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection