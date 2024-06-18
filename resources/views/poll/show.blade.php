<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
            {{ $survey->title }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl pb-5 mx-auto sm:px-6 lg:px-8">
            <form action="/surveys/{{ $survey->id }}-{{ Str::slug($survey->title) }}" method="post">
                @csrf

                @foreach ($survey->questions as $key => $question)
                <div class="mt-4 card">
                    <div class="card-header"><strong>{{ $key + 1 }}.</strong> {{ $question->question }}</div>

                    <div class="card-body">
                        @error('responses.' . $key . '.answer_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <ul class="list-group">
                            @foreach ($question->answers as $answer)
                            <label for="answer{{ $answer->id }}">
                                <li class="list-group-item">
                                    <input type="radio" name="responses[{{ $key }}][answer_id]"
                                        id="answer{{ $answer->id }}" class="mr-2" {{ (old('responses.' . $key
                                        . '.answer_id' )==$answer->id) ? 'checked' : ''}} value="{{ $answer->id }}">
                                    {{ $answer->answer }}

                                    <input type="hidden" name="responses[{{ $key }}][question_id]"
                                        value="{{ $question->id }}">
                                </li>
                            </label>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach

                <div class="mt-4 card">
                    <div class="card-header">Your Information</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" name="poll[name]" class="form-control" id="name"
                                aria-describedby="nameHelp" placeholder="Enter Your Name">
                            <small id="nameHelp" class="form-text text-muted">Hello! What's your name?</small>

                            @error('poll.name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" name="poll[email]" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Enter Email">
                            <small id="emailHelp" class="form-text text-muted">Your Email Please!</small>

                            @error('poll.email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="flex justify-content-center">
                        <button type="submit" class="mb-3 btn btn-dark">Complete Survey</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>