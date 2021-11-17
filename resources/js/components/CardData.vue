<template>
    <div class="flex justify-center w-full">
        <div class="flex flex-col gap-2">
            <div><h1 class="font-black text-gray-600 text-xl">Card Information</h1></div>
            <div><custom-input placeholder="0000 0000 0000 0000"/></div>
            <div class="flex gap-2">
                <custom-input placeholder="MM/YY" />
                <custom-input placeholder="CVV" />
            </div>
        </div>
    </div>
</template>

<script>
import CustomInput from './CustomInput'
export default {
    name: 'CardData',
    components: { CustomInput },
}
</script>
