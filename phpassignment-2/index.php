<?php
  include 'functions.php';
  $obj = new CallApi();
  $arr_size = $obj->arrLength();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Services</li>
      </ol>
    </nav>
    <div class="container">
    
      <?php
        for ($i = 0;$i < $arr_size;$i++) {
            if ($obj->checkNull($i)) {
                continue;
            }
            $title = $obj->title($i);
            $img = $obj->image($i);
            $list = $obj->list($i);
            if ($i % 2 == 0) {
            ?>
        <!-- Shows the image on left side and the data on right side-->
        <div class="box">
            <div class="left">
                <img src="<?php echo "https://ir-dev-d9.innoraft-sites.com".$img ?>" alt="">
            </div>
            <div class="right">
                <div class="title">
                    <?php echo $title; ?>
                </div>
                <div class="list">
                    <?php echo $list; ?>
                </div>
                <button class="button" onclick="myFunction(<?php echo $i ?>)"> Explore Now </button>
            </div>
        </div>
        <div class="popup" id=<?php echo "popup".$i ?>>
            <div class="inner-popup">
                <div class="close" onclick="closeFunction(<?php echo $i ?>)">&times;</div>
                <div class="body">
                    <?php
                        echo $list;
                    ?>
                </div>
                <button class="button" onclick="closeFunction(<?php echo $i ?>)">Close</button>
            </div>
        </div>
        <?php
            } else {
            ?>
        <!-- Shows the data on left side and image on right side-->    
        <div class="box">
            <div class="left">
                <div class="title">
                    <?php echo $title; ?>
                </div>
                <div class="list">
                    <?php echo $list; ?>
                </div>
                <button class="button" onclick="myFunction(<?php echo $i ?>)"> Explore Now </button>
            </div>
            <div class="right">
                <img src="<?php echo "https://ir-dev-d9.innoraft-sites.com".$img ?>" alt="">
            </div>
        </div>
        <div class="popup" id=<?php echo "popup".$i ?>>
            <div class="inner-popup">
               <div class="close" onclick="closeFunction(<?php echo $i ?>)">&times;</div>
               <div class="body">
                    <?php
                        echo $list;
                    ?>
                </div>
                <button class="button" onclick="closeFunction(<?php echo $i ?>)">Close</button>
            </div>
        </div>
            
            <?php
            }
        }
    ?>
    </div>
    <script src="script.js"></script>           
</body>
</html>