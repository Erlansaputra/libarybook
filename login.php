<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>LOGIN</title>
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col xs-12">
        <form class="form-container">
          <h4 style="text-align:center">Halaman Login</h4>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="email" class="form-control-sm" id="exampleInputEmail1" placeholder="Enter username" />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control-sm" id="exampleInputPassword1" placeholder="Password" />
          </div>
          <!-- <div class="form-group form-check">
              <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck1"
              />
              <label class="form-check-label" for="exampleCheck1"
                >Check me out</label
              >
            </div> -->
          <button type="submit" class="btn btn-success btn-block btn-sm">
            Login
          </button>
          <small class="form-text">
            Jika belum punya akun silahkan registrasi dahulu
          </small>
          <button type="button" class="btn btn-success btn-block btn-sm">
            Register
          </button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>