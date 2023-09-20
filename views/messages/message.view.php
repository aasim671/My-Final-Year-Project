  <!-- Header  -->
  <?php require base_path("/views/partials/header.php"); ?>

  <!-- Navbar  -->
  <?php require base_path("/views/partials/nav.php"); ?>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $pageHeading; ?></h1>
    </div>
  </header>


    <div class="message-section md:flex md:flex-row-reverse">
        <div class="p-4 md:w-2/3">
            <div class="container mx-auto my-4">
            <div class="max-w-2xl border rounded">
                <div>
                    <div class="w-full">
                    <div class="relative flex items-center p-3 border-b border-gray-300 bg-gray-100">
                
                    <p class="block ml-2 font-bold text-gray-600">Contact Seller</span></p>
                
                </div>
                <div class="relative w-full p-6 overflow-y-auto h-auto max-h-96">

                    <ul class="space-y-2" id="table-data">

                        <?php if(!isset($messages) || empty($messages)) : ?>
                            <li class="font-medium my-2 text-gray-800">No messages</li>
                        <?php else : ?>    
                            <?php foreach($messages as $message) : ?>
                                <li class="flex justify-<?= $message['sender_id'] === $_SESSION['loggedin']['id'] ? 'end' : 'start' ?>">
                                    <div class="relative max-w-xl px-4 py-2 text-white bg-<?= $message['sender_id'] === $_SESSION['loggedin']['id'] ? 'gray' : 'blue' ?>-600 rounded shadow">
                                        <span class="block"><?= $message['message'] ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>    
                        <?php endif; ?>
        
                    </ul>

                </div>

            <div class="flex items-center w-full p-2 border-t border-gray-100 bg-gray-100">

                <form class="w-full" action="" method="POST">
                    <label for="chat" class="sr-only">Your message</label>
                    <div class="flex items-center px-3 py-2 rounded-lg bg-gray-100 dark:bg-gray-700">
                        <textarea id="chat" name="message" rows="1" class="block mx-3 p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                        <button type="submit" name="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                            </svg>
                            <span class="sr-only">Send message</span>
                        </button>
                    </div>
                </form>

                
                </div>
            </div>
            </div>
        </div>
        </div>
        </div>

        <div class="p-4 md:w-1/2 my-5">
            <div class="border border-gray-800 my-3 p-4 rounded">
                <h3 class="my-4 text-2xl text-gray-800 font-bold">Seller Details</h3>
                <div class="flex items-center">
                    <img class="h-16 w-16" src="/src/images/profile-avatar-male.png" alt="avatar-image">
                    <h3 class="ml-3 text-base font-semibold cursor-pointer"><?= $user_info['user_name'] ?></h3>
                </div>
                <div class="address my-3">
                    <h3 class="text-xl text-slate-800 font-medium">Address</h3>
                    <p class="text-base text-gray-700 font-medium"><?= $user_info['user_address'] ?></p>
                </div>
                <div class="contact my-3">
                    <h3 class="text-xl text-slate-800 font-medium">Phone no</h3>
                    <p class="text-base text-gray-700 font-medium"><?= $user_info['user_phone'] ?></p>
                </div>
        
            </div>
        </div>
    </div>

    


  <!-- Footer  -->
  <?php require base_path("/views/partials/footer.php"); ?>