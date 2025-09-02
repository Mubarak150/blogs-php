<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title><?php echo $title ?></title>
  </head>
  <body>
    <!-- hero starts -->
        <div class="bg-white">
            <?php
                if(!($_SERVER['REQUEST_URI'] === '/blogs/?page=user/login' || $_SERVER['REQUEST_URI'] === '/blogs/?page=user/login')) {
                    require_once './app/views/layouts/header.php'; 
                }
            ?>

            <!-- rendering dynamic page for each -->
            <main class="container mx-auto p-4">
                <?php require_once $contentPath; ?>
            </main>
        </div>

    <!-- hero ends here -->
  </body>
</html>
<!-- note: this is the root layout page for this app. -->