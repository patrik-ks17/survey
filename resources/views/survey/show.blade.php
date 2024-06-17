<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 text-center">
            {{ $survey->title }}
        </h2>
    </x-slot>

    <div class="py-10 text-center">
        <div class="max-w-sm mx-auto sm:px-5 lg:px-6">
            <a class="btn btn-dark" href="/survey/{{$survey->id}}/questions/create">Add Question</a>
            <a class="btn btn-dark ml-3" href="/surveys/{{ $survey->id }}-{{ Str::slug($survey->title) }}">Take Survey</a>
        </div>

        @foreach ($survey->questions as $question)
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="card-header">{{ $question->question }}</div>
            <ul class="list-group">
                @foreach ($question->answers as $answer)
                <li class="list-group-item">{{ $answer->answer }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach

    </div>



</x-app-layout>