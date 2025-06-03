<x-app-layout>
    <div class="max-w-5xl mx-auto mt-10 space-y-6">
        @foreach ($pilotos as $piloto)
            <div class="border border-gray-300 rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                <table class="w-full text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border-b">Nombre</th>
                            <th class="px-4 py-2 border-b">Nacionalidad</th>
                            <th class="px-4 py-2 border-b">Fecha de nacimiento</th>
                            <th class="px-4 py-2 border-b">Puesto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">
                                <a href="{{ route('pilotos.show', $piloto) }}" class="block w-full">
                                    {{ $piloto->nombre . ' ' . $piloto->apellido }}
                                </a>
                            </td>
                            <td class="px-4 py-2 border-b">
                                {{ $piloto->nacionalidad }}
                            </td>
                            <td class="px-4 py-2 border-b">
                                {{ $piloto->nacimiento }}
                            </td>
                            <td class="px-4 py-2 border-b">
                                {{ class_basename($piloto->asignable_type) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

    <div class="mt-10 flex justify-center">
        <form action="{{ route('pilotos.create') }}" method="get">
            <x-primary-button>Crear nuevo piloto</x-primary-button>
        </form>
    </div>
</x-app-layout>
