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
    <div class="container theme-showcase">
        @include('includes.messages')
        @yield('content')
    </div>
    @include('includes.footer')
  </main>
</body>
</html>
