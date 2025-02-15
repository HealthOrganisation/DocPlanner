<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 min-h-screen">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-blue-700">Dashboard</a>
                <a href="{{ route('admin.doctors.index') }}" class="block py-2 px-4 hover:bg-blue-700">Doctors</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 hover:bg-blue-700">Users</a>
                <a href="{{ route('admin.patients.index') }}" class="block py-2 px-4 hover:bg-blue-700">Patients</a>
                <a href="{{ route('admin.contactus.index') }}" class="block py-2 px-4 hover:bg-blue-700">Contact Messages</a>
                <a href="{{ route('admin.admins.index') }}" class="block py-2 px-4 hover:bg-blue-700">Admins</a>
                <a href="{{ route('admin.articles.create') }}" class="block py-2 px-4 hover:bg-blue-700">Add Article</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8 text-blue-800">Doctors List</h1>

            <div class="bg-white p-6 rounded-lg shadow">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Speciality</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Location</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Phone</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->specialite }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->location }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
