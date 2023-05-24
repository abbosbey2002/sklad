<?php

include 'config/Bootstrap.php';

$cat_obj=new Category();

$category=$cat_obj->getAll('category');


?>



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

                     <select class="form-select" name="category" id="category">
                       <option value="all">All</option>
                       <?php foreach ($category as $value): ?>
                        <option value=<?= $value->title ?> > <?= $value->title ?></option>
                        <?php endforeach; ?>
                      </select>
                    </th>
                  </th>
                  <th scope="col"> Sklad</th>
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
    
    <script src="./js/app.js"></script>

<?php 

    include "./assets/footer.php"; 