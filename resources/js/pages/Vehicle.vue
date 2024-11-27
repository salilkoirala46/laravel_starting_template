<template>
    <Navbar />
    <Sidebar />
    <div class="content-wrapper" style="min-height: 1302.4px">
        <!-- Content Header (Page header) -->
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
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button
                                    @click="addCar"
                                    class="btn btn-info btn-sm addcar"
                                >
                                    Add Vehicle
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Type</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Fuel Type</th>
                                            <th>Body Type</th>
                                            <th>Variant Type</th>
                                            <th>make</th>
                                            <th style="width: 40px">Image</th>
                                            <th style="width: 40px">Actions</th>
                                        </tr>
                                    </thead>
                                    <!-- Execute this body if there is item -->
                                    <tbody v-if="cars.length > 0">
                                        <tr
                                            v-for="(car, key) in cars"
                                            :key="key"
                                        >
                                            <td>{{ car.id }}</td>
                                            <td>{{ car.type }}</td>
                                            <td>{{ car.model }}</td>
                                            <td>{{ car.year }}</td>
                                            <td>{{ car["fuel-type"] }}</td>
                                            <td>{{ car["body-type"] }}</td>
                                            <td>{{ car["variant-t"] }}</td>
                                            <td>{{ car.make }}</td>
                                            <td>
                                                <img
                                                    v-if="car.imagePath != ''"
                                                    :src="
                                                        '/storage/' +
                                                        car.imagePath
                                                    "
                                                    alt="Car Image"
                                                    width="100"
                                                    height="100"
                                                />
                                            </td>
                                            <td>
                                                <router-link
                                                    :to="{
                                                        name: 'vehicles.edit',
                                                        params: { id: car.id },
                                                    }"
                                                    class="buttonSpacing editButton"
                                                    ><i class="fas fa-edit"></i
                                                ></router-link>
                                                <button
                                                    @click="
                                                        deleteCarById(car.id)
                                                    "
                                                    type="button"
                                                    class="deleteButton"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- Execute this body if no item -->
                                    <tbody v-if="cars.length <= 0">
                                        <tr>
                                            <td colspan="5">No items found</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div
                                class="card-footer clearfix"
                                v-if="totalRecords > 0"
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
                                        key="page"
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
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <Footer />
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
            console.log("delete this car with id :" + id);
            await this.$axios
                .delete("/cars/" + id)
                .then((response) => {
                    console.log("Car deleted successfully");
                    this.getCars();
                })
                .catch((error) => {
                    console.error("Failed to delete record", error);
                });
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
                    // this.cars = [];
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
.addcar {
    max-width: 200px;
}

.buttonSpacing {
    padding-right: 5px;
}
.editButton {
    color: #28a745;
}
.deleteButton {
    color: #dc3545;
}
</style>
