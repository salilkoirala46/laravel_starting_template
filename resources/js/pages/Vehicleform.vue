<template>
    <Navbar />
    <Sidebar />
    <div class="content-wrapper" style="min-height: 1604.8px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Vehicle</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Add Vehicle</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Display success message -->
            <!-- <div v-if="successMessage" class="alert alert-success" role="alert">
                {{ successMessage }}
            </div> -->

            <div v-if="showPopup" class="popup-overlay">
                <div class="popup-content">
                    <p>{{ successMessage }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Vehicle Details</h3>
                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-card-widget="collapse"
                                    title="Collapse"
                                >
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <!-- Vehicle Type -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicleType"
                                                >Vehicle Type</label
                                            >
                                            <input
                                                type="text"
                                                id="vehicleType"
                                                class="form-control"
                                                v-model="form.type"
                                                placeholder="e.g., SUV, Sedan, Truck"
                                            />
                                        </div>
                                    </div>
                                    <!-- Vehicle Make -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicleMake"
                                                >Make</label
                                            >
                                            <input
                                                type="text"
                                                id="vehicleMake"
                                                class="form-control"
                                                v-model="form.make"
                                                placeholder="e.g., Toyota, Ford"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Vehicle Model -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicleModel"
                                                >Model</label
                                            >
                                            <input
                                                type="text"
                                                id="vehicleModel"
                                                class="form-control"
                                                v-model="form.model"
                                                placeholder="e.g., Corolla, Mustang"
                                            />
                                        </div>
                                    </div>
                                    <!-- Vehicle Year -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicleYear"
                                                >Year</label
                                            >
                                            <input
                                                type="number"
                                                id="vehicleYear"
                                                class="form-control"
                                                v-model="form.year"
                                                placeholder="e.g., 2023"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Fuel Type -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fuelType"
                                                >Fuel Type</label
                                            >
                                            <select
                                                id="fuelType"
                                                class="form-control custom-select"
                                                v-model="form.fuelType"
                                            >
                                                <option selected disabled>
                                                    Select one
                                                </option>
                                                <option>Diesel</option>
                                                <option>Petrol</option>
                                                <option>Electric</option>
                                                <option>Hybrid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Body Type -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bodyType"
                                                >Body Type</label
                                            >
                                            <input
                                                type="text"
                                                id="bodyType"
                                                class="form-control"
                                                v-model="form.bodyType"
                                                placeholder="e.g., Sedan, Hatchback"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Variant -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputVariant"
                                                >Variant</label
                                            >
                                            <input
                                                type="text"
                                                id="inputVariant"
                                                class="form-control"
                                                v-model="form.variantT"
                                                placeholder="e.g., SE, XLE"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile"
                                                >File input</label
                                            >
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input
                                                        type="file"
                                                        v-on:change="
                                                            onFileChange
                                                        "
                                                        id="exampleInputFile"
                                                    />
                                                    <label
                                                        class="custom-file-label"
                                                        for="exampleInputFile"
                                                        >{{
                                                            fileName ||
                                                            "Choose file"
                                                        }}</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-12">
                                        <button
                                            @click.prevent="handleSave"
                                            type="submit"
                                            class="btn btn-success"
                                        >
                                            <i class="fas fa-check"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <Footer />
</template>

<script>
export default {
    data() {
        return {
            form: {
                type: "",
                make: "",
                model: "",
                year: "",
                fuelType: "",
                bodyType: "",
                variantT: "",
                image: "",
            },
            fileName: "",
            successMessage: "",
            showPopup: false,
            formData: "",
        };
    },
    methods: {
        onFileChange(event) {
            const file = event.target.files[0];

            if (file) {
                this.form.image = file;
                this.fileName = file.name; // Update file name for label
            }
        },
        async handleSave() {
            console.log(this.form);

            this.formData = new FormData();

            for (const key in this.form) {
                this.formData.append(key, this.form[key]);
            }

            try {
                // Send request with FormData
                const response = await this.$axios.post(
                    "/cars",
                    this.formData,
                    {
                        headers: {
                            "Content-Type": "multipart/form-data",
                        },
                    }
                );
                console.log("File uploaded successfully", response.data);
                // this.successMessage = "File uploaded successfully";
                this.showPopup = true;

                setTimeout(() => {
                    this.showPopup = false;
                    this.$router.push({ name: "vehicles" });
                }, 3000);
                // this.resetForm();
            } catch (error) {
                console.error("Failed to submit data:", error);
                this.successMessage = "";
            }
        },
        resetForm() {
            this.formData = new FormData();
            this.form = {
                type: "",
                make: "",
                model: "",
                year: "",
                fuelType: "",
                bodyType: "",
                variantT: "",
                image: "",
            };
        },
    },
};
</script>
