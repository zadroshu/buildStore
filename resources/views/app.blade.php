<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title inertia>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Scripts -->
  @routes
  @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
  @inertiaHead
</head>
<body class="app">
{{--  @extends('layouts.control')--}}
<div class="st-app">
  @section('header')
    <div class="st-app__header">
      <div class="st-app__header-toolbar">
        <div class="st-app__header-phone">
          8-961-502-50-40
        </div>
        <a href="{{ route('index') }} " class="st-app__header-logo">
          <img src="{{ Vite::asset('resources/images/logo.svg') }}"/>
        </a>
        <a href="{{ route('get_cart') }} " class="st-app__header-cart">
          <img src="{{ Vite::asset('resources/images/cart.svg') }}"/>
        </a>
      </div>

    </div>
    @section('content')
      <div class="st-app__body">
        @inertia
      </div>
      @section('footer')
        <div class="st-app__footer">

        </div>
</div>
</body>
</html>
