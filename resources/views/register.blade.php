<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Stacked form</h2>
@if (@Session::has('success'))

<div>
    {{Session::get('success')}}
</div>
    
    
@endif
  <form action="{{route('register.post')}}" method="POST">
    @csrf
  <div class="mb-3 mt-3">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-black" onclick="redirectTologin()">login</button>

  </form>
</div>
<script>
  function redirectTologin() {
    window.location.href = '/login';
  }
</script>

</body>
</html>
