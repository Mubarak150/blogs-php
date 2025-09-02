<div class="bg-white py-24 sm:py-32 dark:bg-gray-900 rounded-md">
<div class="mx-auto max-w-7xl px-6 lg:px-8 rounded-md">
    <div class="mx-auto max-w-2xl lg:mx-0">
    <h2 class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl dark:text-white">From the blogs</h2>
    <!-- <p class="mt-2 text-lg/8 text-gray-600 dark:text-gray-300">Learn how to grow your business with our expert advice.</p> -->
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3 dark:border-gray-700">
    <?php foreach ($posts as $post): ?>
        <article class="flex max-w-xl flex-col items-start justify-between">
            <div class="flex items-center gap-x-4 text-xs">
            <time datetime="2020-03-10" class="text-gray-500 dark:text-gray-400"><?php echo $post['created_at']; ?></time>
            <!-- <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100 dark:bg-gray-800/60 dark:text-gray-300 dark:hover:bg-gray-800">Sales</a> -->
            </div>
            <!-- image main  -->
            <div class="bg-[url(./<?php echo $post['thumbnail'] ?>)] mt-6 mb-4 rounded rounded-md h-56 w-full bg-cover bg-center"></div>
            <div class="group relative grow">
            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600 dark:text-white dark:group-hover:text-gray-300">
                <a href="/blogs/?page=blog/show&id=<?= $post['id'] ?>">
                <span class="absolute inset-0"></span>
                <?= htmlspecialchars($post['title']) ?>
                </a>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600 dark:text-gray-400"><?= htmlspecialchars($post['description']) ?></p>
            </div>
            <div class="relative mt-8 flex items-center gap-x-4 justify-self-end">
            <img  src="./<?php echo $post['user_profile_image'] ?>" class="rounded-[99.9%] h-8 w-8" />
            <div class="text-sm/6">
                <p class="font-semibold text-gray-900 dark:text-white">
                <a href="#">
                    <span class="absolute inset-0"></span>
                    <?= htmlspecialchars($post['user_name'] ?? 'Unknown') ?>
                </a>
                </p>
                <!-- <p class="text-gray-600 dark:text-gray-400">Front-end Developer</p> user_profile_image -->
            </div>
            </div>
        </article>
    <?php endforeach; ?>
    
    </div>
</div>
</div>