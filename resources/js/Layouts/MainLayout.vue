<script setup>
    import { Link } from '@inertiajs/vue3';
    import { useMessages  } from '@/composables/useMessage';
    const { hasMessage } = useMessages();
</script>
<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.index')">LaraZillow</Link>
                </div>
                <div>
                    <Link 
                        :href="route('listing.create')"
                        class="btn-primary">
                        + New Listing
                    </Link>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4">
        <div v-if="hasMessage()" class="py-2 px-4 rounded-md bg-green-400 text-white mb-4">
            {{ hasMessage() }}
        </div>
        <slot></slot>
    </main>
</template>