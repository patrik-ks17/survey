<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $survey->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 border">
                <a class="btn btn-dark" href="/survey/{{$survey->id}}/questions/create">Add Question</a>
            </div>
        </div>
    </div>
</x-app-layout>