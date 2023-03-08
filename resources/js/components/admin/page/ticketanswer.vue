<template>
    <div class="px-5 border-top py-5">


        <div class="h4 d-flex align-item-center mb-5">
            Answered Ticket
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
                <v-spacer></v-spacer>
                <v-pagination density="compact" v-model="pagination.current" :total-visible="7" :length="pagination.total"
                    @next="next()" @prev="prev" @update:modelValue="handlePageChange"></v-pagination>
            </v-card-title>
            <v-card-text>

                <table class="table table">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">subject</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="ticket in Ticket.data">
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="row">{{ ticket.name }}</th>
                            <th scope="row">{{ ticket.email }}</th>
                            <th scope="row">{{ ticket.subject }}</th>
                            <th scope="row">
                                <span v-if="ticket.status == 'A'" selected>Answered</span>
                                <span v-else-if="ticket.status == 'C'" selected>Closed</span>
                                <span v-else>Pending</span>
                            </th>
                            <th scope="row">
                                <button class="btn-sm btn btn-danger mr-2" @click="deletItme(ticket.id)"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                <button class="btn-sm btn btn-info " @click="viewItem(ticket.id)"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </th>

                        </tr>

                    </tbody>
                </table>
            </v-card-text>
        </v-card>

        <v-snackbar v-model="snackbar">
            {{ snackbartext }}
        </v-snackbar>


    </div>
</template>

<script>
export default {
    data: () => ({


        Ticket: [],
        searchkey: '',
        pagination: {
            current: 1,
            total: 0
        },

        snackbar: false,
        snackbartext: null,

    }),
    methods: {
        handlePageChange() {
            this.getAllTicket();
        },
        next() {
            this.getAllTicket();
        },
        prev() {
            this.getAllTicket();
        },

        getAllTicket() {
            axios.get('/api/getAllTicket?status=a&page=' + this.pagination.current).then((response) => {
                console.log(response.data);
                this.Ticket = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        filterdata() {
            this.getAllTicket();
        },

        onChange(ticketid, event) {

            var dataString = {
                ticketid: ticketid,
                status: event.target.value,
            }

            axios.post('/api/updateTickettatus', dataString).then((response) => {
                if (response.data == 1) {
                    this.snackbar = true;
                    this.snackbartext = 'KYC status has been updated..';
                }
            })
        },
        deletItme(ticketid) {
            if (confirm('Are you sure want to delete??')) {
                var dataString = {
                    ticketid: ticketid,
                }
                axios.post('/api/deleteticket', dataString).then((response) => {
                    if (response.data == 1) {
                        this.getAllTicket()
                        this.snackbar = true;
                        this.snackbartext = 'deleted...';
                    }
                })
            }
        },
        viewItem(ticketid) {
            this.$router.push('/console/ticket/' + ticketid);
        }


    },
    created() {
        this.getAllTicket()
    }
}
</script>