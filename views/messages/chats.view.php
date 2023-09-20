  <!-- Header  -->
  <?php require base_path("/views/partials/header.php"); ?>

  <!-- Navbar  -->
  <?php require base_path("/views/partials/nav.php"); ?>


  <style>
    /* Hide scrollbar */
    .overflow-y-auto::-webkit-scrollbar {
      display: none;
    }
</style>


    <!-- Chat sections starts  -->

<!-- HTML -->
<div class="flex flex-col md:flex-row h-screen bg-gray-200">

  <div class="md:flex-none md:w-64 bg-purple-900">
    <ul class="p-2">
      <li class="text-2xl font-bold py-2 my-4 text-white">Conversations</li>
 
      <!-- Users li  -->

      <?php foreach($users as $user) : ?>
        
        <?php if($user['id'] !== $_SESSION['loggedin']['id']) : ?>

          <form action="" method="POST">
            <input type="hidden" name="user-id" value="<?= $user['id'] ?>">
            <li class="font-bold py-2 px-4 my-2 cursor-pointer rounded-md <?php if($user['user_name'] === $user_name){echo 'text-black bg-white'; $receiver_id = $user['id'];}else{echo 'text-white bg-gray-800';} ?>">
              <button type="submit" name="submit" class="w-full text-left"><?= $user['user_name'] ?></button>
            </li>
          </form>
        
        <?php endif; ?>

      <?php endforeach ?>

      
    </ul>
  </div>

  <div class="flex-1 p-4 h-96">
    
  <body class="overflow-hidden">

  <h3 class="text-xl text-blue-900 font-bold border-b-2 border-gray-900 py-2 <?php if(! isset($user_name)){echo 'hidden';} ?>"><?= $user_name ?></h3>

  <div class="relative w-full p-6 overflow-y-auto h-96 max-h-96 overflow-hidden mr-5">

    <ul class="space-y-2">

      <?php if(isset($messages)) : ?>
          <?php foreach($messages as $message) : ?>
            <li class="flex justify-<?= $message['sender_id'] === $_SESSION['loggedin']['id'] ? 'end' : 'start' ?>">
              <div class="relative max-w-xl px-4 py-2 text-white bg-<?= $message['sender_id'] === $_SESSION['loggedin']['id'] ? 'gray' : 'blue' ?>-600 rounded shadow">
              <span class="block"><?= $message['message'] ?></span>
              </div>
            </li>
          <?php endforeach; ?>
      <?php else : ?>
        <li class="text-xl font-medium">No messages</li>
      <?php endif; ?>

    </ul>

    

</div>

</body>

<p class="my-2 text-red-600 font-medium"><?= isset($error_message['error']) ? $error_message['error'] : "" ?></p>
    <form action="" method="POST" class="mt-16">
      <div class="flex">
      <input type="hidden" name="receiver-id" value="<?= isset($receiver_id) ? $receiver_id : 0 ?>">
        <input type="text" name="message-body" class="border border-gray-500 p-2 flex-1 mr-2 rounded-md" placeholder="Type your message..." autocomplete="off">
        <button type="submit" name="message" class="bg-blue-600 text-white px-4 py-2 rounded">Send</button>
      </div>
    </form>
  </div>

</div>


  <!-- Footer  -->
  <?php require base_path("/views/partials/footer.php"); ?>

