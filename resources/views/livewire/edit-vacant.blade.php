<form wire:submit.prevent="edit" class="md:w-1/2 space-y-5" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <x-input-label for="title" :value="__('Vacant\'s title')"/>
        <x-text-input id="title" class="block mt-1 w-full"
                      type="text" wire:model="title" :value="old('title')"/>
        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
    </div>
    <div>
        <x-input-label for="salary_id" :value="__('Monthly salary')"/>
        <select id="salary_id" wire:model="salary_id"
                class="mt-1 block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option value="">{{__('None selected')}}</option>
            @foreach(App\Models\Salary::all() as $salary)
                <option value="{{$salary->id}}">{{$salary->name}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salary_id')" class="mt-2"/>
    </div>
    <div>
        <x-input-label for="category_id" :value="__('Category')"/>
        <select id="category_id" wire:model="category_id"
                class="mt-1 block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option value="">{{__('None selected')}}</option>
            @foreach(App\Models\Category::all() as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
    </div>
    <div>
        <x-input-label for="company" :value="__('Company')"/>
        <x-text-input id="company" class="block mt-1 w-full"
                      type="text" wire:model="company" :value="old('company')"/>
        <x-input-error :messages="$errors->get('company')" class="mt-2"/>
    </div>

    <div>
        <x-input-label for="last_day" :value="__('Last day')"/>
        <x-text-input id="last_day" class="block mt-1 w-full"
                      type="date" wire:model="last_day" :value="old('last_day')"/>
        <x-input-error :messages="$errors->get('last_day')" class="mt-2"/>
    </div>
    <div>
        <x-input-label for="description" :value="__('Description')"/>
        <textarea id="description"
                  class="mt-1 block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                  wire:model="description"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
    </div>

    <div>
        <x-input-label for="new_image" :value="__('Image')"/>
        <x-text-input id="new_image" class="block mt-1 p-3 w-full"
                      type="file" wire:model="new_image" accept="image/*"/>
        <x-input-error :messages="$errors->get('new_image')" class="mt-2"/>

        @if(!$new_image)
            <div class="my-5 w-80">
                <x-input-label :value="__('Current Image')"/>
                <img src="{{Storage::url('vacants/'.$image)}}" alt="{{__('Imagen Vacante '). $title }}"/>
            </div>
        @else
            <div class="my-5 w-80">
                {{__('New Image')}}:
                <img src="{{ $new_image->temporaryUrl() }}" alt="{{__('Imagen Vacante '). $title }}"/>
            </div>
        @endif
    </div>

    <x-primary-button>{{__('Save changes')}}</x-primary-button>
</form>
