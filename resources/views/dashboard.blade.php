<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto w-50 sm:px-6 lg:px-8">
            <div class="flex justify-content-center overflow-hidden bg-white shadow-sm ju sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="survey/create" class="btn btn-dark">Create new Survey</a>
                </div>
            </div>
        </div>
        <div class="mx-auto w-50 sm:px-6 lg:px-8 mt-4">
            <div class="flex justify-content-center overflow-hidden bg-white shadow-sm ju sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-group">
                        @foreach ($surveys as $survey)
                            <li class="list-group-item mt-2">
                                <a href="{{ $survey->path() }}" class="text-info">{{ $survey->title }}</a>
                                <small class="block">{{ $survey->purpose }}</small>
                                <div class="mt-2">
                                    <small class="font-weight-bold">Share URL</small>
                                    <p>
                                        <a href="{{ $survey->publicPath() }}" class="text-info">
                                            {{ $survey->publicPath() }}
                                        </a>
                                    </p>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
