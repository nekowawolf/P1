<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donasi | Register</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body class="bg-gray-50 dark:bg-gray-900 flex justify-center items-center h-screen">
    <div class="container mx-auto">
      <div class="flex flex-col lg:flex-row w-10/12 lg:w-8/12 bg-white rounded-xl mx-auto shadow-lg overflow-hidden">
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center" style="background-image: url('');">
          <h1 class="text-white text-3xl mb-3">Welcome</h1>
          <div>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean suspendisse aliquam varius rutrum purus maecenas ac <a href="#" class="text-purple-500 font-semibold">Learn more</a></p>
          </div>
        </div>
        <div class="w-full lg:w-1/2 py-16 px-12">
          <h2  class="text-3xl mb-4">Register</h2>
          <p class="mb-4">
            Create your account. It’s free and only take a minute
          </p>
          <form action="#">
            <div class="grid grid-cols-2 gap-5">
              <input type="text" placeholder="Firstname" class="border border-gray-400 py-1 px-2">
              <input type="text" placeholder="Surname" class="border border-gray-400 py-1 px-2">
            </div>
            <div class="mt-5">
              <input type="text" placeholder="Email" class="border border-gray-400 py-1 px-2 w-full">
            </div>
            <div class="mt-5">
              <input type="password" placeholder="Password" class="border border-gray-400 py-1 px-2 w-full">
            </div>
            <div class="mt-5">
              <input type="password" placeholder="Confirm Password" class="border border-gray-400 py-1 px-2 w-full">
            </div>
            <div class="mt-5">
              <input type="checkbox" class="border border-gray-400">
              <span>
                I accept the <a href="#" class="text-purple-500 font-semibold">Terms of Use</a> &  <a href="#" class="text-purple-500 font-semibold">Privacy Policy</a> 
              </span>
            </div>
            <div class="mt-5">
              <button class="w-full bg-purple-500 py-3 text-center text-white">Register Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script type="module" src="/main.js"></script>
  </body>
</html>
