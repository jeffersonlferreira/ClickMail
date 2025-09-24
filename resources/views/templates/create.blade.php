<x-layouts.app>
    <x-slot name="header">
        <h2>{{ __('Templates') }} > {{ __('Create') }}</h2>
    </x-slot>

    <x-card>
        <x-form :action="route('templates.store')" post>

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-input.text id="name" class="block w-full mt-1" name="name" :value="old('name')" autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="body" :value="__('Body')" />
                <x-input.richtext name="body" :value="old('body')" />
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <div class="flex items-center space-x-4">
                <x-button.link secondary :href="route('templates.index')">{{ __('Cancel') }}</x-button.link>
                <x-button type="submit">{{ __('Save') }}</x-button>
            </div>

        </x-form>
    </x-card>
</x-layouts.app>
