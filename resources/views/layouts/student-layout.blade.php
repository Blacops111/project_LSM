<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('student.dashboard') }}" class="text-xl font-bold">Student Dashboard</a>
            
            <ul class="flex space-x-6">
                <li><a href="{{ route('student.courses.index') }}" class="hover:underline">Courses</a></li>
                <li><a href="{{ route('student.assignments.index') }}" class="hover:underline">Assignments</a></li>
                <li><a href="{{ route('student.grades.index') }}" class="hover:underline">Grades</a></li>
                <li><a href="{{ route('student.discussions.index') }}" class="hover:underline">Discussions</a></li>
                <li><a href="{{ route('student.schedule.index') }}" class="hover:underline">Schedule</a></li>
                <li><a href="{{ route('student.notifications.index') }}" class="hover:underline">Notifications</a></li>
            </ul>

            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="text-white hover:underline">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

</body>
</html>

