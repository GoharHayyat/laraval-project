<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
</head>
<body>
  @livewire('mynavbar')
<div class="container mt-3">
  <h2>Login form</h2>
@if (@Session::has('error'))

<div>
    {{Session::get('error')}}
</div>
    
    
@endif
  @livewire('loginform')
</div>

{{-- <script>
  function redirectTosignup() {
    window.location.href = '/';
  }
</script> --}}

</body>
</html>
