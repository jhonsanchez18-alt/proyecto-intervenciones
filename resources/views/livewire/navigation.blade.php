<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Navbar Tailwind Elements</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">

      <!-- Mobile menu button -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button type="button"
          command="--toggle"
          commandfor="mobile-menu"
          class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500">
          <span class="sr-only">Open main menu</span>

          <!-- Open icon -->
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            aria-hidden="true" class="size-6 in-aria-expanded:hidden">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>

          <!-- Close icon -->
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </button>
      </div>

      
      <!-- Logo + Links -->
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <a href="/" class="flex shrink-0 items-center">
          <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
            alt="Your Company" class="h-8 w-auto" />
         </a>

        <!-- Desktop menu -->
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!--<a href="#" aria-current="page"
              class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Dashboard</a>
            <a href="#"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Team</a>
            <a href="#"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Projects</a>-->
            
            
            
            @foreach($categorias as $categoria)
            <a href="{{ route('activos.categoria', $categoria) }}"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">{{ $categoria->nombre }}</a>
            @endforeach 
            </div>
        </div>
      </div>
@auth
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

        <!-- Notification button -->
        <button type="button"
          class="relative rounded-full p-1 text-gray-400 focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
          <span class="sr-only">View notifications</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            aria-hidden="true" class="size-6">
            <path
              d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.65 3.56 1.095 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
              stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <el-dropdown class="relative ml-3">
          <button
            class="relative flex rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
            <span class="sr-only">Open user menu</span>
            <img
              src="{{auth()->user()->profile_photo_url}}"
              alt="" class="size-8 rounded-full bg-gray-800 outline -outline-offset-1 outline-white/10" />
          </button>

          <el-menu anchor="bottom end" popover
            class="w-48 origin-top-right absolute rounded-md bg-white mt-2 py-1 shadow-lg outline outline-black/5 transition">
            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your profile</a>
            <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
            <form method="POST" action="{{ route('logout') }}" x-data>
             @csrf
            
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click.prevent="$root.submit();">
              Sign out
            </a>
            </form>
          </el-menu>
        </el-dropdown>

      </div>
      @else
        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">
          Login
        </a>
        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">
          Registrar   
        </a>
      @endauth
      <!-- Notifications + Profile menu -->
      
    </div>
  </div>

  <!-- Mobile menu -->
  <el-disclosure id="mobile-menu" hidden class="sm:hidden">
    <div class="space-y-1 px-2 pt-2 pb-3">
      @foreach  ($categorias as $categoria)
      <a href="#"
        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">{{ $categoria->nombre }}</a>
      @endforeach
      </div>
  </el-disclosure>

</nav>

<!-- SCRIPT DE TAILWIND ELEMENTS (DEBE IR AL FINAL) -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

</body>
</html>