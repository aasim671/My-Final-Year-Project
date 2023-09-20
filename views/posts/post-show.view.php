<?php require base_path('/views/partials/header.php'); ?>

<?php require base_path('/views/partials/nav.php'); ?>


<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $pageHeading; ?></h1>
    </div>
  </header>

  <div class="flex flex-wrap md:flex-no-wrap m-4">

    <div class="w-full md:w-3/5 order-1 md:order-none p-4">
      <img src="/src/posts/<?= $post['laptop_photo'] ?>" class="rounded-md w-full" alt="laptop-image" loading="lazy">
    </div>

    <div class="w-full md:w-2/5 order-3 md:order-none p-4 my-5">
      <div class="border border-gray-800 rounded p-4">
        <h3 class="text-lg font-bold text-gray-800"><?= $post['laptop_name'] ?></h3>
        <h3 class="text-base mx-1 font-semibold text-zinc-800">RS <?= $post['laptop_price'] ?> /-</h3>
        <p class="mt-4 text-gray-700"><?= $post['laptop_location'] ?></p>
      </div>
      <div class="border border-gray-800 my-3 p-4 rounded">
        <h3 class="my-2 text-xl text-gray-800 font-bold">Seller Details</h3>
        <div class="flex items-center">
          <img class="h-16 w-16" src="/src/images/profile-avatar<?php if($post['user_gender'] === 'Male') { echo '-male'; } else { echo '-female'; } ?>.png" alt="avatar-image" loading="lazy">
          <h3 class="ml-3 text-base font-semibold cursor-pointer"><?= $post['user_name'] ?></h3>
        </div>
        <a href="/contact-seller?user_id=<?= $post['user_id'] ?>"><p class="border bg-emerald-900 text-white font-bold rounded mx-auto text-center cursor-pointer w-3/4 my-4 py-2">Chat With Seller</p></a>
        <div class="flex items-center justify-center">
          <img src="/src/images/phone.png" class="h-12 w-12" alt="phone-icon" loading="lazy">
          <h3 class="my-2 text-center ml-4 text-lg font-semibold text-zinc-800"><?= $post['user_phone'] ?></h3>
        </div>
      </div>
    </div>

    <div class="w-full md:w-3/5 order-2 md:order-none border border-gray-500 rounded p-5 my-3">
      <h3 class="text-2xl font-bold text-gray-900 my-3">Laptop Details</h3>
      <p class="text-gray-700 leading-7">
        <?php
          $text = $post['laptop_detail'];

          $result = textWrap($text);

          echo $result;
            
        ?>
      </p>
    </div>
 </div>



<?php require base_path('/views/partials/footer.php'); ?>