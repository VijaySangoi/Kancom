<x-layouts.app>
    <div class="mb-6 flex items-center text-sm">
        <a href="{{ route('dashboard') }}"
            class="text-blue-600 dark:text-blue-400 hover:underline">{{ __('Dashboard') }}</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <span class="text-gray-500 dark:text-gray-400">{{ __('Ebay') }}</span>
    </div>

    <!-- Page Title -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Ebay') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Add or Update your Ebay accounts') }}</p>
    </div>
    <div class="p-6">
        <div class="flex flex-col md:flex-row gap-6">
        <div class="w-full md:w-64 shrink-0 border-r border-gray-200 dark:border-gray-700 pr-4">
            <nav class="bg-gray-50 dark:bg-gray-800 rounded-lg overflow-hidden">
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @if (count($stores) > 0)
                    @foreach ($stores as $key => $value)
                    <li>
                        <a @class([
                            'setValues bg-gray-100 dark:bg-gray-700 block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-600' => !request()->routeIs(
                                'ebay'),
                            'setValues bg-white dark:bg-gray-600 block px-4 py-3  text-gray-900 dark:text-gray-100 font-medium' => request()->routeIs(
                                'ebay'),
                        ]) data-name="{{ __($value->store_name)}}" data-clientId="{{ __($value->ebay_client_id)}}" data-devId ="{{ __($value->ebay_dev_id)}}"
                        data-clientSecret="{{ __($value->ebay_client_secret)}}" data-redirectUri="{{ __($value->ebay_redirect_uri)}}" data-id="{{ __($value->id)}}">
                            {{ __($value->store_name)}}
                        </a>
                    </li>
                    @endforeach
                @endif
                <li>
                    <a @class([
                            'clearValues bg-gray-100 dark:bg-gray-700 block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-600' => !request()->routeIs(
                                'ebay'),
                            'clearValues bg-white dark:bg-gray-600 block px-4 py-3  text-gray-900 dark:text-gray-100 font-medium' => request()->routeIs(
                                'ebay'),
                        ])>+</a>
                </li>
                </ul>
            </nav>
        </div>
        <div class="flex-1">
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-6">
                    <div class="p-6">
                        <!-- Profile Form -->
                        <form class="max-w-md mb-10" action="" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-6">
                                <x-forms.input label="Name" name="Name" type="text"
                                    value="" />
                            </div>
                            <div class="mb-4">
                                <x-forms.input label="Client ID" name="ClientId" type="text"
                                    value="" />
                            </div>
                            <div class="mb-6">
                                <x-forms.input label="Dev ID" name="DevId" type="text"
                                    value="" />
                            </div>
                            <div class="mb-6">
                                <x-forms.input label="Client Secret" name="ClientSecret" type="password"
                                    value="" />
                            </div>
                            <div class="mb-6">
                                <x-forms.input label="Redirect URI" name="RedirectUri" type="text"
                                    value="" />
                            </div>
                            <div>
                                <x-button type="primary">{{ __('Save') }}</x-button>
                            </div>
                        </form>

                        <!-- Delete Account Section -->
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mt-6">
                            <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200 mb-1">
                                {{ __('Delete Store') }}
                            </h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                {{ __('Delete your Store and all of its resources') }}
                            </p>
                            <form action="{{ route('ebay') }}" method="POST"
                                onsubmit="return confirm('{{ __('Are you sure you want to delete your Store?') }}')">
                                @csrf
                                @method('DELETE')
                                <input hidden name='DeleteId' id='Del'>
                                <x-button type="danger">{{ __('Delete Store') }}</x-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <div>
    </div>
    <script>
    $(".setValues").on('click',(e)=>{
        $("#Name").val(e.currentTarget.getAttribute('data-name'));
        $("#ClientId").val(e.currentTarget.getAttribute('data-clientId'));
        $("#DevId").val(e.currentTarget.getAttribute('data-devId'));
        $("#ClientSecret").val(e.currentTarget.getAttribute('data-clientSecret'));
        $("#RedirectUri").val(e.currentTarget.getAttribute('data-redirectUri'));
        $("#Del").val(e.currentTarget.getAttribute('data-id'));
    });
    $(".clearValues").click((e)=>{
        $("#Name").val("");
        $("#ClientId").val("");
        $("#DevId").val("");
        $("#ClientSecret").val("");
        $("#RedirectUri").val("");
        $("#Del").val("");
    });
    </script>
</x-layouts.app>