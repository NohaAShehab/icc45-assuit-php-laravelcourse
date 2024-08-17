<!-- <?php
      var_dump($name);
?> -->

{{-- $name --}}

{{-- $users --}}

{{-- @dump($users) --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My home page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
        
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarNav" aria-controls="navbarNav" 
    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">ITI Project </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('users.home')}}">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
  
      </ul>
    </div>
  </div>
</nav>

<!-- <?php  echo "Hiiiiiiiiiiiiiiiiiiiiii"; ?> -->
        <h1 style="color: rebeccapurple; text-align: center;"> Home Page</h1>
        <div class='container'>
            <table class='table'>
                <tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>  Image</th>
                <td> Show </td>
        </tr>  

              @foreach($users as $user)
                <tr> 
                        <td>{{$user['id']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['image']}}</td>
                        <!-- <td><a href="/home/users/{{$user['id']}}" class='btn btn-info'> Show </a> </td> -->
                        <td><a href="{{route('users.show', $user['id'])}}" class='btn btn-info'> Show </a> </td>

                </tr>

              @endforeach
                    
                {{--  
                        @for($i=0; $i<5; $i++)
                                @if($i===3)
                                <li style='color:red'>{{$i}}</li>
                                @else
                                <li >{{$i}}</li>
                                @endif
                        @endfor

              --}}
              
        </table>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
