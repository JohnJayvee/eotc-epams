<!DOCTYPE html>
<html lang="en" style="overflow-y: hidden">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  @include('web._components.metas')

  @include('web._components.styles')

  @stack('page-styles')

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body style="bg-indigo-100">
  @yield('content')

  @include('web._components.scripts')
  @stack('page-scripts')
</body>

</html>
