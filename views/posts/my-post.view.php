  <!-- Header  -->
  <?php require base_path("/views/partials/header.php"); ?>

  <!-- Navbar  -->
  <?php require base_path("/views/partials/nav.php"); ?>

  <!-- Search Bar -->
  
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $pageHeading; ?></h1>
    </div>
  </header>

  <div class="post-details m-5 rounded-md bg-gray-100 md:w-2/3 md:mx-auto">
    <div class="laptop-image">
        <img src="/src/posts/<?= $post['laptop_photo'] ?>" class="w-full rounded-md" alt="laptop-image">
    </div>
    <div class="laptop-name my-5 mx-4">
      <h3 class="text-lg md:text-2xl font-medium text-stone-900">Laptop Name</h3>
      <p class="text-gray-600 text-sm font-medium my-2"><?= $post['laptop_name'] ?></p>
    </div>
    <div class="laptop-price my-5 mx-4">
      <h3 class="text-lg md:text-2xl font-medium text-stone-900">Laptop Price</h3>
      <p class="text-gray-600 text-sm font-medium my-2">Rs <?= $post['laptop_price'] ?></p>
    </div>
    <div class="laptop-description my-5 mx-4">
      <h3 class="text-lg md:text-2xl font-medium text-stone-900">Laptop Description</h3>
      <p class="text-gray-600 text-sm font-medium my-2">

        <?php
          $text = $post['laptop_detail'];

          $result = textWrap($text);

          echo $result;
            
        ?>

      </p>
    </div>
    <div class="laptop-condition my-5 mx-4">
      <h3 class="text-lg md:text-2xl font-medium text-stone-900">Laptop Condition</h3>
      <p class="text-gray-600 text-sm font-medium my-2"><?= $post['laptop_condition'] ?></p>
    </div>
    <div class="laptop-location my-5 mx-4">
      <h3 class="text-lg md:text-2xl font-medium text-stone-900">Laptop Location</h3>
      <p class="text-gray-600 text-sm font-medium my-2"><?= $post['laptop_location'] ?></p>
    </div>
  </div>


  <!-- Footer  -->
  <?php require base_path("/views/partials/footer.php"); ?>