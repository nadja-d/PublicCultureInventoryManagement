<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="https://media2.giphy.com/media/hvY3bABRuv3uliYCRI/giphy.gif" type="image/gif" sizes="12x14">
  <title>PC Admin</title>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet'
    href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

  <div class="screen-1">
    <svg class="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
      width="300" height="300" viewBox="0 0 640 480" xml:space="preserve">
      <defs>
        <clipPath id="circle-clip">
          <circle cx="0" cy="0" r="40"></circle>
        </clipPath>
      </defs>

      <g transform="matrix(3.31 0 0 3.31 320.4 240.4)">
        <image
          xlink:href="data:image/png;base64,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"
          x="-40" y="-40" width="80" height="80" clip-path="url(#circle-clip)"></image>
      </g>
    </svg>

    <form action="{{ route('login') }}" method="post">
      @csrf
      <div class="email">
        <label for="email">Username</label>
        <div class="sec-2">
          <ion-icon name="person-outline"></ion-icon>
          <input type="text" name="username" placeholder="" />
        </div>
      </div>
      <br>
      <div class="password">
        <label for="password">Password</label>
        <div class="sec-2">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input class="text" type="password" name="password" placeholder="" />
        </div>
      </div>
      <br>
      <button class="login">Login</button>
    </form>

    <img class="background-image"
      src="https://images.tokopedia.net/img/cache/850/BgtCLw/2023/12/18/15bbb293-9d1c-451d-a0d0-64b0d9e7dd96.jpg?ect=4g"
      alt="Background Image">

</body>

</html>