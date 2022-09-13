<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Builder') }}
        </h2>
    </x-slot>

    @livewire("form-builder.form.$operation", ['user' => $user])

</x-app-layout>
