<?php

include 'config/Bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- start nav  -->
    <?php require_once 'assets/navbar.php'; ?>
    <!-- end nav -->
    <!-- main section start -->

    <div class="main_section">
        <div class="row">
          <div class="col-3">
             <?php require_once "assets/menus.php" ?>
          </div>
          <div class="col-8" id="main_menu">
          <!-- this menu body -->
          <div id="product" class="bg-secondary-subtle m-2 p-3">
            <!-- table  -->
            <!-- calendar --> 
           <div>
             </div>
             <!-- calendar -->
             <input id="inp_date" required name="date" class="text text-primary p-1" type="date">
             <table class="table">
               <thead id="getPoduct">
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Title</th>
                   
                   </th>
                   <th>

                     <select class="form-select" name="category" id="">
                       <option selected>category</option>
                       <option value="1">Electronika</option>
                       <option value="2">kiyim</option>
                      </select>
                    </th>
                  </th>
                  <th scope="col"><select class="form-select" name="sklad" id="">
                      <option selected>sklad</option>
                      <option value="1">Stimul</option>
                      <option value="2">kiyim</option>
                    </select></th>
                  <th scope="col">amount</th>
                  <th scope="col">price</th>
                </tr>
              </thead>
              <tbody id="prod_cont">

            
                <!-- paste -->
              </tbody>
            </table>
            <!-- table  -->
            </div>  
           <!-- this menu body -->  <!-- this menu body -->
         </div>
        
    <!-- main section end  -->  
    
    <script src="js/app.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>