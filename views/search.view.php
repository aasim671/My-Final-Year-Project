  <!-- Header  -->
  <?php require 'partials/header.php'; ?>
  
  <!-- Navbar -->
  <?php require 'partials/nav.php'; ?>


  <form action="/search" method="POST" class="flex items-center my-5 mx-7">
    <div class="relative w-full">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Quality Laptops" required="">
    </div>
    <button type="submit" name="search-button" class="px-6 py-2 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <span class="sr-only">Search</span>
    </button>
  </form>

  <!-- If desired search not found  -->

    <?php if(empty($posts)) : ?>

    <main class="grid min-h-full place-items-center bg-white py-24 px-6 sm:py-32 lg:px-8 -mt-14">
        <div class="text-center">
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Laptop not found.</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">Sorry, we couldn’t find laptop you're looking for.</p>
            <div class="mt-5 flex items-center justify-center gap-x-6">
            <a href="/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Search more</a>
            </div>
        </div>
    </main>

    <?php endif; ?>

  <!-- if Searched posts found  -->

  <section class="grid grid-cols-1 mx-auto gap-3 sm:grid-cols-2 md:grid-cols-3 2xl:grid-cols-4 max-w-7xl sm:mx-5">
      
      <?php foreach ($posts as $post): ?>

        <a href="<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']['id'] === $post['user_id']){echo 'your-post?id=' . $post['id'];}else{echo 'post?id=' . $post['id'];} ?>" loading="lazy">

        <div class="max-w-sm mx-auto rounded overflow-hidden shadow-md cursor-pointer border border-gray-300">
          <img class="w-full h-60 object-cover" src="/src/posts/<?= $post['laptop_photo'] ?>" alt="Sunset in the mountains" loading="lazy">
          <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2"><?= $post['laptop_name'] ?></div>
            <p class="text-gray-700 text-base">
              <?php

                $detail = limitDetails($post['laptop_detail']);
                
                echo $detail;  
              ?>
            </p>
            <h3 class="text-base font-bold text-gray-600 mt-2 -mb-3">RS <?= $post['laptop_price'] ?></h3>
          </div>
          <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= $post['formatted_time'] ?></span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= $post['laptop_condition'] ?></span>
          </div>
        </div>
        </a>

      <?php endforeach; ?>

  </section>

  <!-- Footer  -->
  <?php require 'partials/footer.php'; ?>