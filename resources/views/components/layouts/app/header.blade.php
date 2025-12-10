<!-- Header -->
<header class="bg-white dark:bg-gray-800 shadow-sm z-20 border-b border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between h-16 px-4">
        <!-- Left side: Logo and toggle -->
        <div class="flex items-center">
            <button @click="toggleSidebar"
                class="p-2 rounded-md text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="ml-4 font-semibold text-xl text-blue-600 dark:text-blue-400">{{ config('app.name') }}</div>
        </div>

        <!-- Right side: Search, notifications, profile -->
        <div class="flex items-center space-x-4">
            <div x-data="{ open: false }" class="relative">
                <button id="store" @click="open = !open" class="flex items-center focus:outline-none">
                    @if($user_store)
                    {{$user_store->store_name}}
                    @else
                    please select
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" :class="{ 'block': open, 'hidden': !open }"
                    class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-gray-700">
                    @foreach ($stores as $index => $details)
                    @if ($index>0)
                    <div class="border-t border-gray-200 dark:border-gray-700"></div>
                    @endif
                    <form method="POST" action="{{ route('set_store') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="block w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex items-center">
                        <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" xml:space="preserve" 
                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:2">
                        <path style="fill:none" d="M0 0h64v64H0z"/>
                        <path d="M34 34.747c0-.339.275-.614.614-.614h8.772c.339 0 .614.275.614.614V50H34V34.747zM55 34.991a.858.858 0 0 0-.857-.858h-6.352a.858.858 0 0 0-.858.858v6.285c0 .473.384.857.858.857h6.352a.857.857 0 0 0 .857-.857v-6.285zM44 40.356h2.933M44 36.444h2.933M51.2 37.333 50.133 38.4M50.769 13.394a4.5 4.5 0 0 0-4.137-2.727H17.368a4.5 4.5 0 0 0-4.137 2.727L8 25.6h48l-5.231-12.206zM17.067 25.6H9.6v1.465a2.802 2.802 0 0 0 2.801 2.802h1.864c.743 0 1.456-.295 1.981-.821a2.799 2.799 0 0 0 .821-1.981V25.6z" 
                        style="fill:none;stroke-width:2px" stroke="currentColor"/>
                        <path d="M24.533 25.6h-7.466v1.465a2.802 2.802 0 0 0 2.801 2.802h1.864a2.8 2.8 0 0 0 2.801-2.802V25.6z" 
                        style="fill:none;stroke-width:2px" stroke="currentColor"/>
                        <path d="M32 25.6h-7.467v1.465c0 .743.295 1.456.821 1.981a2.799 2.799 0 0 0 1.981.821h1.864A2.8 2.8 0 0 0 32 27.065V25.6z" 
                        style="fill:none;stroke-width:2px" stroke="currentColor"/>
                        <path d="M39.467 25.6H32v1.465a2.802 2.802 0 0 0 2.801 2.802h1.864c.743 0 1.456-.295 1.981-.821a2.799 2.799 0 0 0 .821-1.981V25.6z" 
                        style="fill:none;stroke-width:2px" stroke="currentColor"/>
                        <path d="M46.933 25.6h-7.466v1.465a2.802 2.802 0 0 0 2.801 2.802h1.864a2.8 2.8 0 0 0 2.801-2.802V25.6z" 
                        style="fill:none;stroke-width:2px" stroke="currentColor"/>
                        <path d="M54.4 25.6h-7.467v1.465c0 .743.295 1.456.821 1.981a2.799 2.799 0 0 0 1.981.821h1.864a2.8 2.8 0 0 0 2.801-2.802V25.6zM51 29.867v4.266M51 45.769v2.408c0 .484-.194.947-.538 1.289a1.847 1.847 0 0 1-1.3.534H29.867M15 50.133h-1.162A1.838 1.838 0 0 1 12 48.295V29.867M14.4 54h11.733L24 41h-7.467L14.4 54zM19.2 46h2.133M19.2 49.067h2.133" 
                        style="fill:none;stroke-width:2px" stroke="currentColor"/>
                        </svg>
                        <input hidden name="store_id" value="{{$details->id}}">
                        {{$details->store_name}}
                        </div>
                    </button>
                    </form>
                    @endforeach
                </div>
            </div>
            <!-- Profile -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center focus:outline-none">
                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                        <span
                            class="flex h-full w-full items-center justify-center rounded-lg bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                            {{ Auth::user()->initials() }}
                        </span>
                    </span>
                    <span class="ml-2 hidden md:block">{{ Auth::user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" :class="{ 'block': open, 'hidden': !open }"
                    class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-gray-700">
                    <a href="{{ route('settings.profile.edit') }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Settings
                        </div>
                    </a>
                    <div class="border-t border-gray-200 dark:border-gray-700"></div>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="block w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
