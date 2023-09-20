<?php

return [

    '/' => 'controllers/index.php',

    '/user-register' => 'controllers/user/register.php',
    '/user-register/success' => 'controllers/user/register-success.php',
    '/user-guide' => 'controllers/website.php',

    '/user-login' => 'controllers/user/login.php',
    '/user-logout' => 'controllers/user/logout.php',

    '/profile' => 'controllers/user/profile/show.php',
    '/edit-profile' => 'controllers/user/profile/edit.php',

    '/post' => 'controllers/posts/post-show.php',
    '/post-create' => 'controllers/posts/create.php',
    '/your-post' => 'controllers/posts/my-post.php',

    '/contact-seller' => 'controllers/messages/message.php',
    '/chats' => 'controllers/messages/chats.php',

    '/search' => 'controllers/search.php'

];