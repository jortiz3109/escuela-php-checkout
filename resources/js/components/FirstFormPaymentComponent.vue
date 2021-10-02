<template>
    <div>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-3 bg-white col-span-8 shadow rounded-md overflow-hidden py-3 px-5">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-3">
                        <img src="http://escuela_php_checkout.test/comercio1/images/logo.jpg" alt="Imagen no disponible">
                    </div>
                    <div class="col-span-3 self-center">
                        <h1 class="text-2xl">BOSI</h1>
                    </div>
                    <div class="col-span-3 self-center">
                        <h1 class="text-2xl">Tiempor restante de sesión {{expiratedDate}}</h1>
                    </div>
                </div>
            </div>
            <div class="row-start-2 col-start-3 bg-white col-span-5 px-3 py-2 shadow rounded-md overflow-hidden">
                <input-default 
                    :name="'email'"
                    :id="'email'"
                    :placeholder="'email@host.com'"
                    :type="'email'"
                    :label="'Email'"
                    ></input-default>
                
                <!-- <div class="relative pt-4">
                    <label for="name" class="text-base leading-7 text-blueGray-500">Input Date</label>
                    <input type="date" id="date" name="date" placeholder="name" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div> -->
                <div class="relative mt-4">
                    <label for="name" class="text-base leading-7 text-blueGray-500"><slot name="documentType">Document Type</slot> :</label>
                    <select class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        <option>CC.</option>
                        <option>Nit</option>
                        <option>Rut</option>
                    </select>
                </div>
                <input-default 
                    :name="'document'"
                    :id="'document'"
                    :placeholder="'1100223344'"
                    :type="'text'"
                    :label="'Identification Document'"
                    ></input-default>
                <input-default 
                    :name="'name'"
                    :id="'name'"
                    :placeholder="'Steve'"
                    :type="'text'"
                    :label="'Names'"
                    ></input-default>
                <input-default 
                    :name="'lastName'"
                    :id="'lastName'"
                    :placeholder="'Jobs'"
                    :type="'text'"
                    :label="'Last Name'"
                    ></input-default>
                <input-default 
                    :name="'phoneNumber'"
                    :id="'phoneNumber'"
                    :placeholder="''"
                    :type="'text'"
                    :label="'Phone Number'"
                    ></input-default>
                
                <div class="flex items-center w-full pt-4 mb-4">
                    <button @click.prevent="nextStep" class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 "> <slot name="continue">Continue</slot> </button>
                </div>
            </div>
            <div class="row-start-2 col-start-8 bg-white col-span-3 shadow rounded self-start">
                <div class="bg-blue-800 p-3 rounded-t">
                    <p class="text-white">
                        <slot name="totalToPay">Total to pay</slot>
                    </p>
                    <p class="text-5xl text-white">
                        10000 COP
                    </p>
                </div>
                <hr/>
                <div class="p-3">
                    <p class="">
                        <slot name="reference">Reference</slot>
                    </p>
                    <p class="text-4xl">
                        56s4d75f2s4554
                    </p>
                </div>
                <hr/>
                <div class="p-3">
                    <p class="">
                        <slot name="description">Description</slot>
                    </p>
                    <p class="text-4xl">
                        Pago básico de prueba
                    </p>
                </div>
                <hr/>
                <div class="p-3">
                    <p class="">
                        <slot name="date">Date</slot>
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
import Input from "./fields/Input.vue"
export default {
    components:
    {
        "input-default": Input
    },
    props:{
        currentStep: Number,
        expireDate:
        {
            type: String
        }
    },
    data()
    {
        return {
            expiratedDate: ""
        }
    },
    created()
    {

    },
    mounted() {
        let expireDate = this.expireDate
        if(expireDate == undefined)
        {
            expireDate = Vue.moment().add(20, 's').format("YYYY-MM-DD HH:mm:ss")
        }

        let interval = setInterval(() => {
            let now = Vue.moment()
            let ms = Vue.moment(now.format("YYYY-MM-DD HH:mm:ss"),"YYYY-MM-DD HH:mm:ss").diff(Vue.moment(expireDate, "YYYY-MM-DD HH:mm:ss"))
            this.expiratedDate = now.add(ms, 'ms').format("HH:mm:ss")
            
            if(ms == 0)
            {
                clearInterval(interval)
            }
            
        },1000)
    },
    methods:
    {
        nextStep()
        {
            let step = this.currentStep
            step++
            this.$emit("nextStep", step)
        }
    }
}
</script>