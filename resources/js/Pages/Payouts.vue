<template>
    <v-table>
        <thead>
            <tr>
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
                <td>Показать реквизиты</td>
                <td>{{ payout.amount }}</td>
                <td>{{ payout.currency }}</td>
                <td>{{ payout.status }}</td>
            </tr>
        </tbody>
    </v-table>
</template>

<script setup>
    defineProps({
        payouts: Array
    })
</script>