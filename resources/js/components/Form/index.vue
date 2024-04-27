<script setup>
import { Form } from 'vee-validate';
import { reactive } from 'vue';
const form = reactive({
    name: '',
    gender: '',
    phone: '',
    email: '',
    address: '',
    nationality: '',
    dateOfBirth: '',
    educationBackground: '',
    contactMode: ''
})
// onMounted(() => {

// }),
</script>

<template>
    <div class="content bg-white m-2">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Form
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <Form enctype="multipart/form-data" @submit="handleSubmit" v-slot:default="{ errors }">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }" id="name" placeholder="Enter Name" autocapitalize="on" autocomplete="name">
                                                <span class="invalid-feedback">{{ errors.name }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Email</label>
                                                <input v-model="form.email" type="text" class="form-control" :class="{ 'is-invalid': errors.email }" id="email" placeholder="Enter Email" autocomplete="email">
                                                <span class="invalid-feedback">{{ errors.email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input v-model="form.phone" type="text" class="form-control" :class="{ 'is-invalid': errors.phone }" id="phone" placeholder="Enter phone" autocapitalize="on" autocomplete="phone">
                                                <span class="invalid-feedback">{{ errors.phone }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">gender</label>
                                                <input v-model="form.gender" type="text" class="form-control" :class="{ 'is-invalid': errors.gender }" id="gender" placeholder="Enter gender" autocomplete="gender">
                                                <span class="invalid-feedback">{{ errors.gender }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input v-model="form.address" type="text" class="form-control" :class="{ 'is-invalid': errors.address }" id="address" placeholder="Enter address" autocapitalize="on" autocomplete="address">
                                                <span class="invalid-feedback">{{ errors.address }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Nationality</label>
                                                <input v-model="form.nationality" type="text" class="form-control" :class="{ 'is-invalid': errors.nationality }" id="nationality" placeholder="Enter nationality" autocomplete="nationality">
                                                <span class="invalid-feedback">{{ errors.nationality }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Date Of Birth</label>
                                                <input v-model="form.date_of_birth" type="date" class="form-control" :class="{ 'is-invalid': errors.date_of_birth }" id="date_of_birth" placeholder="Enter date_of_birth" autocapitalize="on" autocomplete="date_of_birth">
                                                <span class="invalid-feedback">{{ errors.date_of_birth }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Education Background</label>
                                                <input v-model="form.educationBackground" type="text" class="form-control" :class="{ 'is-invalid': errors.educationBackground }" id="educationBackground" placeholder="Enter educationBackground" autocomplete="educationBackground">
                                                <span class="invalid-feedback">{{ errors.educationBackground }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </Form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>


</template>
