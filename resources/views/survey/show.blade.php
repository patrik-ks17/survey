<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 text-center">
            {{ $survey->title }}
        </h2>
    </x-slot>

    <div class="py-10 text-center">
        <div class="max-w-sm mx-auto sm:px-5 lg:px-6">
            <a class="btn btn-dark" href="/survey/{{$survey->id}}/questions/create">Add Question</a>
            <a class="btn btn-dark ml-3" href="/surveys/{{ $survey->id }}-{{ Str::slug($survey->title) }}">Take
                Survey</a>
        </div>

        @foreach ($survey->questions as $question)
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="card-header">{{ $question->question }}</div>
            <ul class="list-group">
                @foreach ($question->answers as $answer)
                <li class="list-group-item inline-flex justify-between">
                    <div class="mr-2">{{ $answer->answer }}</div>
                    {{-- <small>{{ $answer->responses->count() }} / {{ $question->responses->count() }}</small> --}}
                    @if ($question->responses->count())
                    <div>{{ round($answer->responses->count() * 100 / $question->responses->count()) }}%</div>
                    @endif
                </li>
                @endforeach
            </ul>

            <div class="card-footer flex justify-content-start">
                <form action="/survey/{{ $survey->id }}/questions/{{ $question->id }}" method="post">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>
                </form>
            </div>
        </div>
        @endforeach

    </div>



</x-app-layout>