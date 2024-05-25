<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 dark:text-gray-200 my-3">
            {{$vacant->title}}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 dark:bg-gray-700 p-4 my-10">
            <p class="font-bold text-sm uppercase dark:text-gray-200 my-3">{{__('Company')}}:
            <span class="normal-case font-normal">{{$vacant->company}}</span></p>
            <p class="font-bold text-sm uppercase dark:text-gray-200 my-3">{{__('Last day to apply')}}:
                <span class="normal-case font-normal">{{Carbon\Carbon::create($vacant->last_day)->isoFormat('dddd D [de] MMMM [del] YYYY')}}</span></p>
            <p class="font-bold text-sm uppercase dark:text-gray-200 my-3">{{__('Category')}}:
                <span class="normal-case font-normal">{{$vacant->category->name}}</span></p>
            <p class="font-bold text-sm uppercase dark:text-gray-200 my-3">{{__('Salary')}}:
                <span class="normal-case font-normal">{{$vacant->salary->name}}</span></p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="col-span-2">
            <img src="{{Storage::url('/vacants/'.$vacant->image)}}" alt="{{"Vacant's image ". $vacant->title}}">
        </div>
        <div class="col-span-4">
            <h2 class="text-2xl font-bold mb-5 dark:text-gray-200">{{__('Job Description')}}</h2>
            <p class="dark:text-gray-200">{{$vacant->description}}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-50 dark:bg-gray-700 border border-dashed p-5 text-center">
            <p class="dark:text-gray-200">{{__('You may apply to this vacant?')}} <a class="font-bold dark:text-indigo-600 hover:text-indigo-500" href="{{route('register')}}">{{__('Get an account and apply to this or another vacant')}}</a></p>
        </div>
    @endguest

    @cannot('create',App\Models\Vacant::class)
        @livewire('apply-vacant',['vacant' => $vacant])
    @endcannot
</div>
