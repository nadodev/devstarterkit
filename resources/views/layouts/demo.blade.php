<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DevStarter Kit Demo')</title>
    <meta name="description" content="Painel administrativo demo do DevStarter Kit">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .sidebar-gradient {
            background: linear-gradient(180deg, #1e293b 0%, #334155 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        .sidebar-transition {
            transition: all 0.3s ease-in-out;
        }
        
        .sidebar-hidden {
            transform: translateX(-100%);
        }
        
        .sidebar-visible {
            transform: translateX(0);
        }
        
        .floating-action {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen" x-data="{ sidebarOpen: true, mobileMenuOpen: false }">
    <div class="flex h-screen">
        <!-- Mobile Overlay -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 lg:hidden"
             @click="mobileMenuOpen = false"></div>

        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-72 sidebar-gradient transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0"
             :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
             x-show="sidebarOpen || !mobileMenuOpen"
             x-init="if (window.innerWidth >= 1024) { sidebarOpen = true; }">
            
            <!-- Toggle Button - Mobile Only -->
            <button @click="sidebarOpen = !sidebarOpen" 
                    class="absolute -right-12 top-6 z-50 bg-white/90 backdrop-blur-sm text-gray-700 hover:text-gray-900 hover:bg-white rounded-full p-3 shadow-lg border border-gray-200/50 transition-all duration-200 hover:scale-110 lg:hidden">
                <i class="fas fa-bars text-lg" x-show="!sidebarOpen"></i>
                <i class="fas fa-times text-lg" x-show="sidebarOpen"></i>
            </button>
            
            <!-- Logo Section -->
            <div class="p-6 border-b border-slate-600/50">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg floating-action">
                        <i class="fas fa-rocket text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">DevStarter Kit</h1>
                        <p class="text-slate-300 text-sm">Demo Panel</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-8 px-4 space-y-2">
                <a href="{{ route('demo.dashboard') }}" 
                   class="flex items-center px-4 py-3 text-slate-300 hover:bg-white hover:bg-opacity-10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('demo.dashboard') ? 'bg-white bg-opacity-20 text-white shadow-lg' : '' }}">
                    <i class="fas fa-chart-line mr-4 w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <a href="{{ route('demo.users.index') }}" 
                   class="flex items-center px-4 py-3 text-slate-300 hover:bg-white hover:bg-opacity-10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('demo.users.*') ? 'bg-white bg-opacity-20 text-white shadow-lg' : '' }}">
                    <i class="fas fa-users mr-4 w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Usuários</span>
                </a>
                
                <a href="{{ route('demo.clients.index') }}" 
                   class="flex items-center px-4 py-3 text-slate-300 hover:bg-white hover:bg-opacity-10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('demo.clients.*') ? 'bg-white bg-opacity-20 text-white shadow-lg' : '' }}">
                    <i class="fas fa-user-tie mr-4 w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Clientes</span>
                </a>
                
                <a href="{{ route('demo.projects.index') }}" 
                   class="flex items-center px-4 py-3 text-slate-300 hover:bg-white hover:bg-opacity-10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('demo.projects.*') ? 'bg-white bg-opacity-20 text-white shadow-lg' : '' }}">
                    <i class="fas fa-project-diagram mr-4 w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Projetos</span>
                </a>
                
                <a href="{{ route('demo.tasks.index') }}" 
                   class="flex items-center px-4 py-3 text-slate-300 hover:bg-white hover:bg-opacity-10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('demo.tasks.*') ? 'bg-white bg-opacity-20 text-white shadow-lg' : '' }}">
                    <i class="fas fa-tasks mr-4 w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Tarefas</span>
                </a>
                
                <a href="{{ route('demo.settings') }}" 
                   class="flex items-center px-4 py-3 text-slate-300 hover:bg-white hover:bg-opacity-10 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('demo.settings') ? 'bg-white bg-opacity-20 text-white shadow-lg' : '' }}">
                    <i class="fas fa-cog mr-4 w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Configurações</span>
                </a>
            </nav>

            <!-- User Info -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-slate-600/50">
                <div class="flex items-center p-3 bg-white/5 rounded-xl">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=3B82F6&color=fff" 
                         alt="Admin" class="w-10 h-10 rounded-full border-2 border-slate-400">
                    <div class="ml-3">
                        <p class="text-white font-medium text-sm">Admin User</p>
                        <p class="text-slate-300 text-xs">Administrador</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col transition-all duration-300 ease-in-out lg:ml-0"
             :class="sidebarOpen ? 'ml-0' : 'ml-0'">
            <!-- Top Bar -->
            <header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-200/50 sticky top-0 z-30">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <!-- Mobile Menu Button -->
                        <button @click="mobileMenuOpen = !mobileMenuOpen" 
                                class="lg:hidden p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors mr-4">
                            <i class="fas fa-bars text-lg"></i>
                        </button>
                        
                        
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h2>
                            <p class="text-gray-600">@yield('page-description', 'Visão geral do sistema')</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="hidden md:block relative">
                            <input type="text" 
                                   placeholder="Buscar..." 
                                   class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-white/50 backdrop-blur-sm">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        
                        <!-- Notifications -->
                        <div class="relative">
                            <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors relative">
                                <i class="fas fa-bell text-lg"></i>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center animate-pulse">3</span>
                            </button>
                        </div>
                        
                        <!-- Profile -->
                        <div class="flex items-center space-x-3 bg-gray-50/80 backdrop-blur-sm rounded-xl p-2 border border-gray-200/50">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=3B82F6&color=fff" 
                                 alt="Admin" class="w-8 h-8 rounded-full border-2 border-white shadow-sm">
                            <div class="hidden sm:block">
                                <p class="text-sm font-medium text-gray-700">Admin User</p>
                                <p class="text-xs text-gray-500">Administrador</p>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 overflow-y-auto">
                @if(session('success'))
                    <div class="mb-6 bg-green-100/80 backdrop-blur-sm border border-green-400 text-green-700 px-4 py-3 rounded-xl shadow-sm">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-100/80 backdrop-blur-sm border border-red-400 text-red-700 px-4 py-3 rounded-xl shadow-sm">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
        
        <!-- Floating Sidebar Toggle (when closed) - Mobile Only -->
        <div x-show="!sidebarOpen" 
             x-transition:enter="transition-all duration-300 ease-out"
             x-transition:enter-start="opacity-0 transform scale-75"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition-all duration-300 ease-in"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-75"
             class="fixed top-6 left-6 z-40 lg:hidden">
 
        </div>
    </div>

    @yield('scripts')
</body>
</html>