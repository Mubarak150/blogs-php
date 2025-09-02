<div class="px-4 sm:px-6 lg:px-8 lg:pt-24">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold text-gray-900 dark:text-white"><?php echo ucfirst($table_title) ?></h1>
    </div>
    <a href="/blogs/?page=blog/add" class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      <button type="button"  class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500">Add Blog</button>
    </a>
  </div>
  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="relative min-w-full divide-y divide-gray-300 dark:divide-white/15">
          <thead>
            <tr>
              <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-0 dark:text-white">Title</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Description</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Author</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Published</th>
              <th scope="col" class="px-3 py-3.5 text-right text-sm font-semibold text-gray-900 dark:text-white sr-only">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-white/10">
            <?php if (!empty($blogs)): ?>
              <?php foreach ($blogs as $blog): ?>
                <tr>
                  <!-- Blog Title -->
                  <td class="py-4 pr-3 pl-4 text-sm font-medium whitespace-nowrap text-gray-900 sm:pl-0 dark:text-white">
                    <?= $blog['title'] ?>
                  </td>

                  <!-- Blog Description (max 12 chars) -->
                  <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                    <?= htmlspecialchars(mb_strimwidth($blog['description'], 0, 40, '...')) ?>
                  </td>

                  <!-- Blog Author -->
                  <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                    <?= htmlspecialchars($blog['user_name'] ?? 'Unknown') ?>
                  </td>

                  <!-- Published Status -->
                  <td class="px-3 py-4 text-sm whitespace-nowrap">
                    <?php if (!empty($blog['isPublished'])): ?>
                      <span class="text-green-600 font-semibold">Published</span>
                    <?php else: ?>
                      <span class="text-red-600 font-semibold">Not Published</span>
                    <?php endif; ?>
                  </td>

                  <!-- Actions -->
                  <td class="py-4 pr-4 pl-3 text-right text-sm font-medium whitespace-wrap sm:pr-0">
                    <a href="/blogs?page=blog/show&id=<?= $blog['id'] ?>"
                      class="text-green-600 hover:text-green-900 dark:text-indigo-400 dark:hover:text-indigo-300 pr-2">
                      view<span class="sr-only">, <?= htmlspecialchars($blog['title']) ?></span>
                    </a>

                    <a href="/blogs?page=blog/edit&id=<?= $blog['id'] ?>"
                      class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 pr-2">
                      Edit<span class="sr-only">, <?= htmlspecialchars($blog['title']) ?></span>
                    </a>
                    <!-- Delete Button -->
                    <button onclick="openModal(<?= $blog['id'] ?>, '<?= htmlspecialchars($blog['title']) ?>')" 
                            class="text-red-400 hover:text-red-600">
                      Delete<span class="sr-only">, <?= htmlspecialchars($blog['title']) ?></span>
                    </button>

                    

                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="px-3 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                  No blogs available
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- confirm delete Modal -->
<div id="deleteModal" class="fixed inset-0 hidden bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in flex items-center justify-center">
  <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-sm w-full">
    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Deletion</h2>
    <p id="deleteMessage" class="mt-2 text-sm text-gray-600 dark:text-gray-300"></p>
    <div class="mt-4 flex justify-end gap-2">
      <button onclick="closeModal()" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
      <a id="confirmDeleteBtn" href="#" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</a>
    </div>
  </div>
</div>

<script>
  function openModal(id, title) {
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteMessage').innerText = `Are you sure you want to delete "${title}"?`;
    document.getElementById('confirmDeleteBtn').href = `/blogs?page=blog/destroy&id=${id}`;
  }

  function closeModal() {
    document.getElementById('deleteModal').classList.add('hidden');
  }
</script>
