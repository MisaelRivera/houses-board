<script setup>
    import { Link, router } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import ListingAddress from '@/Components/ListingAddress.vue';
    import { useMessages } from '@/composables/useMessage';
    import Box from '@/Components/UI/Box.vue';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import Price from '@/Components/UI/Price.vue';
    const { hasMessage } = useMessages();

    const props = defineProps({
        message: String,
        listings: Object
    });
    const handleDeleteListing = (listing) => {
        router.delete(`/listing/${listing.id}`);
    };
</script>
<script>
    export default {
        layout: MainLayout
    }
</script>
<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Box v-for="listing in listings" :key="listing.id">
            <div>
                <Link :href="route('listing.show', {listing})">
                    <Price 
                        :price="listing.price"
                        :currency="`USD`"
                        country="en-US"
                        class="text-2xl font-bold"/>
                    <ListingSpace :listing="listing" class="text-lg"/>
                    <ListingAddress :listing="listing" class="text-gray-500"/>
                </Link>
            </div>
            <div>
                <Link 
                    :href="route('listing.edit', { listing: listing.id })">
                    Editar
                </Link>
            </div>
            <div>
                <Link 
                    :href="route('listing.destroy', { listing: listing.id })" method="DELETE">
                    Delete
                </Link>
            </div>
        </Box>
    </div>
</template>