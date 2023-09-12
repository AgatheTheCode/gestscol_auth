<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial scale=1.0">
    @vite('resources/css/app.css')
</head>
<header class="flex flex-row bg-gray-800 text-white w-full items-center justify-center gap-5 p-5">
    <title>{{ 'title' }}</title>
    <h1 class="">GestScol</h1>
    <nav>
        <ul class="flex flex-row">
            <li class="m-2 p-2 rounded-full bg-blue-600 text-white"><a href="{{ route('formation.index') }}">Formations</a></li>
            <li class="m-2 p-2 rounded-full bg-blue-600 text-white"><a href="{{ route('student.index') }}">Élèves</a></li>
        </ul>
    </nav>
</header>
<body>
<main class="m-auto w-[100vw]">
    <wrap class="flex flex-col justify-center gap-2">
        <div class="m-auto my-4 p-5 w-fit border-2 border-gray-300 rounded-2xl">
    {{ $slot }}
        </div>
    </wrap>
</main>
</body>
<footer class="flex flex-row bg-gray-800 text-white w-full justify-center p-2.5">
    <p>prout - prout - prout </p>
</footer>
