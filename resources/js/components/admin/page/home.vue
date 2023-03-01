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
            <v-col md="3">
                <v-card to="/console/customtoken" variant="outlined" class="elevation-0">
                    <v-card-text>
                        <h2>{{ aeltokenTrx }} </h2> 
                        TRX Energy Balance
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/stakinglogs" variant="outlined" class="elevation-0">
                    <v-card-text>
                        <h2>{{ totalstacking }} <small>( {{ totalstackingAmount }} AEL)</small></h2> 
                        Total Stacking
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/deposit" variant="outlined" class="elevation-0">
                    <v-card-text>
                        <h2>{{ totalDeposit }} <small>( {{ totalDepositAmount }} AEL)</small></h2> 
                        Total Deposit
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
        totalstacking:0,
        totalstackingAmount:0,
        aeltokenTrx:0,

        totalDeposit: 0,
        totalDepositAmount: 0,

        pagination: {
            current: 1,
            total: 0
        },

    }),
    methods: {
        getAllUsers() {

            let dataString = [];

            axios.get('/api/getAllUsers?page=' + this.pagination.current + '&kycstatus=M').then((response) => {
                
                this.missing = response.data.total;
            })
            axios.get('/api/getAllUsers?page=' + this.pagination.current + '&kycstatus=P').then((response) => {
                this.pending = response.data.total;
            })
            axios.get('/api/getAllUsers?page=' + this.pagination.current + '&kycstatus=A').then((response) => {
                this.approve = response.data.total;
            })

            axios.get('/api/getStackingLog?page=' + this.pagination.current).then((response) => {
                this.totalstacking = response.data.total;
            })
            axios.get('/api/getTotalStackAmount').then((response) => {
                this.totalstackingAmount = response.data;
            })
            axios.get('/api/get_custom_tokens?page=' + this.pagination.current).then((response) => {
                this.aeltokenTrx = response.data.data[0].master_wallet_balance
            })
            
            axios.get('/api/getAllDeposit?page=' + this.pagination.current+'&keyword=').then((response) => {
                this.totalDeposit = response.data.total;
            })
            axios.get('/api/getTotalDepositAmount').then((response) => {
                this.totalDepositAmount = response.data;
            })

        },
    },
    created() {
        this.getAllUsers();
    }

}
</script>