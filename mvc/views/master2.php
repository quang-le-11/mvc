<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"/>
  <title>Document</title>
</head>
<body>
  <div id="wrapper">
    <div class="container">
      <div class="row justify-content-around">
        <form action="./Register/proccessRegister" method="POST" class="col-md-6 bg-light p-3 my-3" >
            <h1 class="text-center text-uppercase h3 my-3">register</h1>
            <div class="form-group mb-3">
              <label for="fullname" class="form-label">FullName</label>
              <input type="text" name="fullname" id="fullname" class="form-control"/>
            </div>
            <div class="form-group mb-3">
              <label for="username"  class="form-label">UserName</label>
              <input type="text" name="username" id="username" class="form-control"/>
            </div>      
            <div class="form-group mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control"/>
            </div>
            <div class="form-group mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control"/>
            </div>
            <div class="form-group mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" id="address" class="form-control"/>
            </div>

            <div class="d-grid gap-2">
              <input type="submit" value="register" class="btn btn-primary " >
            </div>           
        </form>
      </div>
    </div>
  </div>
</body>
</html>