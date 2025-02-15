<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function toggleAddAdminForm() {
            const form = document.getElementById('addAdminForm');
            form.classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 min-h-screen">
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
                <a href="{{ route('admin.articles.create') }}" class="block py-2 px-4 hover:bg-gray-700">Add Article</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8 text-blue-800">Admins List</h1>

            <!-- Add New Admin Button -->
            <div class="mb-6">
                <button onclick="toggleAddAdminForm()" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Add New Admin</button>
            </div>

            <!-- Add New Admin Form (Hidden by Default) -->
            <div id="addAdminForm" class="hidden bg-white p-6 rounded-lg shadow mb-6">
                <h2 class="text-xl font-bold mb-4">Add New Admin</h2>
                <form action="{{ route('admin.store') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="nom" name="nom" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <input type="text" id="role" name="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Add Admin</button>
                </form>
            </div>

            <!-- Admins Table -->
            <div class="bg-white p-6 rounded-lg shadow">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($admins as $admin)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $admin->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $admin->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $admin->role }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this admin?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
