<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Home
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3>Welcome, {{ Auth::user()->name }}</h3>

                <p class="mt-3">
                    You are logged in as <strong>User</strong>.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>