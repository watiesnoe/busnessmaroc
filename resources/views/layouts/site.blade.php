<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/imgs/template/favicon.svg') }}">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
    <title>Jobbox - Job Portal HTML Template </title>
  </head>
  <body>
    @include('layouts.partials.dashheader')

   <main class="main">
       @yield('content')

    </main>
    <footer class="footer mt-50">
     @include('layouts.partials.dashfooter')
    </footer>
   @include('layouts.partials.dashjavascript')
  </body>
</html>
