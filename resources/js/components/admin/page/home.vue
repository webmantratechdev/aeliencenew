<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
            Dashboard
            <v-spacer></v-spacer>
            <v-btn color="grey-darken-4" dark class="elevation-0">Report</v-btn>
        </div>

        <v-row>

            <v-col md="3">
                <v-card to="/console/kycmanager" class="elevation-0">
                    <v-card-text>
                        <h2> {{ userAll }}</h2>
                        All KYC
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col md="3">
                <v-card to="/console/kycmanagerpendig" class="elevation-0">
                    <v-card-text>
                        <h2> {{ userPending }}</h2>
                        Pending KYC
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/kycmanagermising" class="elevation-0">
                    <v-card-text>
                        <h2>{{ userMissing }}</h2>
                        Missing KYC
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/kycmanagerapprove" class="elevation-0">
                    <v-card-text>
                        <h2>{{ userApprove }} </h2>
                        Approved KYC
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col md="12">
                AEL ( TRON )
            </v-col>

            <v-col md="3">
                <v-card to="/console/stakinglogs" class="elevation-0">
                    <v-card-text>
                        <h2>{{ aeltotalstacking }} <small style="font-size: 14px;">( {{ aelstackingAmount }} AEL)</small>
                        </h2>
                        Total Stacking
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col md="3">
                <v-card to="/console/deposit" class="elevation-0">
                    <v-card-text>
                        <h2>{{ aeltotaldeposit }} <small style="font-size: 14px;">( {{ aeltotaldepositAmount }} AEL)</small>
                        </h2>
                        Total Deposit
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/customtoken" class="elevation-0">
                    <v-card-text>
                        <h2>{{ aeltokenTrx }} </h2> 
                        TRX Energy Balance
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/usernostacking"  class="elevation-0">
                    <v-card-text>
                        <h2>{{ usernostacking }}</h2> 
                        No Stack Users
                    </v-card-text>
                </v-card>
            </v-col>


            <v-col md="12">
                Aelince ( BSC )
            </v-col>

            <v-col md="3">
                <v-card to="/console/stakinglogs" class="elevation-0">
                    <v-card-text>
                        <h2>{{ aelincetotalstacking }} <small style="font-size: 14px;">( {{ aelincestackingAmount }} Aelince)</small>
                        </h2>
                        Total Stacking
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col md="3">
                <v-card to="/console/customtoken" class="elevation-0">
                    <v-card-text>
                        <h2>{{ aelincebsctoken }} </h2> 
                        BNB Energy Balance
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col md="3">
                <v-card to="/console/customtoken" class="elevation-0">
                    <v-card-text>
                        <h2>{{ aelincetotaldeposit }} <small style="font-size: 14px;">( {{ aelincedepositusdtAmount }})</small>
                        </h2>
                        Total USDT Deposit
                    </v-card-text>
                </v-card>
            </v-col>

            <v-col md="3">
                <v-card to="/console/customtoken" class="elevation-0">
                    <v-card-text>
                        <h2>{{ aelincedepositholdAmount }}
                        </h2>
                        Aelince Hold Token
                    </v-card-text>
                </v-card>
            </v-col>




        </v-row>

    </div>
</template>
<script>
export default {
    data: () => ({

        userAll: 0,
        userPending: 0,
        userMissing: 0,
        userApprove: 0,

        aeltotalstacking: 0,
        aelstackingAmount: 0,
        aeltotaldeposit: 0,
        aeltotaldepositAmount: 0,

        aelincetotalstacking:0,
        aelincestackingAmount:0,
        aelincetotaldeposit:0,
        aelincetotaldepositAmount:0,


        aeltokenTrx: 0,
        aelincebsctoken: 0,

        aelincedepositusdtAmount: 0,


        aelincedepositholdAmount: 0,

        usernostacking:0,

        pagination: {
            current: 1,
            total: 0
        },
    }),
    methods: {
        getdahsbordoverview() {
            axios.get('/api/getdahsbordoverview').then((response) => {
                this.userAll = response.data.users.alluser;
                this.userPending = response.data.users.pending;
                this.userMissing = response.data.users.missing;
                this.userApprove = response.data.users.approve;


                this.aeltotalstacking = response.data.ael.aeltotalstacking;
                this.aelstackingAmount = response.data.ael.aelstackingAmount;
                this.aeltotaldeposit = response.data.ael.aeltotaldeposit;
                this.aeltotaldepositAmount = response.data.ael.aeltotaldepositAmount;


                this.aelincetotalstacking = response.data.aelince.aelincetotalstacking;
                this.aelincestackingAmount = response.data.aelince.aelincestackingAmount;
                this.aelincetotaldeposit = response.data.aelince.aelincetotaldeposit;
                this.aelincetotaldepositAmount = response.data.aelince.aelincetotaldepositAmount;


                this.aelincedepositusdtAmount = response.data.selling.aelincedepositusdtAmount;
                this.aelincedepositholdAmount = response.data.selling.aelincedepositholdAmount;

                console.log(response.data);

            })
            axios.get('/api/get_custom_tokens?page=' + this.pagination.current).then((response) => {
                this.aeltokenTrx = response.data.data[0].master_wallet_balance
                this.aelincebsctoken = response.data.data[2].master_wallet_balance
            })

            axios.get('/api/usernostacking?page=' + this.pagination.current).then((response) => {
                this.usernostacking = response.data.total;
               
            })

        }
    },
    created() {
        this.getdahsbordoverview();
    }

}
</script>