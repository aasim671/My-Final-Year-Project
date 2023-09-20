<!-- Header -->
<?php require base_path('/views/partials/header.php') ?>
  
<!-- Navbar -->
<?php require base_path('/views/partials/nav.php') ?>

<!-- Log-out page  -->
<div class="py-4 px-6 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
You are logged-out successfully! <a class="underline font-medium" href="/user-login" >login here</a>
</div>

<h1 class="px-6 text-xl md:text-3xl text-red-700 font-medium">You are logged-out of your account.</h1>

<!-- Log-out page  -->

<!-- Footer -->
<?php require base_path('/views/partials/footer.php') ?>

<script>

    setTimeout( () => {
        window.location = "/user-login";
    }, 4000);

</script>