import { computed, isRef } from "vue";
export const useMonthlyPayment = (total, interestRate, duration) => {
    const monthlyPayment = computed(() => {
        const principle = isRef(total) ? total.value:total,
              monthlyInterest = (isRef(interestRate) ? interestRate.value:interestRate) / 100 / 12, 
              numberOfPaymentsMonths = (isRef(duration) ? duration.value:duration) * 12;
        return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentsMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentsMonths) - 1);
    });

    const totalPaid = computed(()  => {
        return (isRef(duration) ? duration.value:duration) * 12 * monthlyPayment.value;
    });

    const totalInterest = computed(() => totalPaid.value - (isRef(total) ? total.value:total));

    return { monthlyPayment, totalPaid, totalInterest };
};