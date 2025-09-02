<form action="/blogs/?page=blog/update&id=<?php echo $blog['id'] ?>" 
      method="POST" 
      enctype="multipart/form-data" 
      class="pt-24 lg:px-4">

  <div class="space-y-12">
    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3 dark:border-white/10">
      
      <div>
        <h2 class="text-base/7 font-semibold text-gray-900 dark:text-white">Update Blog</h2>
        <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-400">
          This information will be displayed publicly so be careful what you share.
        </p>
      </div>

      <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2 w-full">

        <!-- Blog Title -->
        <div class="sm:col-span-6">
          <label for="title" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Blog Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 dark:bg-white/5 dark:outline-white/10 dark:focus-within:outline-indigo-500">
              <input id="title" 
                     type="text" 
                     name="title" 
                     value="<?php echo $blog['title'] ?? '' ?>" 
                     placeholder="Conserving Resources..." 
                     class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 dark:bg-transparent dark:text-white dark:placeholder:text-gray-500" />
            </div>
          </div>
        </div>

        <!-- Description -->
        <div class="col-span-full">
          <label for="description" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Description</label>
          <div class="mt-2">
            <textarea id="description" 
                      name="description" 
                      rows="3" 
                      class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500"><?php echo htmlspecialchars($blog['description'] ?? '') ?></textarea>
          </div>
        </div>

        <!-- Thumbnail Upload -->
        <div class="col-span-full">
          <label for="thumbnail" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Thumbnail Image</label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 dark:border-white/25">
            <div class="text-center">
              <?php if (!empty($blog['thumbnail'])): ?>
                <img src="./<?php echo $blog['thumbnail'] ?>" alt="Thumbnail" class="mx-auto mb-4 h-20 w-20 object-cover rounded">
              <?php endif; ?>
              
              <div class="mt-4 flex text-sm/6 text-gray-600 dark:text-gray-400">
                <label for="file-upload" 
                       class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-600 hover:text-indigo-500 dark:bg-transparent dark:text-indigo-400 dark:focus-within:outline-indigo-500 dark:hover:text-indigo-400">
                  <span>Upload a file</span>
                  <input id="file-upload" type="file" name="thumbnail" class="sr-only" />
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs/5 text-gray-600 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
            </div>
          </div>

          <!-- Publish -->
          <div class="flex items-center gap-x-3 pt-4">
            <input id="isPublished" 
                   type="checkbox" 
                   name="isPublished" 
                   value="1"
                   <?php echo !empty($blog['isPublished']) ? 'checked' : '' ?> 
                   class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:before:bg-white/20 forced-colors:appearance-auto forced-colors:before:hidden" />
            <label for="isPublished" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Publish</label>
          </div>
        </div>

      </div>
    </div>

    <!-- Form Buttons -->
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/blogs" class="text-sm/6 font-semibold text-gray-900 dark:text-white">Cancel</a>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:focus-visible:outline-indigo-500">Update</button>
    </div>
  </div>
</form>
