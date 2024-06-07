<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create new Survey
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 border">
                <form action="/survey" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp"
                            placeholder="Enter Title">
                        <small id="titleHelp" class="form-text text-muted">Give your survey a title that attracts
                            attention.</small>

                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose</label>
                        <input type="text" name="purpose" class="form-control" id="purpose"
                            aria-describedby="purposeHelp" placeholder="Enter Purpose">
                        <small id="purposeHelp" class="form-text text-muted">Giving a purpose wil increase
                            responses.</small>

                        @error('purpose')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create Survey</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>