<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        /* Custom styles for the dashboard */
        .dashboard-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .dashboard-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #333; /* Dark text color for light mode */
        }

        .dashboard-content {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #666; /* Lighter text color */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1.5rem;
            }

            .dashboard-title {
                font-size: 1.3rem;
                margin-bottom: 0.75rem;
            }

            .dashboard-content {
                font-size: 1rem;
            }
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dashboard-container">
                <div class="p-4">
                    <h2 class="dashboard-title">{{ __("Welcome to your Dashboard!") }}</h2>
                    <p class="dashboard-content">{{ __("You're logged in!") }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
