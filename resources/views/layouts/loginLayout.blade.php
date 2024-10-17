<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Barangay Information System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
  </head>
  <style>
    header {
        background: #1E65A8;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 60px;
        position: fixed;
        z-index: 1;
    }

    footer {
        background: #1E65A8;
        padding: 20px;
        text-align: center;
        width: 100%;
        color: #fff;
    }

    .headCon {
      display: flex;
      flex-direction: row;
      width: 100%;
    }

    .logo {
      width: 50%;
      color: #fff;
      font-size: 25px;
      padding-left: 20px;
      display: flex;
      align-items: center
    }

    .navBar {
      width: 50%;
      display: flex;
      flex-direction: row;
      justify-content: flex-end;
      gap: 20px;
      
    }

    .btnNav {
      width: 120px;
      border: none;
      background: transparent;
      color: #fff;
      transition: 0.5s;
      height: 60px;
    }

    .btnNav:hover{
      background: #2A7FFE;
    }
  </style>
  <body>
    <header>
      <div class="headCon">
        <div class="logo">Barangay Ward II</div>

        <div class="navBar">
            <button class="btnNav">About</button>
            <button class="btnNav">Services</button>
            @if(Request::is('register')) 
                <a href="{{Route('login')}}"><button class="btnNav">Login</button></a>
            @elseif(Request::is('login'))
                <a href="{{Route('register')}}"><button class="btnNav">Register</button></a>
            @endif
        </div>
      </div>
    </header>
   @yield('content')
   <footer>Copyright Barangay Ward 2 Information System 2024</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

