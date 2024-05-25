<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Applicant's Vacant") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-10">
                        {{ __("Applicant's Vacant: :title",['title' => $vacant->title]) }}
                    </h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 w-full">
                            @forelse($vacant->applicants as $applicant)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800 dark:text-gray-100">{{$applicant->user->name}}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{$applicant->user->email}}</p>
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                            {{__('Apply day:')}} <span class="font-normal">{{$applicant->user->created_at->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                    <div>
                                        <a class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 dark:border-indigo-700 text-sm leading-5 font-medium rounded-full bg-white dark:bg-indigo-600 hover:bg-gray-50 dark:hover:bg-indigo-700"
                                            href="{{asset('storage/cv/'.$applicant->cv)}}" target="_blank" rel="noreferrer noopener">
                                            {{__(' View Resume')}}
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p>{{__('None Applicants')}}</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
