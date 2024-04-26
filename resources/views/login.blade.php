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
  <h2>Login form</h2>
@if (@Session::has('error'))

<div>
    {{Session::get('error')}}
</div>
    
    
@endif
  <form action="{{ route('login.post') }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-black" onclick="redirectTosignup()">Signup</button>
  </form>
</div>

<script>
  function redirectTosignup() {
    window.location.href = '/';
  }
</script>

</body>
</html>
