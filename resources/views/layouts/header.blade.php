<header class="glass fixed top-0 left-0 w-full z-50 transition-all duration-300">
    <nav class="container mx-auto px-1 py-1 flex items-center justify-between"> 
        <a href="{{ route('content.index') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="hidden-lg h-20">
        </a> 

        <ul class="hidden xl:flex ml-5 space-x-6 mx-auto text-black league-spartan text-lg font-light">
             <li><a href="{{ route('content.index') }}" class="px-1 btnheader">Início</a></li>
             <li><a href="#" class="px-1 btnheader">Receitas</a></li>
            <li><a href="{{ route('categories.index') }}" class="px-1 btnheader">Categorias</a></li>
            <li><a href="#" class="px-1 btnheader">Chefs</a></li>
        </ul>        

        <div class="flex items-center space-x-5 mx-2">
            <form action="{{ route('search') }}" method="GET" class="form relative">
                <button class="absolute left-2 -translate-y-1/2 top-1/2 p-1">
                    <svg
                    width="17"
                    height="16"
                    fill="none"      
                    role="img"
                    aria-labelledby="search"
                    class="w-5 h-5 text-gray-700"
                    >
                    <path
                        d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                        stroke="currentColor"
                        stroke-width="1.333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    ></path>
                    </svg>
                </button>
                <input
                    class="input bg-white rounded-full px-8 py-2 border-2 border-transparent focus:outline-none focus:border-blue-500 placeholder-gray-400 transition-all duration-300 shadow-sm"
                    placeholder="Search..."
                    required=""
                    type="text"
                    name="query"
                    value="{{ request('query') }}"
                />
                <button type="reset" class="absolute right-3 -translate-y-1/2 top-1/2 p-1">
                    <svg                    
                    class="w-5 h-5 text-gray-700"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    ></path>
                    </svg>
                </button>
            </form>
        </div>
        <button id="menu-toggle" class="block xl:hidden text-white hover:text-blue-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <button class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
            <a href="#">Login</a>
        </button>
    </nav>    

    <div id="mobile-menu" class="header hidden block xl:hidden">
        <ul class="flex flex-col items-center py-4 space-y-4">
            <li><a href="{{ route('content.index') }}" class="text-white text-lg league-spartan">Início</a></li>
            <li><a href="#" class="text-white text-lg league-spartan">Vídeos</a></li>
            <li><a href="{{ route('categories.index') }}" class="text-white text-lg league-spartan">Categorias</a></li>
            <li><a href="#" class="text-white text-lg league-spartan">Chefs</a></li>
        </ul>
    </div>
</header>

<script>    
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
   
    const header = document.getElementById('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('header-scrolled');
        } else {
            header.classList.remove('header-scrolled');
        }
    });
</script>