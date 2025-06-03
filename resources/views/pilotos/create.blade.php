<x-app-layout>
    <div x-data="{ status: ''}" class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <form action="{{ route('pilotos.store') }}" method="post" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="status" value="Categoría" />
                <select x-model="status" name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="" disabled selected>Selecciona una categoría</option>
                    <option value="titular">Titular</option>
                    <option value="reserva">Reserva</option>
                    <option value="probador">Probador</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-1" />
            </div>

            <div>
                <x-input-label for="nombre" value="Nombre" />
                <x-text-input id="nombre" name="nombre" class="block w-full" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-1" />
            </div>

            <div>
                <x-input-label for="apellido" value="Apellidos" />
                <x-text-input id="apellido" name="apellido" class="block w-full" />
                <x-input-error :messages="$errors->get('apellido')" class="mt-1" />
            </div>

            <div>
                <x-input-label for="nacionalidad" value="Nacionalidad" />
                <x-text-input id="nacionalidad" name="nacionalidad" class="block w-full" />
                <x-input-error :messages="$errors->get('nacionalidad')" class="mt-1" />
            </div>

            <div>
                <x-input-label for="nacimiento" value="Fecha de nacimiento" />
                <x-text-input id="nacimiento" name="nacimiento" type="date" class="block w-full" />
                <x-input-error :messages="$errors->get('nacimiento')" class="mt-1" />
            </div>

            <div x-show="status === 'probador'">
                <x-input-label for="area" value="Area" />
                <x-text-input name="area" class="block w-full" />
                <x-input-error :messages="$errors->get('area')" class="mt-1" />
            </div>

            <div class="pt-4">
                <x-primary-button class="w-full justify-center">Guardar nuevo piloto</x-primary-button>
            </div>

        </form>
    </div>
</x-app-layout>
