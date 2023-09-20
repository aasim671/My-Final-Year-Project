<!-- Header -->
<?php require base_path('/views/partials/header.php') ?>
  
<!-- Navbar -->
<?php require base_path('/views/partials/nav.php') ?>

<div class="py-4 px-6 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
Your account has been created successfully! <a class="underline font-medium" href="/user-login" >login here</a>
</div>

<h1 class="px-6 text-xl md:text-3xl text-green-900 font-medium">Thanks for creating account here.</h1>

<!-- Footer -->
<?php require base_path('/views/partials/footer.php') ?>

<!-- Code for redirecting to user-login page after registration -->

<script>

    setTimeout( () => {
        window.location = "/user-login";
    }, 4000);

</script>