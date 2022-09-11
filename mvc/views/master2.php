<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div id="wrapper">
    <div class="container">
      <div class="row justify-content-around">
        <form id="form_register" action="./Register/proccessRegister" method="POST" class="col-md-6 bg-light p-3 my-3" >
            <h1 class="text-center text-uppercase h3 my-3">register</h1>
            <div class="form-group mb-3">
              <label for="fullname" class="form-label">FullName</label>
              <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Ho va ten" />
              <span class="form-message"></span>
            </div>
            <div class="form-group mb-3">
              <label for="username"  class="form-label">UserName</label>
              <input type="text" name="username" id="username" class="form-control"/>
              <span class="form-message"></span>
            </div>                
            <div class="form-group mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control"/>
              <span class="form-message"></span>
            </div>
            <div class="form-group mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" id="address" class="form-control"/>
              <span class="form-message"></span>
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Gioi tinh</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" >
                <label class="form-check-label">
                Nam
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender">
                <label class="form-check-label" >
                Nu
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender">
                <label class="form-check-label" >
                 Khac
                </label>
              </div>
             
              <span class="form-message"></span>
            </div>
            <div class="form-group mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control"/>
              <span class="form-message"></span>
            </div>
            <div class="form-group mb-3">
              <label for="password_confirmation" class="form-label">Nhập lại password</label>
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"/>
              <span class="form-message"></span>
            </div>

            <div class="d-grid gap-2">
              <input type="submit" value="register" class="btn btn-primary " >
            </div>           
        </form>
      </div>
    </div>
  </div>

  <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"/>
  <script src="./public/js/validator.js"></script>
  <script type="text/javascript">
    // Xu ly from ne
    Validator({
      form: '#form_register',
      formGroupSelector: '.form-group',
      errorSelector: '.form-message',
      rules: [
        Validator.isRequired('#fullname'),
        Validator.isRequired('#email'),
        Validator.isEmail('#email'),
        Validator.isRequired('input[name="gender"]'),
        Validator.isRequired('#password'),
        Validator.minLength('#password', 6),
        Validator.isRequired('#password_confirmation'),
        Validator.isConfirmed('#password_confirmation', function () {
          return document.querySelector('#form_register #password').value;
        }, 'Mật khẩu không chính xác')
      ],
      onSubmit: function (data) {
        //Call API
        console.log(data);
      }
    });
  </script>
 
</body>
</html>