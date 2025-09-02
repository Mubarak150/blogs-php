<form action="/blogs/?page=blog/create" method="POST" enctype="multipart/form-data" class="pt-24 lg:px-4">
  <div class="space-y-12">
    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3 dark:border-white/10">
      <div>
        <h2 class="text-base/7 font-semibold text-gray-900 dark:text-white">Create Your Blog</h2>
        <p class="mt-1 text-sm/6 text-gray-600 dark:text-gray-400">This information will be displayed publicly so be careful what you share.</p>
      </div>

      <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2 w-full">
        <div class="sm:col-span-6">
          <label for="title" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Blog Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 dark:bg-white/5 dark:outline-white/10 dark:focus-within:outline-indigo-500">
              <!-- <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6 dark:text-gray-400">workcation.com/</div> -->
              <input id="title" type="text" name="title" placeholder="Conserving Resources..." class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 dark:bg-transparent dark:text-white dark:placeholder:text-gray-500" />
            </div>
          </div>
        </div>

        <div class="col-span-full">
          <label for="description" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Description</label>
          <div class="mt-2">
            <textarea id="description" name="description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500"></textarea>
          </div>
          <!-- <p class="mt-3 text-sm/6 text-gray-600 dark:text-gray-400">Write your blog here.</p> -->
        </div>

        <div class="col-span-full">
          <label for="thumbnail" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Thumbnail Image</label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 dark:border-white/25">
            <div class="text-center">
              <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="mx-auto size-12 text-gray-300 dark:text-gray-500">
                <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm/6 text-gray-600 dark:text-gray-400">
                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-600 hover:text-indigo-500 dark:bg-transparent dark:text-indigo-400 dark:focus-within:outline-indigo-500 dark:hover:text-indigo-400">
                  <span>Upload a file</span>
                  <input id="file-upload" type="file" name="thumbnail" class="sr-only" />
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs/5 text-gray-600 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
            </div>
          </div>

          <div class="flex items-center gap-x-3 pt-4">
            <input 
              id="isPublished" 
              type="checkbox" 
              name="isPublished" 
              value="true"
              class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 dark:border-white/10 dark:bg-white/5 dark:checked:border-indigo-500 dark:checked:bg-indigo-500 dark:focus-visible:outline-indigo-500 dark:disabled:border-white/5 dark:disabled:bg-white/10 dark:disabled:before:bg-white/20 forced-colors:appearance-auto forced-colors:before:hidden" 
              checked
            />
            <label for="isPublished" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Publish</label>
          </div>
        </div>
      </div>

      

    </div>

    

    <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900 dark:text-white">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:focus-visible:outline-indigo-500">Create</button>
  </div>

  </div>
</form>
