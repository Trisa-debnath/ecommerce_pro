<!DOCTYPE html>
<html>
<head>
    @livewireStyles
</head>
<body>
    <div class="hero_area">
        <livewire:home.header />
    </div>

    <main>
        {{ $slot }} </main>

    @include('home.footer')

    @livewireScripts
</body>
</html>
