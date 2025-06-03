<x-app-layout>
    <x-slot name="header">
        <h2 class="profile-header">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="profile-container">
            <div class="profile-card">
                <div class="profile-card-inner">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-card-inner">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-card-inner">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>