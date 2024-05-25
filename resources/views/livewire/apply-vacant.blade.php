<div class="bg-gray-100 dark:bg-gray-700 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold text-gray-200 ">{{__('Apply to this vacant')}}</h3>

    @if(session()->has('message'))
        <p class="uppercase border border-green-600 text-green-600 bg-green-200 font-bold p-2 my-5">
            {{session('message')}}
        </p>
    @else
        <form wire:submit.prevent="apply" class="w-95 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum or Resume')"/>
                <x-text-input id="cv" wire:model="cv" type="file" accept=".pdf" class="block mt-1 w-full p-2"/>
                <x-input-error :messages="$errors->get('cv')" class="mt-2"/>
            </div>

            <x-primary-button class="my-5">
                {{__('Apply')}}
            </x-primary-button>
        </form>
    @endif


</div>
