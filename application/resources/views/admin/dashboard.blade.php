<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 min-h-screen">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.doctors.index') }}" class="block py-2 px-4 hover:bg-gray-700">Doctors</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 hover:bg-gray-700">Users</a>
                <a href="{{ route('admin.patients.index') }}" class="block py-2 px-4 hover:bg-gray-700">Patients</a>
                <a href="{{ route('admin.contactus.index') }}" class="block py-2 px-4 hover:bg-gray-700">Contact Messages</a>
                <a href="{{ route('admin.admins.index') }}" class="block py-2 px-4 hover:bg-gray-700">Admins</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

            <!-- Statistics (Only shown on the Dashboard page) -->
            @if (request()->routeIs('admin.dashboard'))
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Doctors</h3>
                        <p class="text-2xl font-bold">{{ $statistics['doctors'] }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Users</h3>
                        <p class="text-2xl font-bold">{{ $statistics['users'] }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Patients</h3>
                        <p class="text-2xl font-bold">{{ $statistics['patients'] }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Contact Messages</h3>
                        <p class="text-2xl font-bold">{{ $statistics['contacts'] }}</p>
                    </div>
                </div>
            @endif

            <!-- Doctors Section -->
            @if (request()->routeIs('admin.doctors.index'))
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Doctors</h3>
                    <ul>
                        @foreach ($doctors as $doctor)
                            <li class="mb-2">{{ $doctor->nom }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Users Section -->
            @if (request()->routeIs('admin.users.index'))
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Users</h3>
                    <ul>
                        @foreach ($users as $user)
                            <li class="mb-2">{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Patients Section -->
            @if (request()->routeIs('admin.patients.index'))
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Patients</h3>
                    <ul>
                        @foreach ($patients as $patient)
                            <li class="mb-2">{{ $patient->nom }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Contact Messages Section -->
            @if (request()->routeIs('admin.contactus.index'))
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Contact Messages</h3>
                    <ul>
                        @foreach ($contacts as $contact)
                            <li class="mb-2">{{ $contact->name }} - {{ $contact->email }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Admins Section -->
            @if (request()->routeIs('admin.admins.index'))
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Admins</h3>
                    <ul>
                        @foreach ($admins as $admin)
                            <li class="mb-2">{{ $admin->nom }}</li>
                        @endforeach
                    </ul>
                    <!-- Add Admin Form -->
                    <form action="{{ route('admin.create') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="text" name="nom" placeholder="Name" class="border p-2 rounded w-full mb-2" required>
                        <input type="email" name="email" placeholder="Email" class="border p-2 rounded w-full mb-2" required>
                        <input type="password" name="password" placeholder="Password" class="border p-2 rounded w-full mb-2" required>
                        <input type="text" name="role" placeholder="Role" class="border p-2 rounded w-full mb-2" required>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Admin</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
