<template>
    <div class="px-5 border-top py-5">
        <v-row>
            <v-col cols="12">Ticket #{{ ticketdata.id }}</v-col>
            <v-col cols="12">

                <p><span>Issue: </span>{{ ticketdata.name }}</p>
                <p><span>Email:</span> {{ ticketdata.email }}</p>
                <p><span>Subject:</span> {{ ticketdata.subject }}</p>
                <p><span>Message:</span></p>
                <div class="message" v-html="ticketdata.mesage"></div>

            </v-col>
            <v-col cols="12">
                <hr>
                <div class="">
                    <editor :init="{ height: 500 }" v-model="reply" />
                </div>
            </v-col>
            <v-col cols="4">
                <v-select :items="statusOp" variant="outlined" v-model="status" hide-details=""> </v-select>
            </v-col>
            <v-col cols="12">
                <v-btn @click="replyticket" color="orange" :loading="loaders" variat="large">Submit</v-btn>
            </v-col>

        </v-row>


        <v-snackbar v-model="snacker">
			{{ snackertext }}
		</v-snackbar>

    </div>


</template>
<script>

import Editor from '@tinymce/tinymce-vue'

export default {
    components: {
        'editor': Editor
    },
    data: () => ({
        ticketdata: [],

        reply: null,
        status: null,
        statusOp: [
            { value: 'A', title: 'Answered' },
            { value: 'P', title: 'Pending' },
            { value: 'C', title: 'Closed' },
        ],

        loaders: false,

        snacker: false,
		snackertext: null,

    }),
    methods: {

        replyticket() {

            this.loaders = true;
            var dataString = {
                ticketid: this.ticketdata.id,
                email: this.ticketdata.email,
                message: this.reply,
                status: this.status,

            }

            axios.post('/api/replyticket', dataString).then((response) => {
                if (response.data == 1) {
                    this.message = null;
                    this.loaders = false;

                    this.snacker = true;
					this.snackertext = 'Ticket submited..';
                }

            })

            this.loader = false;
        },
        getsingleticket() {

            var ticketid = this.$route.params.ticketid;

            axios.get('/api/getsingleticket/' + ticketid).then((response) => {

                this.ticketdata = response.data;
                this.status = response.data.status;



            })

        }
    },
    created() {
        this.getsingleticket();
    }
}
</script>