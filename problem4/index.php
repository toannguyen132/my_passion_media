<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Product</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <h1>Add Product</h1>
        <form action="" id="import_form" class="needs-validation" novalidate>
          <div class="form-group">
            <select name="type" id="" class="form-control validation" required>
              <option value="">Type</option>
              <option value="Fiddle">Fiddle</option>
              <option value="Dish">Dish</option>
              <option value="Spoon">Spoon</option>
            </select>
            <div class="invalid-feedback">
              Type must be chosen
            </div>
          </div>
          <div class="form-group validation">
            <label for="">Weight (kg)</label>
            <input type="number" name="weight" class="form-control">
            <div class="invalid-feedback">
              Weight must be larger than 0
            </div>
          </div>
          <div class="form-group validation">
            <label for="">Width (cm)</label>
            <input type="number" name="width" class="form-control">
            <div class="invalid-feedback">
              Width must be larger than 0
            </div>
          </div>
          <div class="form-group validation">
            <label for="">Height (cm)</label>
            <input type="number" name="height" class="form-control">
            <div class="invalid-feedback">
              Height must be larger than 0
            </div>
          </div>
          <div class="form-group validation">
            <label for="">Depth (cm)</label>
            <input type="number" name="depth" class="form-control">
            <div class="invalid-feedback">
              Depth must be larger than 0
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">
              Add
            </button>
          </div>
        </form>

        <ul id="added_product" class="list-group">
        </ul>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>