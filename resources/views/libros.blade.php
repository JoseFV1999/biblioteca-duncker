@extends('principal')


@section('content')
    <div class="relative overflow-x-scroll shadow-lg sm:rounded-lg">

        <div class="flex items-center justify-between py-4 px-5 bg-white dark:bg-gray-900">

            <h2 class="text-3xl font-semibold text-left text-gray-900  dark:text-white ">
                Libros
            </h2>

            <div>
                <button id="createLibroButton" data-modal-toggle="createLibroModal"
                    class="text-sm text-white bg-green-600 border
                    border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium
                    rounded-lg px-3 py-1.5 dark:bg-green-500 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700
                    dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    type="button">
                    Agregar
                </button>

            </div>

        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Código
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Autor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mueble
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Observacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asignatura
                    </th>
                    <th colspan="2" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($libros as $libro)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $libro->id }}
                        </th>
                        <td class="px-6 py-3">
                            {{ $libro->codigo }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $libro->titulo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $libro->autor }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $libro->year }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $libro->mueble }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($libro->observacion === 'C')
                                Copia
                            @else
                                Original
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $libro->asignatura_libro->nombre }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button id="modifyLibroButton" data-modal-toggle="modifyLibroModal{{ $libro->id }}" data-modal-target="modifyLibroModal{{ $libro->id }}"
                                
                                class="text-sm text-white bg-green-600 border
                                border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium
                                rounded-lg px-3 py-1.5 dark:bg-green-500 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700
                                dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                Editar
                            </button>
                        </td>

                        <!-- INICIO DEL MODAL MODIFICAR -->

                        <div id="modifyLibroModal{{ $libro->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div
                                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Modificar Libro
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="updateLibroModal{{ $libro->id }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{ route('updateLibro') }}" method="POST">
                                        @csrf
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                            <input type="hidden" name="id" value="{{ $libro->id }}">
                                            <div>
                                                <label for="codigo_libro"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo</label>
                                                <input type="text" name="codigo_libro" id="name" value="{{ $libro->codigo }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Codigo del libro">
                                            </div>
                                            <div>
                                                <label for="titulo_libro"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                                                <input type="text" name="titulo_libro" id="name" value="{{ $libro->titulo }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Titulo del libro">
                                            </div>
                                            <div>
                                                <label for="autor_libro"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor</label>
                                                <input type="text" name="autor_libro" id="price" value="{{ $libro->autor }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Autor del libro">
                                            </div>
                                            <div>
                                                <label for="year_libro"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año</label>
                                                <input type="number" placeholder="Año del libro" min="1900"
                                                    max="2099" step="1" value="{{ $libro->year }}" name='year_libro'
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Año del libro">
                                            </div>
                                            <div>
                                                <label for="mueble_libro"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mueble</label>
                                                <input type="text" name="mueble_libro" id="price" value="{{ $libro->mueble }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Mueble del libro">
                                            </div>
                                            <div>
                                                <label for="price"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asignatura</label>
                                                <select name="asignatura_libro">
                                                    <option value="" disabled="disabled">--Escoja una asignatura--</option>
                                                    @forelse ($asignaturas as $asignatura)
                                                        @if ($libro->asignatura_id === $asignatura->id)
                                                            <option value="{{ $asignatura->id }}" selected="true">{{ $asignatura->nombre }}</option>
                                                        @else
                                                            <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
                                                        @endif
                                                        
                                                    @empty
                                                        <option value="" disabled="disabled">Sin datos</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div>
                                                <label for="category"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observacion</label>
                                                <select id="category" name="observacion_libro"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="" disabled="disabled" >--Escoja una observacion--</option>
                                                    @if ($libro->observacion === "C")
                                                        <option value="O">Original</option>
                                                        <option value="C" selected="true">Copia</option>
                                                    @else
                                                        <option value="O" selected="true">Original</option>
                                                        <option value="C">Copia</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <button type="submit"
                                                class="text-white bg-green-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                Modificar
                                            </button>
                                            <button type="button" data-modal-hide="createLibroModal" data-modal-toggle="modifyLibroModal{{ $libro->id }}"
                                                class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Cancelar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- FIN DEL MODAL -->

                        <td class="px-6 py-4 text-right">
                            <a href="#" data-modal-target="popup-modal" data-modal-toggle="popup-modal{{ $libro->id }}"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</a>
                        </td>
                        <div id="popup-modal{{ $libro->id }}" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" data-modal-toggle="popup-modal{{ $libro->id }}"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="popup-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form method="POST" action="{{ route('deleteLibro', $libro->id) }}">
                                        @csrf
                                        @method('delete')
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true"
                                                class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estas
                                                seguro de eliminar este libro?</h3>
                                            <button data-modal-hide="popup-modal" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Si, estoy seguro
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button" data-modal-toggle="popup-modal{{ $libro->id }}"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @empty
                    <td class="px-6 py-4">
                        Sin datos
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>



    @include('librosmodal')

    <!-- Main modal -->



@endsection
