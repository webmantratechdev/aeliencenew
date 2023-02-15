<template>
    <div class="px-5 border-top py-5">
        <v-row>
            <v-col md="3">
                <v-card to="/console/kycmanager" variant="outlined" class="elevation-0">
                    <v-card-text>

                        <h2> {{ parseInt(pending)+ parseInt(missing) + parseInt(approve) }}</h2>
                        All KYC

                    </v-card-text>

                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/kycmanagerpendig" variant="outlined" class="elevation-0">
                    <v-card-text>
                        <h2> {{ pending }}</h2>
                        Pending KYC
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/kycmanagermising" variant="outlined" class="elevation-0">
                    <v-card-text>
                        <h2>{{ missing }}</h2> 
                        Missing KYC
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/kycmanagerapprove" variant="outlined" class="elevation-0">
                    <v-card-text>
                        <h2>{{ approve }} </h2> 
                        Approved KYC
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>
<script>
export default {
    data: () => ({

        pending: 0,
        missing: 0,
        approve: 0,

        pagination: {
            current: 1,
            total: 0
        },
    }),
    methods: {
        getAllUsers() {

            let dataString = [];

            axios.get('/api/getAllUsers?page=' + this.pagination.current + '&kycstatus=M').then((response) => {
                this.pending = response.data.total;
            })
            axios.get('/api/getAllUsers?page=' + this.pagination.current + '&kycstatus=P').then((response) => {
                this.missing = response.data.total;
            })
            axios.get('/api/getAllUsers?page=' + this.pagination.current + '&kycstatus=A').then((response) => {
                this.approve = response.data.total;
            })



        },
    },
    created() {
        this.getAllUsers();
    }

}
</script>