<template>
    <div class="w-10/12 mx-auto rounded overflow-hidden px-5 py-3 bg-gray">
        <div class="max-w-3xl mx-auto my-4 border-b-2 pb-4">
            <div class="flex pb-3">
                <div class="flex-1">
                </div>

                <div class="flex-1">
                    <div 
                        :class="{'step-circle':true, 'step-inactive': currentSteps.indexOf('ownerData') == -1, 'step-active': currentSteps.indexOf('ownerData') != -1}">
                        <span :class="{'step-text-circle':true, 'step-text-inactive': currentSteps.indexOf('ownerData') == -1, 'step-text-active': currentSteps.indexOf('ownerData') != -1 }">1</span>
                    </div>
                </div>


                <div class="step-line-parent">
                    <div :class="{'step-line-child1': true, 'step-inactive': currentSteps.indexOf('paymentMethod') == -1, 'step-active': currentSteps.indexOf('paymentMethod') != -1}">
                        <div class="step-line-child2"></div>
                    </div>
                </div>

                
                <div class="flex-1">
                    <div :class="{'step-circle':true, 'step-inactive':currentSteps.indexOf('paymentMethod') == -1, 'step-active':currentSteps.indexOf('paymentMethod') != -1}">
                        <span :class="{'step-text-circle':true, 'step-text-inactive': currentSteps.indexOf('paymentMethod') == -1, 'step-text-active': currentSteps.indexOf('paymentMethod') != -1 }">2</span>
                    </div>
                </div>

                <div class="step-line-parent">
                    <div :class="{'step-line-child1': true, 'step-inactive': currentSteps.indexOf('payment') == -1, 'step-active': currentSteps.indexOf('payment') != -1}">
                        <div class="step-line-child2"></div>
                    </div>
                </div>

                <div class="flex-1">
                    <div :class="{'step-circle':true, 'step-inactive':currentSteps.indexOf('payment') == -1, 'step-active':currentSteps.indexOf('payment') != -1}">
                        <span :class="{'step-text-circle':true, 'step-text-inactive': currentSteps.indexOf('payment') == -1, 'step-text-active': currentSteps.indexOf('payment') != -1 }">3</span>
                    </div>
                </div>


                <div class="step-line-parent">
                    <div :class="{'step-line-child1': true, 'step-inactive': currentSteps.indexOf('result') == -1, 'step-active': currentSteps.indexOf('result') != -1}">
                        <div class="step-line-child2"></div>
                    </div>
                </div>


                <div class="flex-1">
                    <div :class="{'step-circle':true, 'step-inactive':currentSteps.indexOf('result') == -1, 'step-active':currentSteps.indexOf('result') != -1}">
                        <span :class="{'step-text-circle':true, 'step-text-inactive': currentSteps.indexOf('result') == -1, 'step-text-active': currentSteps.indexOf('result') != -1 }">4</span>
                    </div>
                </div>


                <div class="flex-1">
                </div>		
            </div>

            <div class="flex text-s content-center text-center">
                <div class="w-3/4">
                    1 <slot name="ownerData">Owner data</slot>
                </div>
                
                <div class="w-3/4">
                    2 <slot name="paymentMethod">Payment method</slot>
                </div>
                
                <div class="w-3/4">
                    3 <slot name="payment">Payment</slot>
                </div>
                
                <div class="w-3/4">
                    4 <slot name="result">Result</slot>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        currentSteps: Array
    },
    data()
    {
        return {

        }
    },
    created()
    {

    },
    mounted() {
        
    },
    methods:
    {
        
    }
}
</script>