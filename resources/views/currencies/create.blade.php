<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create currency') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Valute ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Num Code
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Char Code
                        </th>
                        <th scope="col" class="py-3 px-6">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <form action="{{ route('currencies.store') }}" method="post">
                        @csrf
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                <x-text-input id="valuteID" name="valuteID" type="text" class="mt-1 block w-full" :value="old('valuteID')" required autofocus autocomplete="valuteID" />
                                <x-input-error class="mt-2" :messages="$errors->get('valuteID')" />
                            </th>
                            <td class="py-4 px-6">
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </td>
                            <td class="py-4 px-6">
                                <x-text-input id="numCode" name="numCode" type="number" class="mt-1 block w-full" :value="old('numCode')" required autofocus autocomplete="numCode" />
                                <x-input-error class="mt-2" :messages="$errors->get('numCode')" />
                            </td>
                            <td class="py-4 px-6">
                                <x-text-input id="charCode" name="charCode" type="text" class="mt-1 block w-full" :value="old('charCode')" required autofocus autocomplete="charCode" />
                                <x-input-error class="mt-2" :messages="$errors->get('charCode')" />
                            </td>
                            <td class="py-4 px-6">
                                <x-primary-button>{{ __('Create') }}</x-primary-button>
                            </td>
                        </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
