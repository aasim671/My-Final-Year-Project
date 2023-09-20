

<nav class="bg-gray-800">
    <div class="flex justify-between mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

      <div class="flex h-16 items-center justify-between">

        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-14 w-14" src="/src/images/shop-icon.png" alt="Your Company">
          </div>

          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/" class="<?php echo isUrl('/') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>

              <a href="/user-guide" class="<?php echo isUrl('/user-guide') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Website flow</a>

              <!-- <a href="/user-guide" class="<?php echo isUrl('/website-flow') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> px-3 py-2 rounded-md text-sm font-medium">Website flow</a> -->

              

            </div>
          </div>

        </div>
        
        
      </div>

      <?php if($_SESSION['loggedin'] ?? false) : ?>

        <div class="relative flex items-center">

        <div>
          <a href="/chats?id=<?= $_SESSION['loggedin']['id'] ?>">
            <img src="/src/images/message.png" class="w-8 h-8 filter invert" alt="chat-image">
          </a>
        </div>
          
          <div class="dropdown relative">
            <img id="dropdownMenuButton2" src="/src/images/login.png" class="w-12 h-12 mx-6 cursor-pointer" alt="login-image">
            <div class="dropdown-menu hidden absolute right-0 z-10 mt-4 w-48 origin-top-right rounded-md bg-slate-700 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="/profile?id=<?php echo $_SESSION['loggedin']['id']; ?>" class="block px-4 py-2 text-sm text-slate-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
              <a href="/edit-profile?id=<?php echo $_SESSION['loggedin']['id']; ?>" class="block px-4 py-2 text-sm text-slate-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Edit Profile</a>
            </div>
          </div>
        </div>


      <?php else : ?>
      
      <div class="register-user">

        
        <a href="../user-register"><button class="my-2 bg-white hover:bg-slate-800 hover:text-white text-gray-800 font-semibold py-2 px-6 border border-gray-500 rounded shadow">Register</button></a>
        <a href="/user-login"><button class="my-2 bg-white hover:bg-slate-800 hover:text-white text-gray-800 font-semibold py-2 px-6 border border-gray-500 rounded shadow">Login</button></a>

       
      </div>
      
      <?php endif; ?>

    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="/" class="<?php echo isUrl('/') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Home</a>

        <a href="/user-guide" class="<?php echo isUrl('/about') ? 'bg-gray-900 text-white' : 'text-gray-300'; ?> block px-3 py-2 rounded-md text-base font-medium">Website Flow</a>

      </div>
      
    </div>
</nav>



<script>

const dropdownButton = document.querySelector("#dropdownMenuButton2");
const dropdownMenu = document.querySelector(".dropdown-menu");

dropdownButton.addEventListener("click", function() {
  dropdownMenu.classList.toggle("hidden");
});

document.addEventListener("click", function(event) {
  if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
    dropdownMenu.classList.add("hidden");
  }
});

</script>