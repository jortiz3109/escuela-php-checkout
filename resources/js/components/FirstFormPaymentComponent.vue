<template>
    <div>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-3 bg-white col-span-8 shadow rounded-md overflow-hidden py-3 px-5">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-3">
                        <img src="" alt="no disponible">
                    </div>
                    <div class="col-span-3">
                        <h1>nombre comercio</h1>
                    </div>
                </div>
            </div>
            <div class="row-start-2 col-start-3 bg-white col-span-5 px-3 py-2 shadow rounded-md overflow-hidden">
                <div class="relative pt-4">
                    <label for="email" class="text-base leading-7 text-blueGray-500">Email: </label>
                    <input type="email" id="email" name="email" placeholder="email@host.com" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                <!-- <div class="relative pt-4">
                    <label for="name" class="text-base leading-7 text-blueGray-500">Input Date</label>
                    <input type="date" id="date" name="date" placeholder="name" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div> -->
                <div class="relative mt-4">
                    <label for="name" class="text-base leading-7 text-blueGray-500">Tipo de documento</label>
                    <select class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        <option>CC.</option>
                        <option>Nit</option>
                        <option>Rut</option>
                    </select>
                </div>
                <div class="relative pt-4">
                    <label for="document" class="text-base leading-7 text-blueGray-500">Documento Identidad: </label>
                    <input type="text" id="document" name="document" placeholder="123465789" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                <div class="relative pt-4">
                    <label for="name" class="text-base leading-7 text-blueGray-500">Nombres: </label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                <div class="relative pt-4">
                    <label for="lastName" class="text-base leading-7 text-blueGray-500">Apellidos: </label>
                    <input type="text" id="lastName" name="lastName" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                <div class="relative pt-4">
                    <label for="phoneNumber" class="text-base leading-7 text-blueGray-500">Número de teléfono: </label>
                    <input type="text" id="phoneNumber" name="phoneNumber" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                <div class="flex items-center w-full pt-4 mb-4">
                    <button class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 "> Continuar </button>
                </div>
            </div>
            <div class="row-start-2 col-start-8 bg-white col-span-3 shadow rounded self-start">
                <div class="bg-blue-800 p-3 rounded-t">
                    <p class="text-white">
                        Total a pagar
                    </p>
                    <p class="text-5xl text-white">
                        10000 COP
                    </p>
                </div>
                <hr/>
                <div class="p-3">
                    <p class="">
                        Referencia
                    </p>
                    <p class="text-4xl">
                        56s4d75f2s4554
                    </p>
                </div>
                <hr/>
                <div class="p-3">
                    <p class="">
                        Descripción
                    </p>
                    <p class="text-4xl">
                        Pago básico de prueba
                    </p>
                </div>
                <hr/>
                <div class="p-3">
                    <p class="">
                        Fecha
                    </p>
                    <p class="text-4xl">
                        2021-09-25 17:13:11
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data()
    {
        return {}
    },
    created()
    {

    },
    mounted() {
        console.log('Component mounted.')
    },
    methods:
    {
        
    }
}
</script>