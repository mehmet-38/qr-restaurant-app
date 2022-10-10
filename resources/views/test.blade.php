<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light">
    <div class="container">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('test') }}" class="nav-link"> Ana Sayfa</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('test') }}" class="nav-link"> Hakkımızda</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('test') }}" class="nav-link"> İletişim</a>
            </li>


        </ul>



    </div>

</nav>
<div class="container">

    <form class="form" method="post" action="{{route('user')}}">
        @csrf
        <input class="form-group" placeholder="name" name="name"/>
        <input class="form-group" placeholder="email" name="email"/>
        <input class="form-group" placeholder="password" name="password"/>
    <button class="btn btn-primary">Add</button>
    </form>
</div>
</body>
</html>
