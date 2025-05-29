<x-app-layout>
    {{-- HEADER SLOT --}}
    <x-slot name="header">
        <h2 class=" text-center font-semibold text-3xl text-white leading-tight">
            {{ __('Your Profile') }}
        </h2>
    </x-slot>

    {{-- MAIN CONTENT WITH BACKGROUND color --}}
  <div class="py-12 bg-gradient-to-br from-navy via-babyblue ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white/90 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white/90 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white/90 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
