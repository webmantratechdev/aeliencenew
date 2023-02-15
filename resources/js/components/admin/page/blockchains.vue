<template>
    <div class="px-5 border-top py-5">
        <v-row>
            <v-col cols="12">
                <p>Blockchains</p>
            </v-col>
        </v-row>
        <v-table>
            <thead>
                <tr>
                    <th class="text-left">
                        Name
                    </th>
                    <th class="text-left">
                        Status
                    </th>
                    <th class="text-left">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in desserts" :key="item.name">
                    <td>{{ item.name }}({{ item.chain }})</td>
                    <td>
                        <v-switch color="orange" :model-value="true" v-if="item.status == 1" label="on"></v-switch>
                        <v-switch  :model-value="false" v-else label="on"></v-switch>
                    </td>
                    <td>
                       <v-btn small color="#333" dark style="color:#fff; margin-right:10px;">Wallet</v-btn>
                       <v-btn small color="#333" dark style="color:#fff; margin-right:10px;">Token</v-btn>
                    </td>
                </tr>
            </tbody>
        </v-table>

    </div>
</template>

<script>
export default {
    data: () => ({

        desserts: [],

    }),
    methods: {
        getAllnetwork() {
            axios.get('/api/getAllnetwork').then((response) => {
                this.desserts = response.data;
            })
        }
    },
    created() {
        this.getAllnetwork();
    }
}
</script>   