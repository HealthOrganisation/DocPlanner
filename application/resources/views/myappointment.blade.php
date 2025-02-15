<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Rendez-vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">

    <!-- Header -->
    <header>
        @include('header')
    </header>

    <br><br><br>

    <!-- Liste des Rendez-vous -->
    <div class="max-w-5xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Liste des rendez-vous</h2>

        <!-- Table des rendez-vous -->
        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-blue-500 text-white">
            <tr>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Doctor</th> <!-- New Column -->
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td class="p-3">{{ optional($appointment->disponibilite)->date }}</td>
                        <td class="p-3">{{ $appointment->phone }}</td>
                        <td class="p-3">{{ $appointment->email }}</td>
                        <td class="p-3">
                            @if(optional($appointment->disponibilite)->doctor)
                                <a href="{{ route('doctors.showw', $appointment->disponibilite->doctor->id_doctor) }}" 
                                   class="text-blue-600 underline">
                                    Dr. {{ $appointment->disponibilite->doctor->nom }}
                                </a>
                            @else
                                <span class="text-gray-500">Non assigné</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
