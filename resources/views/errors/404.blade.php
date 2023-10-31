@extends('layout')
@section('title', 'Реклама')

@section('content')
    <x-header>
        <x-slot:sup>Страница не найдена</x-slot>
        <x-slot:title>404</x-slot>

        <x-slot:description>
            Кажется, что-то пошло не так и вы застряли. Вернитесь на один шаг назад или воспользуйтесь кнопкой
            ниже, чтобы вернуться на домашнюю страницу.
        </x-slot>

        <x-slot:actions>
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4">Вернуться домой</a>
        </x-slot>
    </x-header>
@endsection
