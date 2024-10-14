<!doctype html>
<html lang="fr">
  <head>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta name='author' content="{{ $APP_AUTHOR_NAME }}, {{ $APP_CONTACT_EMAIL }}">
    <meta name='copyright' content="{{ $APP_NAME }}">
    <meta name="description" content="{{ $APP_DESCRIPTION }}">
    <meta name='language' content='fr'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LambdaMaths | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
  </head>
  <body class="antialiased overflow-x-hidden">
    <x-layout.navbar />
    @yield('content')
    <x-layout.footer />
  </body>
</html>
