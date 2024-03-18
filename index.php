<?php
//ESTABLISH CONNECTION
require_once "config.php";

session_start();

// Fetch 6 random products
$randomProductsQuery = "SELECT products.*, categories.category_name
                        FROM products
                        JOIN categories ON products.category_id = categories.id
                        ORDER BY RAND()
                        LIMIT 6";
// Execute the query
$randomProductsResult = mysqli_query($conn, $randomProductsQuery);

// Fetch the results
$randomProducts = mysqli_fetch_all($randomProductsResult, MYSQLI_ASSOC);


// Fetch categories from the database
$categoryQuery = "SELECT * FROM categories";
$categoryResult = mysqli_query($conn, $categoryQuery);
$categories = mysqli_fetch_all($categoryResult, MYSQLI_ASSOC);

//QUERY FOR ALL products JOIN categories ON products.category_id = categories.id
$sql = "SELECT products.*, categories.category_name
        FROM products
        JOIN categories ON products.category_id = categories.id
        ORDER BY products.create_at DESC ";

//MAKW QUERRY TO DATABASE & GET ALL RESULT
$result = mysqli_query($conn,$sql);

//FETCHING THE RESULT ROS FROM TABLE
$my_product = mysqli_fetch_all($result, MYSQLI_ASSOC);




// Fetch testimonials from the database
$testimonialQuery = "SELECT * FROM testimonials ORDER BY create_at DESC LIMIT 4";
$testimonialResult = mysqli_query($conn, $testimonialQuery);
$testimonials = mysqli_fetch_all($testimonialResult, MYSQLI_ASSOC);

//QUERY FOR ALL lincoln_shop ON products TABLE TO SELECT product_name, ID & price
$sql_brand = "SELECT * FROM products ORDER BY create_at DESC limit 1";

//MAKW QUERRY TO DATABASE & GET ALL RESULT
$result_brand = mysqli_query($conn,$sql_brand);

//FETCHING THE RESULT ROS FROM TABLE
$my_product_brand = mysqli_fetch_assoc($result_brand);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <?php require_once "navbar.php" ;?>
    <style>
      .badge {
        display: inline-block;
        padding: 0.25em 0.4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0rem;
        -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      }
      .product-img {
        position: relative;
      }

      .product-img .badge {
        position: absolute;
        left: 0;
        top: 0px;
        padding: 7px;
        z-index: 2;
        background-color:#fff;
        color:#252c32;
        text-decoration:none;
      }
      .small-container {
       margin-left:20%;
      }
      .links{
        width: 20%;
        position: fixed;
        top: 8;
        left:0;
        height: 100vh;
      }
      .aside{
        margin-left: 20%;
      }
      .hero{
        margin-top: 10vh;
      }
      .col-3 {
      flex-basis: 25%;
      min-width: 240px;
      margin-bottom: 30px;
      }
      .tetimonial{
        border:2px solid  #252c32;
      }
      .links{
      flex-basis: 20%;
      background-color: #f8c51b;
      flex: 1;
      position: fixed;
      top: 8;
      left:0;
      height:100vh;
    }
    
    </style>
<div class="hero">
    <div class="links">
          <ul class="ul-pd">
              <?php foreach ($categories as $category) : ?>
                  <li><a href="categories.php?category_name=<?php echo $category['category_name']; ?>">
                        <?php echo htmlspecialchars($category['category_name']); ?></a></li>
              <?php endforeach; ?>
          </ul>
    </div>  
      <div class="aside">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="src/img/sports-shoe-illustration-men-fashion-generated-by-ai_188544-19541 (1).jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="src/img/istockphoto-1457433817-612x612.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="src/img/441c8d143220911.Y3JvcCwxMTMzLDg4NiwwLDA.png" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <div class="button">
              <h4>2024</h4>
              <h1>-30% Discount</h1>
              <p>we know how large object will act. <br>but things on a small scale</p>
            </div>
      </div>
      <div class="end">
        
      </div> 
  </div>


  <!-- Featured products -->
  <div  id="product" class="small-container">
    <h2 class="title"style="margin-top:40px;">Featured Products</h2>
    <div class="row">
      <?php foreach ($randomProducts as $randomProduct) : ?>
      <div class="col-2">
        <a href="details.php?&id=<?php echo htmlspecialchars($randomProduct['id']); ?>">
          <img src="admin/uploads/<?php echo htmlspecialchars($randomProduct['image']); ?>" alt="" height="160" />
        </a> 
      </div>
      <?php endforeach; ?>
    </div>


<!-- ------Latest Products------- -->

  <h2 id="title" class="title">Latest Products</h2>
  <div class="row ">
    <?php 
      foreach($my_product as $product) : 
        $categories = $product['category_id'];
        $cat_sql = "SELECT * FROM `categories` WHERE `id`= '$categories'";
        $cat_query = mysqli_query($conn, $cat_sql);
        $result_cat = mysqli_fetch_assoc($cat_query);
    ?>
      
      <div class="col-2">
        <a href="details.php?&id=<?php echo htmlspecialchars($product['id']); ?>" style="text-decoration:none;  color: #333;" >
        <div class="product-img">
          <img src="admin/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="" width="200" height="160" />
          <a href="#" class="badge badge-primary">#<?php echo htmlspecialchars($result_cat['category_name']); ?></a>        
        </div>  
          <h5><?php echo htmlspecialchars($product['product_name']); ?></h5>
          <div class="rating" style="color: #f8c51b">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <p>$<?php echo htmlspecialchars($product['price']); ?></p>
        </a>
      </div>
    <?php endforeach ?>
  </div>


</div>

 <!-- offer -->
 <?php 
    $categories_brand = $my_product_brand['category_id'];
    $cat_sql_brand = "SELECT * FROM `categories` WHERE `id`= '$categories_brand'";
    $cat_query_brand = mysqli_query($conn, $cat_sql_brand);
    $result_cat_brand = mysqli_fetch_assoc($cat_query_brand);
  ?>
  <div class="offer">
   <div class="small-container">
      <div class="row" style="display: flex; justify-content: center; align-items: center;">
        <div class="col-4">
          <img src="admin/uploads/<?php echo htmlspecialchars($my_product_brand['image']); ?>" />
        </div>
        <div class="col-4">
          <p>Exclusively Available on RedStore</p>
          <h1><?php echo htmlspecialchars($my_product_brand['product_name']); ?></h1>
          <small><?php echo htmlspecialchars($result_cat_brand['category_name']); ?></small>
          <br />
          <a href="details.php?&id=<?php echo htmlspecialchars($my_product_brand["id"]);  ?>" class="btn">Buy Now &#8594;</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Testimonial -->
  <div class="testimonial">
    <div class="small-container">
        <div class="row">
          <?php foreach ($testimonials as $testimonial) : ?>
              <div class="col-3">
                <i class="fas fa-quote-left"></i>
                <p><?php echo htmlspecialchars($testimonial['message']); ?></p>
                <div class="rating">
                    <?php for ($i = 0; $i < $testimonial['rating']; $i++) : ?>
                      <i class="fas fa-star"></i>
                    <?php endfor; ?>
                    <?php for ($i = $testimonial['rating']; $i < 5; $i++) : ?>
                      <i class="far fa-star"></i>
                    <?php endfor; ?>
                </div>
                <h3><?php echo htmlspecialchars($testimonial['name']); ?></h3>
                <p><?php echo htmlspecialchars($testimonial['email']); ?></p>
              </div>
          <?php endforeach; ?>
        </div>
        <a href="testimonials.php" class="btn tetimonial">Add Review &#8594;</a>
    </div>
    

  <!-- brands -->

  <div class="brands">
    <div class="small-container">
    <div class="row" style="display: flex; justify-content: center;">
      <div class="col-5">
        <img src="https://i.ibb.co/Gfwzz1S/logo-godrej.png" alt="" />
      </div>

      <div class="col-5">
        <img src="https://i.ibb.co/vjrRZFM/logo-oppo.png" alt="" />
      </div>

      <div class="col-5">
        <img src="https://i.ibb.co/3zs234S/logo-coca-cola.png" alt="" />
      </div>

      <div class="col-5">
        <img src="https://i.ibb.co/7Wt343W/logo-paypal.png" alt="" />
      </div>

      <div class="col-5">
        <img src="https://i.ibb.co/GVSNwJD/logo-philips.png" alt="" />
      </div>
    </div>
    </div>
  </div>
<?php require_once "footer.php" ;?>




