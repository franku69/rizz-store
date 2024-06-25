<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <style>
        /* Custom styles for the profile page */
        .profile-section {
            padding: 1rem;
            background-color: #fff; /* Light background */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            margin-bottom: 1.5rem;
        }

        .profile-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #333; /* Dark text color */
        }

        .profile-content {
            font-size: 1.1rem;
            color: #666; /* Slightly lighter text color */
            line-height: 1.6;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="profile-section">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="profile-section">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="profile-section">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
