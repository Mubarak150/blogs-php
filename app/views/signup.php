<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm flex flex-col items-center">
    <img src="./public//uploads/letter-b.webp" alt="" class="h-12 w-auto rounded-[99.9%]" />
    <h2 class="mt-2 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign Up to become a member</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

  <!-- the sign up form  -->
    <form action="/blogs/?page=user/register" method="POST" enctype="multipart/form-data" class="space-y-6">

      <div>
        <label for="name" class="block text-sm/6 font-medium text-gray-900">User Name</label>
        <div class="mt-2">
          <input id="name" type="text" name="name" required autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
      </div>

      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
      </div>

      <!-- image upload  input -->
      <!-- image upload  -->
        <div class="flex items-center space-x-6">
        <div class="shrink-0">
            <!-- This img will show preview -->
            <img id="preview_img" name="preview_img" class=" hidden h-16 w-16 object-cover rounded-full" 
                src="" alt="Profile photo" />
        </div>
        <label class="block">
            <span class="sr-only">Choose profile photo</span>
            <input type="file" name="profile_image" id="profile_image" accept="image/*" onchange="loadFile(event)" 
                class="block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-violet-50 file:text-violet-700
                        hover:file:bg-violet-100
                "/>
        </label>
        </div>


      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm/6 text-gray-500">
      Already a member?
      <a href="/blogs/?page=user/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Log in</a>
    </p>
  </div>
</div>

 <script>
        function loadFile(event) {
            let preview = document.getElementById('preview_img');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.classList.remove("hidden"); 
            preview.onload = () => {
            URL.revokeObjectURL(preview.src); // free memory
            }
        }
</script>
