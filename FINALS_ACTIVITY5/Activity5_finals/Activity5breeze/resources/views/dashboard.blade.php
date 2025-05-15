<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div> -->

            <!-- Additional Content -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-700 dark:text-gray-300">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-100">Welcome, {{ Auth::user()->name }}!</h3>
                    <p class="mb-4">
                        This is your personalized dashboard. Use the navigation menu to explore features, manage your profile, and access tools available to you.
                    </p>
                    <ul class="list-disc list-inside space-y-1">
                        <li>✅ View and edit your <strong>Profile</strong></li>
                        <li>📄 Access recent <strong>Reports</strong></li>
                        <li>⚙️ Configure your <strong>Account Settings</strong></li>
                        <li>🆘 Contact <strong>Support</strong> for help</li>
                    </ul>
                </div>
            </div>

            <!-- Tip Box -->
            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-sm text-gray-600 dark:text-gray-400 italic">
                    💡 Tip: Use the upper-right menu to log out or manage your account quickly.
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
