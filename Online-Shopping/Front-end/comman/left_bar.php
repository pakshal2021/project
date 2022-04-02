<div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
              <div class="panel panel-default">
                
              </div>
               <?php   
               $categoryData = array();            
                        $qry = $conn->query("SELECT * FROM category");
                        while ($row = mysqli_fetch_assoc($qry))
                        {
                          $categoryData[] = $row;
                        }

                        /*echo '<pre>';
                        print_r($categoryData);
                        echo '</pre>';*/

                    ?>
              <div class="panel panel-default">
                <?php foreach ($categoryData as $_category):?>
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $_category['category']?>">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        <?php echo $_category['category']?>
                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $_category['category']?>" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                         <?php 
                          $subCategoryData = array();  
                          $categoryId = $_category['category_id'];  

                                  $qry = $conn->query("SELECT * FROM sub_category where category_id = {$categoryId}");
                                  while ($row = mysqli_fetch_assoc($qry))
                                  {
                                    $subCategoryData[] = $row;
                                  }                              

                              ?>
                              <?php foreach ($subCategoryData as $_subCategory): $subCatId = $_subCategory['sub_category_id']?>
                            <li><a href="../php-files/product_list.php?subcat_id=<?php echo $subCatId?>"><?php echo $_subCategory['sub_category']?></a></li>
                        <?php endforeach;?>
                      </ul>
                    </div>
                  </div>
                <?php endforeach;?>
              </div>
              <!-- 
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      Womens
                    </a>
                  </h4>
                </div>
                <div id="womens" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                      <li><a href="#">Fendi</a></li>
                      <li><a href="#">Guess</a></li>
                      <li><a href="#">Valentino</a></li>
                    </ul>
                  </div>
                </div>
              </div> -->
              
            </div><!--/category-products-->
          
           
            
            
            <div class="shipping text-center"><!--shipping-->
              <img src="../assets/images/home/shipping.jpg" alt="" />
            </div><!--/shipping-->
          
          </div>