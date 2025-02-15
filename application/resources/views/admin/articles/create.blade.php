<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
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
            <h1 class="text-3xl font-bold mb-8 text-blue-800">Add Article</h1>

            <!-- Add Article Form -->
            <form action="{{ route('admin.articles.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow mb-8" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea id="content" name="content" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <input type="text" id="category" name="category" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="date_posted" class="block text-sm font-medium text-gray-700">Date Posted</label>
                    <input type="date" id="date_posted" name="date_posted" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Save</button>
            </form>

            <!-- List of Articles -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-2xl font-bold mb-4">Articles</h2>
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 bg-blue-50 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($articles as $article)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $article->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $article->category }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-16 h-16 object-cover rounded">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
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
