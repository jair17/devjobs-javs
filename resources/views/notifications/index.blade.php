<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-10">
                        {{__('My notifications')}}
                    </h1>
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($notifications as $notification)
                            <div class="dark:text-gray-200 p-5 lg:flex lg:justify-between lg:items-center">
                                <div>
                                    <p>{{__('You have a new applicant in:')}}
                                        <span class="font-bold">{{$notification->data['vacant_title']}}</span></p>
                                    <p><span class="font-bold">{{$notification->created_at->diffForHumans()}}</span></p>
                                </div>
                                <div class="mt-5 lg:mt-0">
                                    <a href=""
                                       class="bg-indigo-50 dark:bg-indigo-700 p-3 text-sm uppercase font-bold text-white rounded-lg">{{__('View Applicants')}}</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-200">{{__('None notifications')}}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
