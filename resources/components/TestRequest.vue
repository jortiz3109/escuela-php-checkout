<template>
    <div>
        <button @click="test" class="shadow rounded px-2 py-1 bg-yellow-400 text-white font-bold m-4">Test request</button>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "TestRequest",
    setup() {
        const sessionUuid = '8cc1318f-5107-31ac-ae60-de963a5b5f31';
        const test = () => {
            axios.defaults.withCredentials = true;
            axios.defaults.headers['Accept'] = 'application/json';
            axios.get(`http://escuela-php-checkout.test/api/v1/session/${sessionUuid}/payment-methods`)
        }

        return { test }
    }
}
</script>
