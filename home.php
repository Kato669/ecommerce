<style>
  .icon{
    background: deepskyblue;
    padding: 5px;
    border: 1px solid white;
    cursor: pointer;
    font-size: 16px;
    text-align: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    position: fixed;
    display: none;
    opacity: 0;
    bottom: 15px;
    right: 15px;
    transition: all 4s;
    animation: bounce 2s ease-in-out infinite;
}
.icon.active{
  display: block;
  opacity: 1;
}
@keyframes bounce {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.2);
      /* bottom: 20px; */
    }
    100% {
      transform: scale(1);
    }
  }
  
</style>
<script src="https://kit.fontawesome.com/78e0d6a352.js" crossorigin="anonymous"></script>
<section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <!-- <ol class="carousel-indicators">
              <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#slider-carousel" data-slide-to="1"></li>
              <li data-target="#slider-carousel" data-slide-to="2"></li>
            </ol> -->
            
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-6">
                  <h1>ICT specialists</h1>
                  <p>Printing, photocopying, shirt branding, web development and hosting, poster designing, graphic designing, computer training, printer repair, software installation and others </p>
                 
                </div>
                <div class="col-sm-6">
                  <img src="images/home/computer.avif" class="girl img-responsive" alt="" />
                  <!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->
                </div>
              </div>
              <div class="item">
                <div class="col-sm-6">
                  <h1>Maama KK porridge</h1>
                  <p>Best porridge made locally using millet, maize flour, meat, sun flower, sugar and rich in vitamin, protain and calcium and siutable for all people regardless of the age.  </p>
                 
                </div>
                <div class="col-sm-6">
                  <img src="images/home/porridge.webp" class="girl img-responsive" alt="" />
                  <!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->
                </div>
              </div>
              
              <div class="item">
                <div class="col-sm-6">
                  <h1>St Leos primary school</h1>
                  <h2>Arua city, Uganda</h2>
                  <p>We have exprienced teachers and qualified staff to enable your child excel in academics. Equipped library and big space all aimed at creating a conducive environment for smooth learning. </p>
                 
                </div>
                <div class="col-sm-6">
                  <img src="images/home/student.jpg" class="girl img-responsive" alt="" />
                  <!-- <img src="images/home/pricing.png" class="pricing" alt="" /> -->
                </div>
              </div>
              
            </div>
            
            <!-- <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a> -->
          </div>
          
        </div>
      </div>
    </div>
  </section><!--/slider-->

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
            <?php include 'sidebar.php'; ?>
        </div>
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center" style="color: deepskyblue;">Features Items</h2>

            <?php

            $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
            WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 ";
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
           
            foreach ($cur as $result) { 

              ?>
               <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                      <h2 style="color: deepskyblue;">UgShs <?php  echo $result->PRODISPRICE; ?></h2>
                      <p><?php  echo    $result->PRODESC; ?></p>
                      <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2 style="color: deepskyblue;">UgShs <?php  echo $result->PRODISPRICE; ?></h2>
                        <p><?php  echo    $result->PRODESC; ?></p>
                       <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                      </div>
                    </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li>
                              <?php     
                            if (isset($_SESSION['CUSID'])){  

                              echo ' <a href="'.web_root. 'customer/controller.php?action=addwish&proid='.$result->PROID.'" title="Add to wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';

                             }else{
                               echo   '<a href="#" title="Add to wishlist" class="proid"  data-target="#smyModal" data-toggle="modal" data-id="'.  $result->PROID.'"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';
                            }  
                            ?>

                    </li> 
                  </ul>
                </div>
              </div>
            </div>
          </form>
       <?php  } ?>
            
          </div><!--features_items--> 
          
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center" style="color: deepskyblue;">recommended items</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active"> 
                         <?php 
                    $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                    WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 limit 3 ";
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();
                   
                    foreach ($cur as $result) { 
                  ?>
                      <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                          <h2 style="color: deepskyblue;">UgShs <?php  echo $result->PRODISPRICE; ?></h2>
                          <p><?php  echo    $result->PRODESC; ?></p>
                           <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </form>
                  <?php } ?>
                </div>
                <div class="item">  
                  <?php 
                    $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                    WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 limit 3,6";
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();
                   
                    foreach ($cur as $result) { 
                  ?>
                      <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                          <h2 style="color: deepskyblue;">UgShs <?php  echo $result->PRODISPRICE; ?></h2>
                          <p><?php  echo    $result->PRODESC; ?></p>
                           <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </form>
                  <?php } ?>
                </div>
              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left" style="color: deepskyblue;"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right" style="color: deepskyblue;"></i>
                </a>      
            </div>
          </div><!--/recommended_items-->
          
        </div>
      </div>
    </div>
    
    <i class="fa-solid fa-arrow-up icon acive"></i>
    
  </section>
  <script>
    let icon = document.querySelector('.icon')
    window.onscroll = ()=>{
      if(window.scrollY >= 100){
         icon.classList.add('active')
      }else{
         icon.classList.remove('active')
      }
      
    }
    icon.addEventListener('click',()=>{
      window.scrollTo({top:0, behavior:'smooth'})
    })
  </script>