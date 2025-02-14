<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
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
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8 text-blue-800">Patients List</h1>

            <div class="bg-white p-6 rounded-lg shadow">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Date of Birth</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Weight</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Height</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($patients as $patient)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $patient->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $patient->date_naissance }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $patient->poids }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $patient->taille }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.patients.destroy', $patient->id_patient) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient?');">
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
