<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b p-5">
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                    <!-- Validation Errors -->
                        <x-alert-danger class="mb-4" :errors="$errors" />
                    <!-- Task title -->
                        <div>
                            <x-label for="task" :value="__('Task')" />

                            <x-input id="task" class="block mt-1 w-full" type="text" name="task" :value="old('task')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
