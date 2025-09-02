<section class="pt-20 max-w-3xl mx-auto px-4">
  <!-- Back -->
  <div class="mb-6">
    <a href="/blogs?page=blog/index" class="text-sm font-medium text-indigo-600 hover:underline">
      ← Back to posts
    </a>
  </div>

  <!-- Thumbnail -->
  
    <img
      src="./<?php echo $post['thumbnail'] ?>"
      alt="<?= $post['title'] ?? 'Post thumbnail'?>"
      class="w-full max-h-96 object-cover rounded-2xl shadow"
    />
  

  <!-- Title -->
  <h1 class="mt-6 text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
    <?= htmlspecialchars($post['title'] ?? 'Untitled') ?>
  </h1>

  <!-- Meta -->
  <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
    <?= !empty($post['created_at'])
        ? date('M j, Y • g:i A', strtotime($post['created_at']))
        : '—' ?>
  </p>

  <!-- Body -->
  <article class="prose prose-indigo dark:prose-invert max-w-none mt-6">
    <?= nl2br(htmlspecialchars($post['description'] ?? '')) ?>
  </article>
</section>
