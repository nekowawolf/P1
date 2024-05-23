<?php
require 'fetch_donate.php';
require 'fetch_crypto.php';


// Memeriksa apakah donate_id ada di query string
if (!isset($_GET['donate_id'])) {
  echo "Donation ID not specified.";
  exit();
}

$donate_id = $_GET['donate_id'];
$donation = null;
foreach ($donate_data as $donate) {
  if ($donate['id'] == $donate_id) {
    $donation = $donate;
    break;
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web3donate</title>
  <link rel="shortcut icon" href="img/logo.png" />
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</head>

<body>

  <body class="">
    <nav class="relative px-4 py-4 flex justify-between items-center bg-white">
      <a class="text-3xl font-bold leading-none" href="#">
        <a class="mr-auto text-3xl font-bold leading-none" href="index.php">
          <img src="img/logo.png" alt="" class="w-14 h-14" />
        </a>
      </a>
      <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-blue-600 p-3">
          <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Mobile menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
          </svg>
        </button>
      </div>
      <ul
        class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li>
          <a class="text-sm text-gray-400 hover:text-gray-500" href="index.php">Donate</a>
        </li>
        <li class="text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
          </svg>
        </li>
        <li>
          <a class="text-sm text-gray-400 hover:text-gray-500" href="https://app.uniswap.org/swap"
            target="_blank">Swap</a>
        </li>
        <li class="text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
          </svg>
        </li>

        <li>
          <a class="text-sm text-gray-400 hover:text-gray-500" href="feedback.html">Feedback</a>
        </li>
      </ul>
      <div>

        <?php
        // Menghubungkan ke database dan mengambil data user
        require 'fetch_user.php';

        // Jika tidak ada data user, redirect ke login
        if (empty($user_data)) {
          header("Location: signin.html");
          exit();
        }
        ?>

        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"
          class="w-10 h-10 rounded-full cursor-pointer" src="https://images.gameinfo.io/pokemon/256/p94f466.webp"
          alt="User dropdown">

        <!-- Dropdown menu -->
        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
          <div class="px-4 py-3 text-sm text-gray-900">
            <div><?php echo htmlspecialchars($user_data['username']); ?></div>
            <div class="font-medium truncate"><?php echo htmlspecialchars($user_data['email']); ?></div>
          </div>
          <ul class="py-2 text-sm text-black-700 dark:text-black-200" aria-labelledby="avatarButton">
            <li>
              <a href="h_donate.php" class="block px-4 py-2  hover:bg-blue-500 ">Donate
                History</a>
            </li>
            <li>
              <a href="h_feedback.php" class="block px-4 py-2  hover:bg-blue-500 ">Feedback
                History</a>
            </li>
          </ul>
        </div>
      </div>




      </div>
      <a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200"
        href="home.html">Logout</a>
    </nav>
    <div class="navbar-menu relative z-50 hidden">
      <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
      <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
          <a class="mr-auto text-3xl font-bold leading-none" href="#">
            <img src="img/logo.png" alt="" class="w-80 h-80" />
          </a>
          <button class="navbar-close">
            <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div>
          <ul>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                href="index.php">Donate</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                href="https://app.uniswap.org/swap" target="_blank">Swap</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                href="feedback.html">Feedback</a>
            </li>
          </ul>
        </div>
        <div class="mt-auto">
          <div class="pt-6">
            <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-xl"
              href="home.html">Logout</a>
          </div>
        </div>
      </nav>
    </div>
  </body>

  <script>
    // Burger menus
    document.addEventListener("DOMContentLoaded", function () {
      // open
      const burger = document.querySelectorAll(".navbar-burger");
      const menu = document.querySelectorAll(".navbar-menu");

      if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
          burger[i].addEventListener("click", function () {
            for (var j = 0; j < menu.length; j++) {
              menu[j].classList.toggle("hidden");
            }
          });
        }
      }

      // close
      const close = document.querySelectorAll(".navbar-close");
      const backdrop = document.querySelectorAll(".navbar-backdrop");

      if (close.length) {
        for (var i = 0; i < close.length; i++) {
          close[i].addEventListener("click", function () {
            for (var j = 0; j < menu.length; j++) {
              menu[j].classList.toggle("hidden");
            }
          });
        }
      }

      if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
          backdrop[i].addEventListener("click", function () {
            for (var j = 0; j < menu.length; j++) {
              menu[j].classList.toggle("hidden");
            }
          });
        }
      }
    });
  </script>


  <div class="max-w-md mx-auto">
    <h1 class="text-3xl font-bold mb-4 text-center mt-10">Payment</h1>
    <?php if ($donation): ?>
      <div class="mb-6 p-4 bg-white shadow-md rounded">
        <div class="flex justify-center mb-4">
          <img src="<?php echo htmlspecialchars($donation['image_url']); ?>" alt="Donation Image"
            class="w-full h-64 object-cover rounded">
        </div>
        <h2 class="text-2xl font-bold mb-2 text-center"><?php echo htmlspecialchars($donation['name']); ?></h2>
        <p class="text-gray-700 mb-4 text-center"><?php echo htmlspecialchars($donation['description']); ?></p>

        <form action="process_payment.php" method="post">
          <input type="hidden" name="donate_id" value="<?php echo htmlspecialchars($donation['id']); ?>">
          <input type="hidden" name="user_email" value="<?php echo htmlspecialchars($user_email); ?>">

          <div class="mb-4">
            <label for="crypto" class="block text-gray-700 font-bold">Select Payment Method:</label>
            <select id="crypto" name="crypto" class="mt-1 p-2 w-full border rounded" onchange="showAddress()" required>
              <option value="">Select a crypto method</option>
              <?php foreach ($crypto_data as $crypto): ?>
                <option value="<?php echo htmlspecialchars($crypto['id']); ?>"
                  data-address="<?php echo htmlspecialchars($crypto['address']); ?>">
                  <?php echo htmlspecialchars($crypto['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div id="crypto-address" class="mb-4 text-gray-700 font-bold"></div>

          <div class="mb-4">
            <label for="tx" class="block text-gray-700 font-bold">Transaction Proof (TX):</label>
            <input type="text" id="tx" name="tx" class="mt-1 p-2 w-full border rounded" required>
          </div>

          <div class="mb-4">
            <label for="message" class="block text-gray-700 font-bold">Message:</label>
            <textarea id="message" name="message" class="mt-1 p-2 w-full border rounded"></textarea>
          </div>

          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Pay Now</button>
        </form>
      </div>
    <?php else: ?>
      <p class="text-center text-red-500">Donation not found.</p>
    <?php endif; ?>
  </div>

  <script>
    function showAddress() {
      var cryptoSelect = document.getElementById('crypto');
      var selectedCrypto = cryptoSelect.options[cryptoSelect.selectedIndex];
      var address = selectedCrypto.getAttribute('data-address');
      document.getElementById('crypto-address').innerText = 'Address: ' + address;
    }
  </script>

</body>

</html>