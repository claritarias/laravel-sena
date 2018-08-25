<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{config('app.name', 'Evaluación de Instructores')}}</title>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <main>
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
  </main>
</body>
</html>
