<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import ListingAddress from '@/Components/ListingAddress.vue';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import Box from '@/Components/UI/Box.vue';
    import Price from '@/Components/UI/Price.vue';
    const props = defineProps({
        listing: Object
    });

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
                    :currency="`USD`"
                    country="en-US"
                    class="text-2xl font-bold"/>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-gray-500"/>
            </Box>
            <Box>
                <template #header>
                    Offer
                </template>
                Make an offer
            </Box>
        </div>
    </div>
</template>