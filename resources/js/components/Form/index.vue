<script setup>
import { Form } from 'vee-validate';
import { reactive, onMounted, ref } from 'vue';
import axios from 'axios';

const successMessageVisible = ref(false);
const countries = ref([]);
const educations = ref([]);

const form = reactive({
    name: '',
    gender: '',
    phone: '',
    email: '',
    address: '',
    nationality: '',
    date_of_birth: '',
    education_background: '',
    contact_mode: ''
});

const handleSubmit = async (values, actions) => {
    try {
        await axios.post('/api/form/store', form);
        // Reset the form
        Object.keys(form).forEach(key => form[key] = '');
        successMessageVisible.value = true;
    } catch (error) {
        actions.setErrors(error.response.data.errors);
    }
}

const getCountries = async () => {
    try {
        const response = await axios.get('/api/form/get-countries');
        countries.value = response.data;
    } catch (error) {
        console.error('Error fetching countries:', error);
    }
}

const getEducationOption = async () => {
    try {
        const response = await axios.get('/api/form/get-education');
        educations.value = response.data;
    } catch (error) {
        console.error('Error fetching education options:', error);
    }
}
const getFormData = async () => {
    try {
        const response = await axios.get('/api/form/get-form-data');
        const csvContent = convertToCSV(response.data);
        downloadCSV(csvContent);
    } catch (error) {
        console.error('Error fetching form data:', error);
    }
}

const convertToCSV = (data) => {
    console.log(data.result);
    const headers = Object.keys(data.result[0]);

    const rows = data.result.map(obj => {
        return headers.map(header => obj[header] || ''); // Handle null or undefined values
    });

    const csvRows = [headers.join(','), ...rows.map(row => row.join(','))];

    return csvRows.join('\n');
}

const downloadCSV = (csvContent) => {
    console.log(csvContent);
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8' });
    const url = window.URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', 'form_data.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};

onMounted(async () => {
    await getCountries();
    await getEducationOption();
})
</script>




<style scoped>
.hidden {
    display: none;
}
.heading{
    background-color: blueviolet;
}
</style>

<template>
    <div class="content bg-white m-2">
        <h1 :class="{ hidden: !successMessageVisible }" class="heading text-success text-2xl">Data Added Successfully</h1>

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
                            <li class="breadcrumb-item"><a @click="getFormData" class="btn btn-success"> Download CSV </a></li>
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
                                                <input v-model="form.name" type="text" class="form-control"
                                                    :class="{ 'is-invalid': errors.name }" id="name"
                                                    placeholder="Enter Name" autocapitalize="on" autocomplete="name">
                                                <span class="invalid-feedback">{{ errors.name }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Email</label>
                                                <input v-model="form.email" type="text" class="form-control"
                                                    :class="{ 'is-invalid': errors.email }" id="email"
                                                    placeholder="Enter Email" autocomplete="email">
                                                <span class="invalid-feedback">{{ errors.email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input v-model="form.phone" type="text" class="form-control"
                                                    :class="{ 'is-invalid': errors.phone }" id="phone"
                                                    placeholder="Enter phone" autocapitalize="on" autocomplete="phone">
                                                <span class="invalid-feedback">{{ errors.phone }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select v-model="form.gender" class="form-control"
                                                    :class="{ 'is-invalid': errors.gender }" id="gender"
                                                    placeholder="Enter gender" autocomplete="gender">
                                                    <option value="">Select One</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                <span class="invalid-feedback">{{ errors.gender }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input v-model="form.address" type="text" class="form-control"
                                                    :class="{ 'is-invalid': errors.address }" id="address"
                                                    placeholder="Enter address" autocapitalize="on"
                                                    autocomplete="address">
                                                <span class="invalid-feedback">{{ errors.address }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Nationality</label>
                                                <select v-model="form.nationality" class="form-control"
                                                    :class="{ 'is-invalid': errors.nationality }" id="nationality"
                                                    placeholder="Enter nationality" autocomplete="nationality">
                                                    <option v-for="country in countries.result" :value="country.name">
                                                        {{ country.name }}
                                                    </option>
                                                </select>
                                                <span class="invalid-feedback">{{ errors.nationality }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Date Of Birth</label>
                                                <input v-model="form.date_of_birth" type="date" class="form-control"
                                                    :class="{ 'is-invalid': errors.date_of_birth }" id="date_of_birth"
                                                    placeholder="Enter date_of_birth" autocapitalize="on"
                                                    autocomplete="date_of_birth">
                                                <span class="invalid-feedback">{{ errors.date_of_birth }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Education Background</label>
                                                <select v-model="form.education_background"
                                                    :class="{ 'is-invalid': errors.education_background }" class="form-control">
                                                    <option value="">Select One</option>
                                                    <option v-for="education in educations.result"
                                                        :value="education.id">
                                                        {{ education.name }}
                                                    </option>
                                                </select>
                                                <span class="invalid-feedback">{{ errors.education_background }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date_of_birth">Preferred Mode of Contact</label>
                                                <select v-model="form.contact_mode" class="form-control"
                                                    :class="{ 'is-invalid': errors.contact_mode }" id="contact_mode"
                                                    placeholder="Enter contact_mode" autocapitalize="on"
                                                    autocomplete="contact_mode">
                                                    <option value="">Select One</option>
                                                    <option value="email">Email</option>
                                                    <option value="phone">Phone</option>
                                                </select>
                                                <span class="invalid-feedback">{{ errors.contact_mode }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </Form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</template>
