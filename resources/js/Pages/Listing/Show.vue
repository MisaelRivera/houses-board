<script setup>
    import { ref } from 'vue';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import ListingAddress from '@/Components/ListingAddress.vue';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import Box from '@/Components/UI/Box.vue';
    import Price from '@/Components/UI/Price.vue';
    import { useMonthlyPayment } from '@/composables/useMonthlyPayment';
import { list } from 'postcss';
    const props = defineProps({
        listing: Object
    });
    
    const interestRate = ref(2.5),
          duration = ref(25);
    
    const { monthlyPayment, totalPaid , totalInterest } = useMonthlyPayment(props.listing.price, interestRate, duration);
</script>
<script>
    export default {
        layout: MainLayout
    }
</script>
<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">
                No images
            </div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic info
                </template>
                <Price 
                    :price="listing.price"
                    class="text-2xl font-bold"/>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray-500"/>
            </Box>
            <Box>
                <template #header>
                    Monthly payment
                </template>
                <div>
                    <label class="label">Interest rate ({{ `${interestRate}%` }})</label>
                    <input 
                        type="range" 
                        min="0.1" 
                        max="30" 
                        step="0.1"
                        v-model.number="interestRate"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    
                    <label class="label">Duration ({{ duration }} years)</label>
                    <input 
                        type="range" 
                        min="3" 
                        max="35" 
                        step="1"
                        v-model.number="duration"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">

                    <div class="text-gray-600 dark:text-gray-300 mt-2">
                        <div class="text-gray-400">Your monthly payment</div>
                        <Price 
                            :price="monthlyPayment" 
                            class="text-3xl" />
                    </div>
                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div>Total Paid </div>
                            <Price
                                :price="totalPaid"
                                class="font-medium"/>
                        </div>
                        <div class="flex justify-between">
                            <div>Principal Paid </div>
                            <Price
                                :price="listing.price"
                                class="font-medium"/>
                        </div>
                        <div class="flex justify-between">
                            <div>Interest Paid </div>
                            <Price
                                :price="totalInterest"
                                class="font-medium"/>
                        </div>
                    </div>
                </div>
            </Box>
        </div>
    </div>
</template>