<!-- Header  -->
<?php require base_path('/views/partials/header.php'); ?>
  
 
<!-- Navbar  -->
<?php require base_path('/views/partials/nav.php'); ?>


<!-- Profile Info  -->

<div id="alert-additional-content-4" class="p-4 mx-4 mb-4 text-black border border-yellow-300 rounded-lg bg-yellow-200 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800 sm:w-4/5 sm:mx-auto alert hidden" role="alert">
  <div class="flex items-center">
    <h3 class="text-lg font-medium">Logout message</h3>
  </div>
  <div class="mt-2 mb-4 text-sm">
    Are you sure to logout? once you click on logout button you will be logged-out of the site.
  </div>
  <div class="flex items-center">
    
    <button type="button" class="text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800" data-dismiss-target="#alert-additional-content-4" aria-label="Close" id="close-button">
      Dismiss
    </button>
    <form action="" method="POST">
        <button type="submit" class="mt-4 mx-3 text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800" data-dismiss-target="#alert-additional-content-4" aria-label="Close">
            Logout
        </button>
    </form>
  </div>
</div>




<div class="profile-info md:flex md:items-center m-3">

    <div class="left-side  m-2 md:w-2/4 ml-10">
        <img src="/src/images/profile-avatar<?php if($user_info['user_gender'] === 'Male') { echo '-male'; } else { echo '-female'; } ?>.png" class="w-2/5 md:m-auto" alt="avatar">
    </div>
    <div class="right-sie m-2 md:-ml-10">
        <h3 class="text-3xl text-gray-900 my-5 font-bold">Personal Info</h3>
        <div class="personal-info">
            <h3 class="font-medium text-gray-600"><span class="font-medium text-sky-600">Name</span> <?= $user_info['user_name'] ?> </h3>
            <p class="my-1 font-medium text-gray-600"><span class="font-medium text-sky-600">Gender</span> <?= $user_info['user_gender'] ?> </p>
            <p class="my-1 font-medium text-gray-600"><span class="font-medium text-sky-600">Email</span> <?= $user_info['user_email'] ?> </p>
            <p class="my-1 font-medium text-gray-600"><span class="font-medium text-sky-600">Phone No</span> <?= $user_info['user_phone'] ?> </p>
            <p class="my-1 font-medium text-gray-600"><span class="font-medium text-sky-600">Complete Address</span> <?= $user_info['user_address'] ?> </p>
            <p class="my-1 font-medium text-gray-600"><span class="font-medium text-sky-600">City</span> <?= $user_info['user_city'] ?> </p>
            <div class="edit-logout flex justify-between">
                <p class="mt-10"><a class="text-base font-medium text-blue-600 underline" href="/edit-profile?id=<?php echo $_SESSION['loggedin']['id']; ?>">Edit Profile</a></p>
                <p class="mt-10 text-base font-medium text-red-600 underline cursor-pointer" id="logout">Log out</p>
            </div>
        </div>
    </div>
</div>

<div class="post-button text-center mt-12">
  <a href="/post-create?id=<?= $_SESSION['loggedin']['id'] ?>"><button class="border border-slate-900 py-2 px-4 rounded bg-slate-900 hover:bg-slate-800 font-medium text-white">Create post</button></a>
</div>

<h2 class="text-3xl sm:text-4xl font-bold m-8">Your Posts</h2>

<section class="grid grid-cols-1 mx-auto gap-3 sm:grid-cols-2 md:grid-cols-3 2xl:grid-cols-4 max-w-7xl sm:mx-5">
    
     <?php foreach ($posts as $post): ?>

        <a href="/your-post?id=<?= $post['id'] ?>">
          <div class="max-w-sm mx-auto rounded overflow-hidden shadow-md border border-gray-300">
            <img class="w-full h-60 object-cover" src="/src/posts/<?= $post['laptop_photo'] ?>" alt="Sunset in the mountains">
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
<?php require base_path('/views/partials/footer.php'); ?>

  
<script>
    let btn = document.querySelector("#close-button");
    let alert = document.querySelector(".alert");
    let logout = document.querySelector("#logout");

    logout.addEventListener("click", () => {
        alert.classList.remove('hidden');
    });
    

    btn.addEventListener("click", () => {
        alert.classList.add('hidden');
    });
</script>    