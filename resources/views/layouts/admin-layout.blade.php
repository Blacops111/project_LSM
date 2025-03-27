<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Ensure Tailwind is loaded -->
</head>
<body class="bg-gray-100">

    <!-- ✅ FIXED: Full-Width Navbar -->
    <nav class="bg-blue-600 p-4 text-white fixed top-0 left-0 w-full shadow-md z-50">
        <div class="max-w-7xl mx-auto flex justify-between">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">LMS Admin</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('courses.index') }}" class="hover:underline">Courses</a></li>
                <li><a href="{{ route('assignments.index') }}" class="hover:underline">Assignments</a></li>
                <li><a href="{{ route('students.index') }}" class="hover:underline">Students</a></li>
                <li><a href="{{ route('discussions.index') }}" class="hover:underline">Discussions</a></li>
                <li><a href="{{ route('reports.index') }}" class="hover:underline">Reports</a></li>
                <li><a href="{{ route('schedule.index') }}" class="hover:underline">Schedule</a></li>
                <li><a href="{{ route('notifications.index') }}" class="hover:underline">Notifications</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ✅ FIXED: Prevent Content from Being Cut Off -->
    <div class="max-w-7xl mx-auto p-6 mt-20">
        @yield('content')
    </div>

</body>
</html>
