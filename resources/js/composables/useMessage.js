import { usePage } from "@inertiajs/vue3";
export function useMessages () {
    const hasMessage = () => {
        return usePage().props.flash.message;
    };

    return { hasMessage };
}
