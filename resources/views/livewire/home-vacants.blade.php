<div>
    @livewire('filter-vacant')
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 dark:text-gray-200 mb-12">{{__('Nuestras vacantes disponibles')}}</h3>
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-400 dark:divide-gray-700">
                @forelse($vacants as $vacant)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{route('vacants.show',$vacant)}}"
                               class="text-3xl font-extrabold text-white dark:text-gray-200">
                                {{$vacant->title}}
                            </a>
                            <p class="text-base text-gray-300 mb-3">{{$vacant->company}}</p>
                            <p class="text-xs font-bold text-gray-300 mb-3">{{$vacant->category->name}}</p>
                            <p class="text-base text-gray-300 mb-3">{{$vacant->salary->name}}</p>
                            <p class="font-bold text-xs text-gray-600 dark:text-gray-300">{{__('Ultimo dia para postularse:')}}
                            <span class="font-normal">{{Carbon\Carbon::create($vacant->last_day)->isoFormat('dddd D [de] MMMM [del] YYYY')}}</span></p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a href="{{route('vacants.show',$vacant)}}"
                               class="bg-indigo-50 hover:bg-indigo-300 dark:bg-indigo-800 dark:hover:bg-indigo-900 p-3 text-sm uppercase font-bold text-white dark:text-gray-200 rounded-lg block text-center">{{__('View vacants')}}</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-200">{{__('None vacants')}}</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
