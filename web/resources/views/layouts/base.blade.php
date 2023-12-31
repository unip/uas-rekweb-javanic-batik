<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ? "$title - Javanic Batik" : 'Javanic Batik' }}</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="/css/app.css">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=kumar-one:400|nunito-sans:300,300i,900" rel="stylesheet" />

  @yield('css')
</head>
<body class="font-['Nunito Sans'] bg-[var(--bg-base)]">
  @yield('child')

  @yield('js')
</body>
</html>
