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

  <!-- Alert for creating post completed  -->

  <div class="w-3/4 mx-auto my-3 bg-blue-500 border border-blue-400 text-white px-4 py-3 rounded relative <?php if($post_created === true){echo "";}else{echo "hidden";} ?>" role="alert" id="post_created">

    <strong class="font-bold">Post Created</strong>
    <span class="block sm:inline">Your post has been created successfully. <a href="/" class="text-black underline">click to see</a>
    
  </div>

  <!-- Creating a post  -->
<div>
  <div class="mx-4 md:w-11/12 md:mx-auto md:my-6 ">
    
    <div class="mt-5 md:col-span-2 md:mt-0">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="shadow sm:overflow-hidden sm:rounded-md border border-gray-400">
          <div class="space-y-6  px-4 py-5 sm:p-6 bg-gray-50">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <div class="col-span-6 sm:col-span-3">
                  <label for="laptop-name" class="block text-sm font-medium text-gray-700">Laptop name</label>
                  <input type="text" name="laptop-name" id="laptop-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $_POST['laptop-name'] ?? "" ?>">
                  <p class="my-2 text-red-500 text-sm font-medium"><?= isset($name_error['name']) ? $name_error['name'] : "" ?></p>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-1">
                <div class="col-span-6 sm:col-span-3">
                  <label for="laptop-price" class="block text-sm font-medium text-gray-700">Price in RS</label>
                  <input type="number" name="laptop-price" id="laptop-price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $_POST['laptop-price'] ?? "" ?>">
                  <p class="my-2 text-red-500 text-sm font-medium"><?= isset($price_error['price']) ? $price_error['price'] : "" ?></p>

                </div>
              </div>
            </div>

            <div>
              <label for="laptop-description" class="block text-sm font-medium text-gray-700">Details</label>
              <div class="mt-1">
                <textarea id="laptop-description" name="laptop-description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="describe"><?= $_POST['laptop-description'] ?? "" ?></textarea>
                <p class="my-2 text-red-500 text-sm font-medium"><?= isset($description_error['details']) ? $description_error['details'] : "" ?></p>
              </div>
              <p class="mt-2 text-sm text-gray-500">Briefly describe the laptop with details</p>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-1">
                <div class="col-span-6 sm:col-span-2">
                  <select class="block appearance-none w-full border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight  focus:bg-white focus:border-indigo-500" name="laptop-condition" id="grid-state">
                  <option>Used</option>
                  <option>New</option>
                </select>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <div class="col-span-6 sm:col-span-3">
                <label for="laptop-location" class="block text-sm font-medium text-gray-700">Your Locaton</label>
                <input type="text" name="laptop-location" id="laptop-location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $_POST['laptop-location'] ?? "" ?>">
                <p class="my-2 text-red-500 text-sm font-medium"><?= isset($location_error['location']) ? $location_error['location'] : "" ?></p>
              </div>
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <div class="col-span-6 sm:col-span-3">
                <label for="user-phone" class="block text-sm font-medium text-gray-700">Contact No</label>
                <input type="text" name="user-phone" id="user-phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="0336••••••••••" value="<?= $_POST['user-phone'] ?? "" ?>">
                <p class="my-2 text-red-500 text-sm font-medium"><?= isset($phone_error['phone']) ? $phone_error['phone'] : "" ?></p>
              </div>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Laptop photo</label>
              <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  
                  </svg>
                  
                    
                  <div class="flex flex-col items-center justify-center text-lg text-gray-600">
                    <p class="text-sm text-gray-600 font-medium">Please upload a horizontally oriented image for a better visual appearance.</p>
                    <label for="laptop-photo" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                      <span>Upload a file</span>
                      
                      <input id="laptop-photo" name="laptop-photo" type="file" class="sr-only">
                     <p class="my-2 text-red-500 text-sm font-medium"><?= isset($photo_error['photo']) ? $photo_error['photo'] : "" ?></p>
                    </label>
                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Post</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>




  <!-- Footer  -->
  <?php require base_path("/views/partials/footer.php"); ?>


<script>

  function hideAlert(alertId, timeInMS) 
  {

    setTimeout(() => {
      
      const alertDiv = document.querySelector(`#${alertId}`);
      alertDiv.classList.add('hidden');
      
    }, timeInMS);

  }

  hideAlert("post_created", 5000);

</script>  