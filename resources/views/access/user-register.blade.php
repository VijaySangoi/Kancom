<x-layouts.app>
    <div class="flex-1 flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6">
                    <div class="text-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Create User') }}</h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            {{ __('Enter details below to create an account') }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Full Name Input -->
                        <div class="mb-4">
                            <x-forms.input label="Full Name" name="name" type="text"
                                placeholder="{{ __('Full Name') }}" />
                        </div>

                        <!-- Email Input -->
                        <div class="mb-4">
                            <x-forms.input label="Email" name="email" type="email" placeholder="your@email.com" />
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <x-forms.input label="Password" name="password" type="password" placeholder="••••••••" />
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="mb-4">
                            <x-forms.input label="Confirm Password" name="password_confirmation" type="password"
                                placeholder="••••••••" />
                        </div>

                        <!-- Register Button -->
                        <x-button type="primary" class="w-full">{{ __('Create Account') }}</x-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
