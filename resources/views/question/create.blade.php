<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create new Question
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 border">
                <form action="/survey/{{ $survey->id }}/questions" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" name="question[question]" class="form-control" id="question"
                            aria-describedby="questionHelp" placeholder="Enter Question" value={{ old('question.question') }}>
                        <small id="questionHelp" class="form-text text-muted">
                            Ask simple and to-the-point questions for best results.
                        </small>

                        @error('question.question')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <fieldset>
                            <legend>Choices</legend>
                            <small id="choicesHelp" class="form-text text-muted">
                                Give choices that give you the most insight into your question.
                            </small>

                            <div>
                                <div class="form-group">
                                    <label for="answer1">Choice 1</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="question"
                                        aria-describedby="choicesHelp" placeholder="Enter Choice"
                                        value="{{ old('answers.0.answer') }}">

                                    @error('answers.0.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="answer2">Choice 2</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="question"
                                        aria-describedby="choicesHelp" placeholder="Enter Choice"
                                        value="{{ old('answers.1.answer') }}">

                                    @error('answers.1.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="answer3">Choice 3</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="question"
                                        aria-describedby="choicesHelp" placeholder="Enter Choice"
                                        value="{{ old('answers.2.answer') }}">

                                    @error('answers.2.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="answer4">Choice 4</label>
                                    <input type="text" name="answers[][answer]" class="form-control" id="question"
                                        aria-describedby="choicesHelp" placeholder="Enter Choice"
                                        value="{{ old('answers.3.answer') }}">

                                    @error('answers.3.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Question</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>