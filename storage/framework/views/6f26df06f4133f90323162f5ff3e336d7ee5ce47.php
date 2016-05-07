<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="<?php echo csrf_token(); ?>" />
        <title>Laravel</title>

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous"> -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> -->
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>
        <style>
            body {
                font-family: 'Lato';
            }

            .fa-btn {
                margin-right: 6px;
            }
        </style>
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-reverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        Laravel
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <?php if(!Auth::guest() && Auth::user()->admin): ?>
                        <li><a href="<?php echo e(url('/allPosts')); ?>">Home</a></li>
                        <li><a href="<?php echo e(url('/allUsers')); ?>">users</a></li>
                        <li><a href="<?php echo e(url('/newUser')); ?>">Add Users</a></li>
                        <li><a href="<?php echo e(url('/newPost')); ?>">New Post</a></li>
                        <li><a href="<?php echo e(url('/publishPosts')); ?>">Unpublished Posts</a></li>
                        <?php elseif(!Auth::guest() && !Auth::user()->admin && !Auth::user()->blocked): ?>
                        <li><a href="<?php echo e(url('/allPosts')); ?>">Home</a></li>

                    <li class="dropdown">
                        <a href="<?php echo e(url('/allPosts')); ?>" data-toggle="dropdown" class="dropdown-toggle"> Order By <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(url('/orderBy/id')); ?>">Order By ID</a></li>
                            <li><a href="<?php echo e(url('/orderBy/title')); ?>">Order By Title</a></li>
                            <li><a href="<?php echo e(url('/orderBy/created_at')); ?>"> Recently Added</a>
                            </li>
                            <li><a href="<?php echo e(url('/orderBy/updated_at')); ?>">Order By latest update</a>
                            </li>
                            <li><a href="<?php echo e(url('/orderBy/viewCount')); ?>">Most Seen</a></li>
                        </ul>
                    </li>

                        <li><a href="<?php echo e(url('/updateProfile')); ?>">My Profile</a></li>
                        <li><a href="<?php echo e(url('/myPosts')); ?>">My Posts</a></li> 
                        <li><a href="<?php echo e(url('/newPost')); ?>">New Post</a></li>
                        <?php else: ?>
                        <li></li>
                        <?php endif; ?>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                        <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>

        <!-- JavaScripts -->
        <script src="../js/jquery.js"></script> 
        <script src="../js/bootstrap.min.js"></script> 
        <script src="../js/site.js"></script>
    </body>
</html>
