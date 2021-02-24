<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Session Status -->
            <x-alert-success class="mb-4" :status="session('status')" />

            <x-link-button href="{{ route('tasks.create') }}" class="ml-3 my-2">
                {{ __('Create Task') }}
            </x-link-button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b">
                    @if(!$tasks->isEmpty())
                        <table class="table-fixed border-b border-gray-200">
                            <thead class="border-b bg-gray-50">
                            <tr class="text-left font-medium text-gray-500">
                                <th class="w-full px-6 py-3">Title</th>
                                <th class="w-full px-6 py-3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr class="border-b border-gray-150">
                                    <td class="w-full px-6 py-3">{{ $task->task }}</td>
                                    <td class="w-full px-6 py-3 gap-2 flex">
                                        <x-link-button href="{{ route('tasks.edit', $task) }}" class="ml-3">
                                            {{ __('Edit') }}
                                        </x-link-button>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <x-button class="ml-3 bg-red-500 hover:bg-red-700" onClick="confirm('Are you sure you want to delete this book?')">
                                                {{ __('Delete') }}
                                            </x-button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    @else
                        <p class="p-5">No data found</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
