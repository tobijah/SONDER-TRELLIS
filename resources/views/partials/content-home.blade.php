<div class='hero-background'>
  <div id='gallery-scroll-start' class='background-overlay'>
    <style>
      <?php $bgImage = get_field('background_image');
      if( !empty($bgImage) ) {
        ?>
        .wrapper .hero-background .background-overlay,
        footer .wrapper-footer .footer-background {
          background-image: url(<?php echo esc_url($bgImage['url']); ?>);
        }
        <?php
      }
      ?>
    </style>
  </div>
  <div id='hero' class='hero'>
    <div class='scroll-container'>
      <div class='hero-text'>
        <h3 class='hero-title'>Sonder Coffee & Tea</h3>
        <h1 class='h1-hero'><?php the_field('greeting')?></h1>
        <p class='p-hero'><?php the_field('season')?></p>
        <a href='https://menu.sondercoffee.co' class='btn' id='btn-hero'>menu lookbook</a>
      </div>
      <div class="scroll-content">
        <ul class='scroll-section'>
          <?php if(have_rows('drinks')):
            foreach(get_field('drinks') as $drink){
              $name = $drink['drink_title'];
              $drinkImage = $drink['drink_image']['sizes']['large'];
              echo "<li class='image-scroll-el'>";
                echo "<article class='card'>";
                  echo "<img id='card-image' src='$drinkImage'>";
                  echo "<div class='title-content'>$name</div>";
                echo "</article>";
              echo "</li>";
            }
            ?>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class='mobile-container'>
  <div class='mobile-gallery'>
    <div id='m-left-column' class='mobile-gallery-column' >
      <div class='mobile-content'>
        <div class='sonder-text'>
          <h2>Sonder (n):</h2>
          <h3>The realization that each random passerby has a life just as vivid
          and complex as your own</h3>
        </div>
      </div>
      <?php if(have_rows('mobile_left_column')){
        foreach(get_field('mobile_left_column') as $mobileLeft){
          if ($mTextArea = $mobileLeft['mobile_gallery_text']) {
            echo "<div class='mobile-content'>
            <div class='sonder-text'>
            <h3>$mTextArea</h3></div>
            </div>";
          } elseif ($mobileProd = $mobileLeft['product']) {
            if ($description = $mobileLeft['mobile_product_description']);
            if ($ingredients = $mobileLeft['mobile_product_ingredients']);
            $prod = wc_get_product($mobileProd->ID);
            $imageUrl = wp_get_attachment_url( get_post_thumbnail_id($mobileProd->ID));
            $productPrice = wc_get_product($mobileProd->ID)->get_price();
            echo "
            <div id='m-prod' class='mobile-image-container l-m-product' onclick=''>
            <img data-src='$imageUrl'>
            <div id='iconAdd'>
              <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' viewBox='0 0 500 500'><title>ionicons-v5-a</title><line x1='256' y1='112' x2='256' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='400' y1='256' x2='112' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
            </div>
              <div class='infowrap'>
                <div class='content'>
                  <h3 class='title'>$mobileProd->post_title</h3>
                  <p class='description'>$description</p>
                  <p class='ingredients'>$ingredients</p>
                  <p class='price'>$$productPrice</p>
                </div>
                <a class='btn' id='btn' href='/cart/?add-to-cart=$mobileProd->ID'>Add to cart</a>
              </div>
            </div>";
          }
          elseif ($mGalleryImage = $mobileLeft['mobile_gallery_image']['sizes']['large']) {
            echo "<div class='mobile-image-container'>
            <img data-src='$mGalleryImage'>
            </div>";
          }
        }
      } else {
        echo "
        <div class='mobile-image-container'>
        <img data-src='/content/uploads/2022/03/image2.jpg'>
        </div>
        <div class='mobile-content'>
        <div class='sonder-text'>
          <h3>Our coffees are sourced from importers who have direct relationships with producers </h3>
        </div>
        </div>
        <div id='m-prod' class='mobile-image-container l-m-product' onclick=''>
        <img data-src='/content/uploads/2022/03/rmonte-1-635x635.jpg'>
        <div id='iconAdd'>
          <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' viewBox='0 0 500 500'><title>ionicons-v5-a</title><line x1='256' y1='112' x2='256' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='400' y1='256' x2='112' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
        </div>
        <div class='infowrap'>
        <div class='content'><h2>Coffee</h2></div>
        </div>
        </div>
        <div class='mobile-image-container'>
        <img data-src='/content/uploads/2022/03/cimage2.jpg'>
        </div>";
      }
      ?>
    </div>
    <div id='m-right-column' class='mobile-gallery-column'>
    <?php if(have_rows('mobile_right_column')){
        foreach(get_field('mobile_right_column') as $mobileRight){
          if ($mTextArea = $mobileRight['mobile_gallery_text']) {
            echo "<div class='mobile-content'>
            <div class='sonder-text'>
            <h3>$mTextArea</h3></div>
            </div>";
          } elseif ($mobileProd = $mobileRight['product']) {
            if ($description = $mobileRight['mobile_product_description']);
            if ($ingredients = $mobileRight['mobile_product_ingredients']);
            $prod = wc_get_product($mobileProd->ID);
            $imageUrl = wp_get_attachment_url( get_post_thumbnail_id($mobileProd->ID));
            $productPrice = wc_get_product($mobileProd->ID)->get_price();
            echo "
            <div id='m-prod' class='mobile-image-container r-m-product' onclick=''>
            <img data-src='$imageUrl'>
            <div id='iconAdd'>
              <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' viewBox='0 0 500 500'><title>ionicons-v5-a</title><line x1='256' y1='112' x2='256' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='400' y1='256' x2='112' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
            </div>
              <div class='infowrap'>
                <div class='content'>
                  <h3 class='title'>$mobileProd->post_title</h3>
                  <p class='description'>$description</p>
                  <p class='ingredients'>$ingredients</p>
                  <p class='price'>$$productPrice</p>
                </div>
                <a class='btn' id='btn' href='/cart/?add-to-cart=$mobileProd->ID'>Add to cart</a>
              </div>
            </div>";
          }
          elseif ($mGalleryImage = $mobileRight['mobile_gallery_image']['sizes']['large']) {
            echo "<div class='mobile-image-container'>
            <img data-src='$mGalleryImage'>
            </div>";
          }
        }
      } else {
        echo "
        <div class='mobile-image-container'>
        <img data-src='/content/uploads/2022/03/rimage1.jpg'>
        </div>
        <div id='m-prod' class='mobile-image-container r-m-product' onclick=''>
          <img data-src='/content/uploads/2022/03/cIMG_20220127_104200-635x635.jpg'>
          <div id='iconAdd'>
            <svg xmlns='http://www.w3.org/2000/svg' width='20px' height='20px' viewBox='0 0 500 500'><title>ionicons-v5-a</title><line x1='256' y1='112' x2='256' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='400' y1='256' x2='112' y2='256' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
          </div>
          <div class='infowrap'>
            <div class='content'>
              <div class='title'>Coffee</div>
            </div>
            <a class='btn' id='btn' href='#'>Add to cart</a>
          </div>
        </div>
        <div class='mobile-image-container'>
          <img data-src='/content/uploads/2022/03/rimage2.jpg'>
        </div>
        <div class='mobile-content'>
          <div class='sonder-text'>
            <h3>Sometimes we visit with producers at origin</h3>
          </div>
        </div>
        <div class='mobile-image-container'>
          <img data-src='/content/uploads/2022/03/3.jpg'>
        </div>";
      }?>
    </div>
  </div>
</div>
<div class='mobile-info-section'>
  <div class='header-text'>
    <h2>Come say hi</h2>
    <p>visit our two locations</p>
  </div>
  <div class='mobile-location-container'>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/8.jpg'>
    </div>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/IMG_3497.jpg'>
    </div>
  </div>
  <div class='mobile-locations'>
    <div class='location-text'>
      <h5>Flagship Location</h5>
      <h2>Iliff Coffeeshop</h2>
      <p>9731 E Iliff Ave Denver, CO 80231</p>
      <div class='time'>
        <svg id='icon' data-name="Icons – 24px / Time" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 47.519 47.519">
          <path id="Icon" class="cls-1" d="M21.76,43.519a21.76,21.76,0,1,1,21.76-21.76A21.784,21.784,0,0,1,21.76,43.519Zm0-39.892A18.143,18.143,0,0,0,8.93,34.589,18.143,18.143,0,0,0,34.589,8.93,18.019,18.019,0,0,0,21.76,3.627ZM32.131,25.894H19.149V8.26h3.627V22.267h9.355v3.627Z" transform="translate(2 2)"/>
        </svg>
        <p>Open Daily 7-5pm Dine-in + Takeout</p>
      </div>
    </div>
  </div>
  <div class='mobile-location-container'>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/10.15.21.12.jpg'>
    </div>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/5.jpg'>
    </div>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/1.jpg'>
    </div>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/13.jpg'>
    </div>
  </div>
  <div class='mobile-locations'>
    <div class='location-text'>
      <h5>Food Hall Location</h5>
      <h2>Junction Coffeeshop</h2>
      <p>2000 S Colorado Blvd Building IV Denver, CO 80222</p>
      <div class='time'>
        <svg id='icon' data-name="Icons – 24px / Time" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 47.519 47.519">
          <path id="Icon" class="cls-1" d="M21.76,43.519a21.76,21.76,0,1,1,21.76-21.76A21.784,21.784,0,0,1,21.76,43.519Zm0-39.892A18.143,18.143,0,0,0,8.93,34.589,18.143,18.143,0,0,0,34.589,8.93,18.019,18.019,0,0,0,21.76,3.627ZM32.131,25.894H19.149V8.26h3.627V22.267h9.355v3.627Z" transform="translate(2 2)"/>
        </svg>
        <p id='time-text'>Weekdays 7-5pm Weekends 8-5pm Dine-in + Takeout</p>
      </div>
    </div>
  </div>
  <div class='mobile-location-container'>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/17.jpg'>
    </div>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/10.jpg'>
    </div>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/9.jpg'>
    </div>
    <div class='image-container'>
      <img data-src='/content/uploads/2022/03/20.jpg'>
    </div>
  </div>
</div>
<div class='container'>
  <div class='location-container'></div>
  <div id='gallery' class='gallery-container'>
    <div id='left-column' class='gallery-column'>
      <?php if(have_rows('left_column')){
        foreach(get_field('left_column') as $left){

          if ($textArea = $left['gallery_text']) {
              echo "<div class='image-container text'>
                <h2>$textArea</h2>
              </div>";
          } elseif ($product = $left['product']) {
            if ($description = $left['product_description']);
            if ($ingredients = $left['product_ingredients']);
            $prod = wc_get_product($product->ID);
            $imageUrl = wp_get_attachment_url( get_post_thumbnail_id($product->ID));
            $productPrice = wc_get_product($product->ID)->get_price();
            $link = $prod->get_permalink();
              echo "<div class='image-container product'>
                <div class='content'>
                  <div id='info-wrapper'>
                    <h3 class='title'>$product->post_title</h3>
                    <p class='description'>$description</p>
                    <p class='ingredients'>$ingredients</p>
                    <p class='price'>$productPrice</p>
                  </div>
                  <a class='btn' id='btn' href='/cart/?add-to-cart=$product->ID'>Add to cart</a>
                </div>
                <img src='$imageUrl'>
              </div>";
          } elseif ($galleryImage = $left['gallery_image']['sizes']['large']) {
              echo "<div class='image-container'>
                <img src='$galleryImage'>
              </div>";
          }
        } 
      } else {
        echo "<div class='image-container'>
          <img src='/content/uploads/2022/03/image1.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/image2.jpg' alt='image2'>
        </div>
        <div class='image-container text'>
          <h2>Our coffees are sourced from importers who have direct relationships with producers</h2>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/image3.jpg' alt='image3'>
        </div>
        <div class='image-container product'>
          <div class='content'>
              <div id='info-wrapper'>
                <h3>Colombia</h3>
                <p>$25</p>
              </div>
              <btn class='btn'id='btn'>Add to cart</btn>
            </div>
          <img src='/content/uploads/2022/03/esmeralda-635x635.jpg' alt='coffee-bag'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/image4.jpg' alt='image4'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/image5.jpg' alt='image5'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/galleryimage2.jpg' alt='image5'>
        </div>";
      }?>
    </div>
    <div id='center-column' class='gallery-column'>
      <div class='image-container sonder-text'>
        <h2>Sonder (n):</h2>
        <h3>The realization that each random passerby has a life just as vivid
        and complex as your own</h3>
      </div>
      <?php if(have_rows('center_column')){
        foreach(get_field('center_column') as $center){

          if ($textArea = $center['gallery_text']) {
              echo "<div class='image-container text'>
                <h2>$textArea</h2>
              </div>";
          } elseif ($product = $center['product']) {
            if ($description = $center['product_description']);
            if ($ingredients = $center['product_ingredients']);
            $prod = wc_get_product($product->ID);
            $imageUrl = wp_get_attachment_url( get_post_thumbnail_id($product->ID));
            $productPrice = wc_get_product($product->ID)->get_price();
              echo "<div class='image-container product'>
                <div class='content'>
                  <div id='info-wrapper'>
                    <h3 class='title'>$product->post_title</h3>
                    <p class='description'>$description</p>
                    <p class='ingredients'>$ingredients</p>
                    <p class='price'>$$productPrice</p>
                  </div>
                  <a class='btn' id='btn' href='/cart/?add-to-cart=$product->ID'>Add to cart</a>
                </div>
                <img src='$imageUrl'>
              </div>";
          } elseif ($galleryImage = $center['gallery_image']['sizes']['large']) {
              echo "<div class='image-container'>
                <img src='$galleryImage'>
              </div>";
          }
        } 
      } else {
        echo "<div class='image-container'>
          <img src='/content/uploads/2022/03/cimage1.jpg' alt='cimage1'>
        </div>
        <div class='image-container product'>
          <div class='content'>
            <div id='info-wrapper'>
              <h3 class='title'>Costa Rica</h3>
              <p class='description'>natural yello mundo novo</p>
              <p class='ingredients'>grapefruit, honey, rose</p>
              <p class='price'>$25</p>
            </div>
            <btn class='btn'id='btn'>Add to cart</btn>
          </div>
          <img src='/content/uploads/2022/03/cIMG_20220127_104200-635x635.jpg' alt='coffee-bag'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/cimage2.jpg' alt='cimage2'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/cimage3.jpg' alt='cimage3'>
        </div>
        <div class='image-container product'>
          <div class='content'>
            <div id='info-wrapper'>
              <h3>El Salvador</h3>
              <p>$30</p>
            </div>
            <btn class='btn'id='btn'>Add to cart</btn>
          </div>
          <img src='/content/uploads/2022/03/coffee-bag.jpg' alt='coffee-bag'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/cimage5.jpg' alt='coffee-bag'>
        </div>";
      }?>
    </div>
    <div id='right-column' class='gallery-column'>
      <?php if(have_rows('column_right')){
        foreach(get_field('column_right') as $right){

          if ($textArea = $right['gallery_text']) {
              echo "<div class='image-container text'>
                <h2>$textArea</h2>
              </div>";
          } elseif ($product = $right['product']) {
            if ($description = $right['product_description']);
            if ($ingredients = $right['product_ingredients']);
            $prod = wc_get_product($product->ID);
            $imageUrl = wp_get_attachment_url( get_post_thumbnail_id($product->ID));
            $productPrice = wc_get_product($product->ID)->get_price();
            $link = $prod->get_permalink();
              echo "<div class='image-container product'>
                <div class='content'>
                  <div id='info-wrapper'>
                    <h3 class='title'>$product->post_title</h3>
                    <p class='description'>$description</p>
                    <p class='ingredients'>$ingredients</p>
                    <p class='price'>$productPrice</p>
                  </div>
                  <a class='btn' id='btn' href='/cart/?add-to-cart=$product->ID'>Add to cart</a>
                </div>
                <img src='$imageUrl'>
              </div>";
          } elseif ($galleryImage = $right['gallery_image']['sizes']['large']) {
              echo "<div class='image-container'>
                <img src='$galleryImage'>
              </div>";
          }
        } 
        } else {
        echo "
        <div class='image-container'>
          <img src='/content/uploads/2022/03/rimage1.jpg' alt='rimage1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/rimage2.jpg' alt='rimage2'>
        </div>
        <div class='image-container text'>
          <h2>Sometimes we visit with 
          producers at origin</h2>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/rimage3.jpg' alt='rimage3'>
        </div>
        <div class='image-container product'>
          <div class='content'>
            <div id='info-wrapper'>
              <h3>Guatemala</h3>
              <p>$20</p>
            </div>
            <btn class='btn'id='btn'>Add to cart</btn>
          </div>
          <img src='/content/uploads/2022/03/rmonte-1-635x635.jpg' alt='coffee-bag'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/rimage4.jpg' alt='image4'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/rimage5.jpg' alt='image5'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/galleryimage.jpg' alt='image5'>
        </div>";
      }?>
    </div>
  </div>
</div>
<div id='info-gap' class='info-section'>
  <div class='location-container'>
    <div class='location'>
      <h2 class='title'>Come Say Hi</h2>
      <p>visit our locations</p>
    </div>
    <div class='location'>
      <div class='location-text'>
        <h5>Flagship Location</h5>
        <h2>Iliff Coffeeshop</h2>
        <p>9731 E Iliff Ave Denver, CO 80231</p>
        <div class='time'>
          <svg id='icon' data-name="Icons – 24px / Time" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 47.519 47.519">
            <path id="Icon" class="cls-1" d="M21.76,43.519a21.76,21.76,0,1,1,21.76-21.76A21.784,21.784,0,0,1,21.76,43.519Zm0-39.892A18.143,18.143,0,0,0,8.93,34.589,18.143,18.143,0,0,0,34.589,8.93,18.019,18.019,0,0,0,21.76,3.627ZM32.131,25.894H19.149V8.26h3.627V22.267h9.355v3.627Z" transform="translate(2 2)"/>
          </svg>
          <p>Open Daily 7-5pm Dine-in + Takeout</p>
        </div>
      </div>
    </div>
    <div class='location'>
      <div class='location-text'>
        <h5>Food Hall Location</h5>
        <h2>Junction Coffeeshop</h2>
        <p>2000 S Colorado Blvd Building IV Denver, CO 80222</p>
        <div class='time'>
          <svg id='icon' data-name="Icons – 24px / Time" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 47.519 47.519">
            <path id="Icon" class="cls-1" d="M21.76,43.519a21.76,21.76,0,1,1,21.76-21.76A21.784,21.784,0,0,1,21.76,43.519Zm0-39.892A18.143,18.143,0,0,0,8.93,34.589,18.143,18.143,0,0,0,34.589,8.93,18.019,18.019,0,0,0,21.76,3.627ZM32.131,25.894H19.149V8.26h3.627V22.267h9.355v3.627Z" transform="translate(2 2)"/>
          </svg>
          <p id='time-text'>Weekdays 7-5pm Weekends 8-5pm Dine-in + Takeout</p>
        </div>
      </div>
    </div>
    <div class='location'>
      <div class='location-text'>
        <h5>Helpful Information</h5>
        <h2>FAQ</h2>
        <div class="time">
          <p id='info'>Want to know when your coffee comes in or other helpful info?</p>
          <p>Check out our FAQ page</p>
        </div>
      </div>
    </div>
    <div class="location"></div>
  </div>
  <div class="info-gallery">
    <div id='info-left-column' class="gallery-column">
      <?php if(have_rows('left_column_image')){
        foreach(get_field('left_column_image') as $infoLeft) {
          if($imageLeft = $infoLeft['info_image']['sizes']['large']) {
            echo "<div class='image-container'>
            <img src='$imageLeft'>
            </div>";
          }
        } 
      } else {
        echo "<div class='image-container'>
        <img src='/content/uploads/2022/03/8.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/4.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/10.15.21.12.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/1.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/17.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/11.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/14.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/18.jpg' alt='image1'>
        </div>";
      }?>
    </div>
    <div id='info-center-column' class="gallery-column">
      <?php if(have_rows('center_column_image')){
        foreach(get_field('center_column_image') as $infoCenter) {
          if($imageCenter = $infoCenter['info_image']['sizes']['large']) {
            echo "<div class='image-container'>
            <img src='$imageCenter'>
            </div>";
          }
        } 
      } else {
        echo "<div class='image-container'>
        <img src='/content/uploads/2022/03/IMG_2490.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/13.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/2.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/3.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/10.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/21.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/7.jpg' alt='image1'>
        </div>";
      }?>
    </div>
    <div id='info-right-column' class="gallery-column">
      <?php if(have_rows('right_column_image')){
        foreach(get_field('right_column_image') as $infoRight) {
          if($imageRight = $infoRight['info_image']['sizes']['large']) {
            echo "<div class='image-container'>
            <img src='$imageRight'>
            </div>";
          }
        } 
      } else {
        echo "<div class='image-container'>
        <img src='/content/uploads/2022/03/IMG_3497.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/16.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/5.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/6.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/9.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/12.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/20.jpg' alt='image1'>
        </div>
        <div class='image-container'>
          <img src='/content/uploads/2022/03/19.jpg' alt='image1'>
        </div>";
      }?>
    </div>
  </div>
</div>