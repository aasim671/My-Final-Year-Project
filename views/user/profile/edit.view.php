  <!-- Header  -->
  <?php require base_path('/views/partials/header.php'); ?>
  

  <!-- Navbar  -->
  <?php require base_path('/views/partials/nav.php'); ?>


  <header class="bg-white shadow mb-5">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $pageHeading; ?></h1>
    </div>
  </header>
  
  <div class="w-3/4 mx-auto my-3 bg-blue-500 border border-blue-400 text-white px-4 py-3 rounded relative <?php if($created_alert === true){echo "";}else{echo "hidden";} ?>" role="alert" id="create_alert">

    <strong class="font-bold">Personal Info!</strong>
    <span class="block sm:inline">Your profile has been created successfully.
    
  </div>

  <div class="w-3/4 mx-auto my-3 bg-yellow-500 border border-yellow-400 text-black px-4 py-3 rounded relative <?php if($updated_alert === true){echo "";}else{echo "hidden";} ?>" role="alert" id="update_alert">
    
    <strong class="font-bold">Personal Info!</strong>
    <span class="block sm:inline">Your profile is updated.
    
  </div>

<div class="my-5 mx-3 sm:mt-0 bg-gray-100 p-6 rounded-xl">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-2xl font-bold leading-6 text-gray-900">Note</h3>
        <p class="my-4 text-sm text-gray-600">Any personal information provided will be shared with the buyer or seller for the purpose of contact except (email). </p>
        <p class="text-blue-700 text-lg font-medium underline">
          <a href="/profile?id=<?php echo $_SESSION['loggedin']['id']; ?>">visit profile</a>
        </p>
      </div>
    </div>
    <div class="mt-5 md:col-span-2 md:mt-0">
      <form action="" method="POST">
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5 sm:p-6">
            <div class="grid grid-cols-8 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $user['user_name'] ?>">
                <p class="my-2 text-red-500 text-sm font-medium"><?= isset($name_error['name']) ? $name_error['name'] : "" ?></p>
              </div>


              <div class="col-span-6 sm:col-span-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email ( we won't share your email )</label>
                <input type="text" name="email" id="email" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $user['user_email'] ?>" required>
                <p class="my-2 text-red-500 text-sm font-medium"><?= isset($email_error['email']) ? $email_error['email'] : "" ?></p>
              </div>

              
            
              <div class="col-span-6">
                <label for="address" class="block text-sm font-medium text-gray-700">Complete address</label>
                <input type="text" name="address" id="address" autocomplete="street-address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= isset($_POST['address']) ? $_POST['address'] : "" ?>">
                <p class="my-2 text-red-500 text-sm font-medium"><?= isset($address_error['address']) ? $address_error['address'] : "" ?></p>
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">City Name</label>
                <input type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
              </div>


              <div class="col-span-6 sm:col-span-3">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
                <input type="number" name="phone" id="phone" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= isset($_POST['phone']) ? $_POST['phone'] : "" ?>">
                <p class="my-2 text-red-500 text-sm font-medium"><?= isset($phone_error['phone']) ? $phone_error['phone'] : "" ?></p>
              </div>

              <div class="col-span-6 sm:col-span-3 mt-6">
                <select class="block appearance-none w-full border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight  focus:bg-white focus:border-indigo-500" name="gender" id="grid-state">
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>

            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            
            <button href="/user-logout" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
              <a href="/user-logout">Logout</a>
            </button>
            

            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>



  <!-- Footer  -->
  <?php require base_path('/views/partials/footer.php'); ?>

<script>

  // Re-usable function for hidding alerts 

function hideAlert(alertId, timeInMS) 
{

  setTimeout(() => {
    
    const alertDiv = document.querySelector(`#${alertId}`);
    alertDiv.classList.add('hidden');
    
  }, timeInMS);

}

  hideAlert('create_alert', 4000);
  hideAlert('update_alert', 3000);

</script>