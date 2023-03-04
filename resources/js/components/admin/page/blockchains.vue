<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
            Block Chain
            <v-spacer></v-spacer>
            <v-btn color="grey-darken-4" dark class="elevation-0">Create New</v-btn>
        </div>

        <v-card class="mb-5 elevation-0">
            <v-card-text>
                <v-row>
                    <v-col cols="12" md="6">
                        <v-text-field prepend-inner-icon="mdi-magnify" density="compact"
                            placeholder="What are you looking for?" variant="outlined" hide-details=""
                            v-model="searchkey"></v-text-field>
                    </v-col>
                    <v-col cols="12" md="2">
                        <v-text-field density="compact" placeholder="Status" variant="outlined"
                            hide-details=""></v-text-field>
                    </v-col>
                    <v-col cols="12" md="2">
                        <v-text-field density="compact" variant="outlined" hide-details="" type="date"></v-text-field>
                    </v-col>

                    <v-col cols="12" md="2"><v-btn color="grey-darken-4" class="elevation-0" @click="filterdata"
                            block>Search</v-btn></v-col>
                </v-row>
            </v-card-text>
        </v-card>

        <v-card class="elevation-0">
            <v-card-title class="d-flex align-center">
                <p>Records</p>
            </v-card-title>
            <v-card-text>
                <v-table>
                    <thead>
                        <tr>
                            <th class="text-left">
                                Name
                            </th>
                            <th class="text-left" style="text-align: right;">
                                Status
                            </th>
                            <th class="text-right" style="text-align: right;">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in desserts" :key="item.name">
                            <td>{{ item.name }}({{ item.chain }})</td>
                            <td style="text-align: right;">
                                <v-switch color="orange" :model-value="true" v-if="item.status == 1" label="on"></v-switch>
                                <v-switch :model-value="false" v-else label="on"></v-switch>
                            </td >
                            <td style="text-align: right;">
                                <v-btn small color="#333" dark style="color:#fff; margin-right:10px;">Wallet</v-btn>
                                <v-btn small color="#333" dark style="color:#fff; margin-right:10px;">Token</v-btn>
                            </td>
                        </tr>
                    </tbody>
                </v-table>
            </v-card-text>
        </v-card>

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