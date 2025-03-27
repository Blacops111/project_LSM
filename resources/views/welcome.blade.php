<!DOCTYPE html>
<html lang="en" 
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', value => { localStorage.setItem('darkMode', value); document.documentElement.classList.toggle('dark', value) })"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to LMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <style>
        [x-cloak] { display: none; }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-white transition-colors duration-300">

    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-lg transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="#" class="text-2xl font-bold text-blue-500 dark:text-yellow-400">LMS</a>
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-500">Home</a>
                    <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-blue-500">About</a>
                    <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-500">Login</a>
                    <a href="{{ route('register') }}" 
                        class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 shadow-lg transition-all transform hover:scale-105">
                        Register
                    </a>
                </div>
                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 ml-4 transition-all duration-300">
                    <span x-show="!darkMode">🌞</span>
                    <span x-show="darkMode">🌙</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Slideshow -->
    <section class="relative w-full h-screen flex items-center justify-center bg-black" 
        x-data="{ images: ['https://source.unsplash.com/1600x900/?education', 'https://source.unsplash.com/1600x900/?learning', 'https://source.unsplash.com/1600x900/?students'], currentIndex: 0 }" 
        x-init="setInterval(() => currentIndex = (currentIndex + 1) % images.length, 5000)">
        <div class="absolute inset-0">
            <template x-for="(image, index) in images">
                <img :src="image" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000" x-show="currentIndex === index">
            </template>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="text-center text-white relative z-10">
            <h1 class="text-5xl font-bold animate-fade-in">Welcome to Your LMS</h1>
            <p class="mt-4 text-lg animate-fade-in">Learn, Grow, and Achieve with Our Online Courses.</p>
            <div class="mt-6">
                <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-500 hover:bg-blue-700 rounded-lg text-white font-semibold">Login</a>
                <a href="{{ route('register') }}" class="ml-4 px-6 py-3 bg-green-500 hover:bg-green-700 rounded-lg text-white font-semibold">Register</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white dark:bg-gray-800 text-gray-700 dark:text-white text-center">
        <h2 class="text-3xl font-bold">Why Choose Our LMS?</h2>
        <div class="mt-10 flex flex-wrap justify-center gap-8">
            <div class="max-w-xs p-6 bg-gray-100 dark:bg-gray-700 rounded-xl shadow-md transition-all duration-500 animate-slide-up">
                <h3 class="text-xl font-semibold">📚 Quality Courses</h3>
                <p class="mt-2 text-sm">Access top-notch learning materials and assignments.</p>
            </div>
            <div class="max-w-xs p-6 bg-gray-100 dark:bg-gray-700 rounded-xl shadow-md transition-all duration-500 animate-slide-up">
                <h3 class="text-xl font-semibold">🎓 Student-Friendly</h3>
                <p class="mt-2 text-sm">Engaging content and easy-to-use platform.</p>
            </div>
            <div class="max-w-xs p-6 bg-gray-100 dark:bg-gray-700 rounded-xl shadow-md transition-all duration-500 animate-slide-up">
                <h3 class="text-xl font-semibold">📅 Learn Anytime</h3>
                <p class="mt-2 text-sm">Flexible learning at your own pace.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-6">
        <p>&copy; 2025 Your LMS. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.directive('scroll-fade', (el) => {
                el.classList.add('opacity-0', 'translate-y-10', 'transition-all', 'duration-700');
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('opacity-100', 'translate-y-0');
                        }
                    });
                }, { threshold: 0.1 });

                observer.observe(el);
            });

            document.querySelectorAll('.animate-slide-up').forEach(el => Alpine.directive('scroll-fade')(el));
        });
    </script>

</body>
</html>
