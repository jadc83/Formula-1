<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 text-left">
                <tr>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Nacionalidad</th>
                    <th class="px-4 py-2 border-b">Fecha de nacimiento</th>
                    <th class="px-4 py-2 border-b">Puesto</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $piloto->nombre . ' ' . $piloto->apellido }}</td>
                    <td class="px-4 py-2 border-b">{{ $piloto->nacionalidad }}</td>
                    <td class="px-4 py-2 border-b">{{ $piloto->nacimiento }}</td>
                    <td class="px-4 py-2 border-b">{{ class_basename($piloto->asignable_type) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
