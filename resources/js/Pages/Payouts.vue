<template class="tw-bg-amber-50">
    <!-- Container-->
        <div class="tw-m-10 tw-rounded-xl tw-shadow-xl">
            <v-table>
            <thead class="tw-bg-slate-300">
                <tr class="tw-text-xl">
                    <th>#ID</th>
                    <th>Логин</th>
                    <th>Реквизиты</th>
                    <th>Сумма</th>
                    <th>Валюта</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="payout in payouts" :key="payout.id">
                    <td>{{ payout.id }}</td>
                    <td>{{ payout.username }}</td>
                    <td>
                        <a @click="showDetails(payout.details)" class="tw-text-blue-500 tw-underline tw-cursor-pointer">Показать реквизиты</a>
                    </td>
                    <td>{{ payout.amount }}</td>
                    <td>{{ payout.currency }}</td>
                    <td>
                        <v-select
                            class="tw-mt-4"
                            v-model="payout.status"
                            @update:modelValue="val => changeStatus(val, payout.id)"
                            density="compact"
                            :items="['Не оплачен', 'Оплачен']"
                            variant="solo"
                        >
                        </v-select>
                    </td>
                </tr>
            </tbody>
        </v-table>
        </div>
</template>

<script setup>
    import { ref } from 'vue'
    import axios from 'axios'

    defineProps({
        payouts: Array
    })

    function showDetails(details) {
        alert(details)
    }

    function changeStatus(value, id) {
        axios.post(`/api/payouts/${id}/status`, {
            'status': value
        }).then((response) => {
            if (response.status !== 201) {
                alert('Проблема при обновлении статуса')
            }
        })
    }
</script>