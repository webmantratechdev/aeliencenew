<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center">
            Closed Ticket
            <v-spacer></v-spacer>
            <div style="max-width:300px;display: flex;">
                <input type="text" class="form-control" placeholder="Your Email" v-model="searchkey">
                <div class="input-group-append">
                    <button class="input-group-text" @click="filterdata">Find</button>
                </div>
            </div>
        </div>


        <table class="table table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">subject</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="ticket in Ticket.data">
                    <th scope="row">{{ ticket.name }}</th>
                    <th scope="row">{{ ticket.email }}</th>
                    <th scope="row">{{ ticket.subject }}</th>
                    <th scope="row">
                            <span v-if="ticket.status == 'A'" selected>Answered</span>
                            <span  v-else-if="ticket.status == 'C'" selected>Closed</span>
                            <span v-else>Pending</span>
                    </th>
                    <th scope="row">
                        <button class="btn-sm btn btn-danger mr-2" @click="deletItme(ticket.id)"><i class="fa fa-trash-o"
                                aria-hidden="true"></i></button>
                        <button class="btn-sm btn btn-info " @click="viewItem(ticket.id)"><i class="fa fa-pencil"
                                aria-hidden="true"></i></button>
                    </th>

                </tr>

            </tbody>
        </table>

        <v-pagination v-model="pagination.current" :total-visible="7" :length="pagination.total" @next="next()"
            @prev="prev" @update:modelValue="handlePageChange"></v-pagination>


        <v-snackbar v-model="snackbar">
            {{ snackbartext }}
        </v-snackbar>


    </div>
</template>

<script>
export default {
    data: () => ({


        headers: [
          {
            title: 'Dessert (100g serving)',
            align: 'start',
            sortable: false,
            key: 'name',
          },
          { title: 'Calories', align: 'end', key: 'calories' },
          { title: 'Fat (g)', align: 'end', key: 'fat' },
          { title: 'Carbs (g)', align: 'end', key: 'carbs' },
          { title: 'Protein (g)', align: 'end', key: 'protein' },
          { title: 'Iron (%)', align: 'end', key: 'iron' },
        ],

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
            axios.get('/api/getAllTicket?status=c&page=' + this.pagination.current).then((response) => {
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