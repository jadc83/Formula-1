<x-app-layout>
    <div class="max-w-5xl mx-auto mt-10 space-y-6">
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-sm text-left">
                <thead class="bg-gray-100 text-gray-700">
                    <tr class="bg-white border border-gray-800 ">
                        <th class="px-4 py-2 border">Nombre</th>
                        <th class="px-4 py-2 border">Nacionalidad</th>
                        <th class="px-4 py-2 border">Nacimiento</th>
                        <th class="px-4 py-2 border">Puesto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pilotos as $piloto)
                        <tr>
                            <td class="px-4 py-2 border border-indigo-500">
                                <a href="{{ route('pilotos.show', $piloto) }}">{{ $piloto->nombre . ' ' . $piloto->apellido }}</a>
                            </td>
                            <td class="px-4 py-2 border  border-indigo-500">{{ $piloto->nacionalidad }}</td>
                            <td class="px-4 py-2 border  border-indigo-500">{{ $piloto->nacimiento }}</td>
                            <td class="px-4 py-2 border  border-indigo-500">{{ class_basename($piloto->asignable_type) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            <a href="{{ route('pilotos.create') }}">
                <x-primary-button>Crear nuevo piloto</x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>
