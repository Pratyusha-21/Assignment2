
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Send Mail</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <form action="send.php" enctype="multipart/form-data" class="container mt-5" method="post"> 
       <h1>Send Mail</h1>
       <div class="form-group my-5">
          <label for="usr"> Email:</label>
          <input type="mail" class="form-control"  id="usr" name="email">
        </div>
        <div class="form-group">
          <button class="btn btn-outline-success" type="submit" name="send">Send</button>
        </div>
    </form>
  </body>
</html>