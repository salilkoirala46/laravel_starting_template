<template>
    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List of Cars</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">List of Cars</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button
                                    @click="addCar"
                                    class="btn btn-info btn-sm"
                                >
                                    Add Vehicle
                                </button>
                            </div>

                            <div class="card-body">
                                <table
                                    class="table table-bordered table-hover table-striped"
                                >
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Fuel Type</th>
                                            <th>Body Type</th>
                                            <th>Variant</th>
                                            <th>Make</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="cars.length > 0">
                                        <tr
                                            v-for="(car, index) in cars"
                                            :key="car.id"
                                        >
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ car.type }}</td>
                                            <td>{{ car.model }}</td>
                                            <td>{{ car.year }}</td>
                                            <td>{{ car["fuel-type"] }}</td>
                                            <td>{{ car["body-type"] }}</td>
                                            <td>{{ car["variant-t"] }}</td>
                                            <td>{{ car.make }}</td>
                                            <td class="text-center">
                                                <img
                                                    v-if="car.imagePath"
                                                    :src="`/storage/${car.imagePath}`"
                                                    alt="Car Image"
                                                    class="car-image"
                                                />
                                                <span v-else>No Image</span>
                                            </td>
                                            <td class="text-center">
                                                <router-link
                                                    :to="{
                                                        name: 'vehicles.edit',
                                                        params: { id: car.id },
                                                    }"
                                                    class="btn btn-sm btn-primary"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </router-link>
                                                <button
                                                    @click="
                                                        deleteCarById(car.id)
                                                    "
                                                    class="btn btn-sm btn-danger"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td
                                                colspan="10"
                                                class="text-center"
                                            >
                                                No vehicles found
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div
                                v-if="totalRecords > 0"
                                class="card-footer clearfix"
                            >
                                <ul
                                    class="pagination pagination-sm m-0 float-right"
                                >
                                    <li
                                        class="page-item"
                                        v-if="currentPage > 1"
                                        @click="changePage(currentPage - 1)"
                                    >
                                        <a class="page-link" href="#">«</a>
                                    </li>
                                    <li
                                        class="page-item"
                                        v-for="page in totalPage"
                                        :key="page"
                                        :class="{
                                            active: page === currentPage,
                                        }"
                                    >
                                        <a
                                            class="page-link"
                                            @click="changePage(page)"
                                            >{{ page }}</a
                                        >
                                    </li>
                                    <li
                                        class="page-item"
                                        v-if="currentPage < totalPage"
                                        @click="changePage(currentPage + 1)"
                                    >
                                        <a class="page-link" href="#">»</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cars: [],
            page: 1,
            per_page: 15,
            totalRecords: 0, // this is needed to hide and unhide pagination if there are no records
            currentPage: 0, //this  is needed to create previous and next button
            totalPage: 0, //this is needed to create number of hyperlinks in pagees
        };
    },
    mounted() {
        this.getCars();
    },
    methods: {
        addCar() {
            this.$router.push({ name: "vehicles.add" });
        },
        changePage(page) {
            this.page = page;
            this.getCars();
            console.log(page);
        },
        async deleteCarById(id) {
            const result = await this.$swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            });

            if (result.isConfirmed) {
                console.log("delete this car with id :" + id);
                await this.$axios
                    .delete("/cars/" + id)
                    .then((response) => {
                        this.$swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success",
                        });

                        this.getCars();
                    })
                    .catch((error) => {
                        console.error("Failed to delete record", error);
                    });
            }
        },
        async getCars() {
            await this.$axios
                .get("cars", {
                    params: {
                        page: this.page,
                        per_page: this.per_page,
                    },
                })
                .then((response) => {
                    this.cars = response.data.data;
                    this.totalRecords = response.data.total;
                    this.currentPage = response.data.current_page;
                    this.totalPage = response.data.last_page;
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                    this.cars = [];
                });
        },
    },
};
</script>

<style>
.table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
}

.table-hover tbody tr:hover {
    background-color: #f2f2f2;
}

.car-image {
    max-width: 80px;
    max-height: 80px;
    object-fit: cover;
    border-radius: 5px;
}

thead.thead-dark th {
    background-color: #343a40;
    color: white;
}

.btn-sm {
    margin: 0 2px;
}
</style>
