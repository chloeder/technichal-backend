   <nav class="bg-blue-500 border-gray-200 dark:bg-gray-900 shadow-2xl">
       <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
           <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
               <button type="button"
                   class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                   id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                   data-dropdown-placement="bottom">
                   <span class="sr-only">Open user menu</span>
                   <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
               </button>
               <!-- Dropdown menu -->
               <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                   id="user-dropdown">
                   <div class="px-4 py-3">
                       <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                       <span
                           class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                   </div>
                   <ul class="py-2" aria-labelledby="user-menu-button">
                       <li>
                           <a href="{{ route('logout') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                               out</a>
                       </li>
                   </ul>
               </div>
               <button data-collapse-toggle="navbar-user" type="button"
                   class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                   aria-controls="navbar-user" aria-expanded="false">
                   <span class="sr-only">Open main menu</span>
                   <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                       viewBox="0 0 17 14">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M1 1h15M1 7h15M1 13h15" />
                   </svg>
               </button>
           </div>
           <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
               <ul
                   class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-none dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                   <li>
                       <a href="{{ route('home') }}"
                           class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-white md:p-0 md:dark:text-blue-500">Home</a>
                   </li>
                   <li>
                       <a href="{{ route('items') }}"
                           class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-white md:p-0 md:dark:text-blue-500">Barang</a>
                   </li>
                   <li>
                       <a href="{{ route('transaction') }}"
                           class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Transaksi</a>
                   </li>

               </ul>
           </div>
       </div>
   </nav>