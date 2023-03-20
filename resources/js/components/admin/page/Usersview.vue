<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
            Personal Information
        </div>
        <div class="row">
            <v-col cols="12">
                <v-card class="elevation-0">
                    <v-card-text class="px-15 py-15">
                        <v-row>
                            <div class="col-8">
                                <h3>Personal Information</h3>
                                <div class="row">
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-group">
                                            <label class="mb-2">Name</label>
                                            <input type="text" name="" class="form-control" id="" v-model="name">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 mb-2">
                                        <div class="form-group">
                                            <label class="mb-2">Email</label>
                                            <input type="text" name="" class="form-control" id="" v-model="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-group">
                                            <label class="mb-2">Phone</label>
                                            <input type="text" name="" class="form-control" id="" v-model="phone">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label class="mb-2">Address</label>
                                            <textarea type="text" name="" class="form-control" id="" v-model="address"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-group">
                                            <label class="mb-2">Country :( {{ country }} )</label>
                                            <select class="form-control" v-model="country" @change="changeCountry($event)">
                                                <option>Select Country</option>
                                                <option v-for="countrys in countryOp" :value="countrys.phonecode"> {{
                                                    countrys.name
                                                }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-group">
                                            <label class="mb-2">State: ({{ state }})</label>
                                            <select class="form-control" v-model="state" @change="changeState($event)">
                                                <option value="" selected>Select State</option>
                                                <option v-for="state in stateOp" :value="state.id">
                                                    {{ state.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <div class="form-group">
                                            <label class="mb-2">City :({{ city }})</label>
                                            <select class="form-control" v-model="city">
                                                <option value="" selected>Select City</option>
                                                <option v-for="city in cityOp" :value="city.name">
                                                    {{ city.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 mb-2">
                                        <div class="form-group">
                                            <label class="mb-2">Zip</label>
                                            <input type="text" name="" class="form-control" id="" v-model="zip">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 px-15">
                                <div class="row">
                                    <div class="col-12 py-3">
                                        <h3>Govid</h3>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Govt. ID (Front Side)</label>

                                            <div class="img_upload_area">
                                                <div class="box">
                                                    <div class="js--image-preview"
                                                        :style="'background-image: url(/upload/' + aadhar_front + ');'">
                                                    </div>
                                                    <div class="upload-options">
                                                        <label>
                                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                                            <input type="file" name="aadhar_front" class="image-upload"
                                                                accept="image/*" capture="camera" required
                                                                v-on:change="frontonFileChange">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Govt. ID (Back Side)</label>
                                            <div class="img_upload_area">
                                                <div class="box">
                                                    <div class="js--image-preview"
                                                        :style="'background-image: url(/upload/' + aadhar_back + ');'">
                                                    </div>
                                                    <div class="upload-options">
                                                        <label>
                                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                                            <input type="file" name="aadhar_back" class="image-upload"
                                                                accept="image/*" capture="camera" required
                                                                v-on:change="backonFileChange">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">

                                        <div class="form-group">
                                            <label>Photo</label>
                                            <div class="img_upload_area">
                                                <div class="box">
                                                    <div class="js--image-preview"
                                                        :style="'background-image: url(/upload/' + profile + ');'">
                                                    </div>
                                                    <div class="upload-options">
                                                        <label>
                                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                                            <input type="file" name="aadhar_back" class="image-upload"
                                                                accept="image/*" capture="camera" required
                                                                v-on:change="uploadProfile">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 mt-5">
                                <div class="form-group">
                                    <h3>KYC Status</h3>
                                    <select class="form-select" aria-label="Default select example" v-model="status">
                                        <option value="A" v-if="status == 'A'" selected>Approve</option>
                                        <option value="A" v-else>Approve</option>
                                        <option value="M" v-if="status == 'M'" selected>Missing</option>
                                        <option value="M" v-else>Missing</option>
                                        <option value="P" v-if="status == 'P'" selected>Pending</option>
                                        <option value="P" v-else>Pending</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <button class="btn btn-outline-warning" @click="updateprofilebyadmin">Update
                                    Profile</button>
                            </div>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col cols="12">
                <div class="h4 d-flex align-item-center mb-5">
                    MLM 
                </div>
            </v-col>
            <div class="col-12">
                <v-card class="elevation-0">
                    <v-card-text class="py-15">
                        <TreeChart :json="treeData"></TreeChart>
                    </v-card-text>
                </v-card>
            </div>
        </div>

        <v-snackbar v-model="snackbar">
            {{ snackbartext }}
        </v-snackbar>

    </div>
</template>
<script>

import TreeChart from "vue-tree-chart-3";

export default {
    components: {
        TreeChart
    },
    data: () => ({

        countryOp: [],
        stateOp: [],
        cityOp: [],

        name: null,
        email: null,
        phone: null,
        address: null,
        city: null,
        country: null,
        zip: null,
        state: null,
        aadhar_front: null,
        aadhar_back: null,
        profile: null,
        status: null,

        snackbar: false,
        snackbartext: null,

        treeData:
        {
            name: 'root',
            image_url: "/images/uploadImage.jpg",
            children: []
        }
        ,
    }),
    methods: {

        gemlmusers() {
            var userid = this.$route.params.userid;
            axios.get('/api/gemlmusers/' + userid).then((response) => {
                this.treeData.children = response.data;
                console.log(response.data);
            })
        },

        getAllcountry() {
            axios.get('/api/getAllcountry').then((response) => {

                this.countryOp = response.data;
            })
        },

        getallStatebycountry(countrycode) {
            if (countrycode) {
                axios.get('/api/getallStatebycountry/' + countrycode).then((response) => {
                    this.stateOp = response.data;
                })
            } else {
                this.stateOp = [];
            }
        },

        getallCitybystate(stateid) {
            if (stateid) {
                axios.get('/api/getallCitybystate/' + stateid).then((response) => {
                    this.cityOp = response.data;
                })
            } else {
                this.cityOp = [];
            }

        },

        changeCountry(event) {
            this.getallStatebycountry(event.target.value);
        },

        changeState(event) {
            this.getallCitybystate(event.target.value);
        },


        updateprofilebyadmin() {
            var userid = this.$route.params.userid;
            var dataString = {
                userid: userid,
                name: this.name,
                email: this.email,
                phone: this.phone,
                address: this.address,
                city: this.city,
                country: this.country,
                zip: this.zip,
                state: this.state,
                aadhar_front: this.aadhar_front,
                aadhar_back: this.aadhar_back,
                profile: this.profile,
                status: this.status,
            }
            axios.post('/api/updateprofilebyadmin', dataString).then((response) => {
                if (response.data == 1) {
                    this.snackbar = true;
                    this.snackbartext = 'Profile updated....';
                } else {
                    this.snackbar = true;
                    this.snackbartext = 'Somthing went wrong...';
                }
            })
        },
        getuserprofile() {
            var userid = this.$route.params.userid;
            axios.post('/api/getProfile', { profileid: userid }).then((response) => {

                this.name = response.data.name
                this.email = response.data.email
                this.phone = response.data.phone
                this.address = response.data.address
                this.city = response.data.city
                this.country = response.data.country
                this.zip = response.data.zip
                this.state = response.data.state

                this.aadhar_front = response.data.aadhar_front
                this.aadhar_back = response.data.aadhar_back
                this.profile = response.data.profile

                this.status = response.data.status
            })
        },
        frontonFileChange(e) {
            let formData = new FormData();
            formData.append('file', e.target.files[0])
            axios.post('/api/uploadDocument', formData).then((response) => {
                this.aadhar_front = response.data;
            })
        },
        backonFileChange(e) {
            let formData = new FormData();
            formData.append('file', e.target.files[0])
            axios.post('/api/uploadDocument', formData).then((response) => {
                this.aadhar_back = response.data;
            })
        },
        uploadProfile(e) {
            let formData = new FormData();
            formData.append('file', e.target.files[0])
            axios.post('/api/uploadDocument', formData).then((response) => {
                this.profile = response.data;
            })
        }

    },
    created() {
        this.getuserprofile();
        this.getAllcountry();
        this.gemlmusers();
    }
}
</script>