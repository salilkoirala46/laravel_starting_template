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
                                                    to="/"
                                                    class="fas fa-edit buttonSpacing editButton"
                                                ></router-link>
                                                <router-link
                                                    to="/"
                                                    class="fas fa-trash deleteButton"
                                                >
                                                </router-link>
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
                            <div class="card-footer clearfix">
                                <ul
                                    class="pagination pagination-sm m-0 float-right"
                                >
                                    <li class="page-item">
                                        <a class="page-link" href="#">«</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
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
        };
    },
    mounted() {
        this.getCars();
    },
    methods: {
        addCar() {
            this.$router.push({ name: "vehicles.add" });
        },
        async getCars() {
            await this.$axios
                .get("cars")
                .then((response) => {
                    console.log(response.data);
                    console.log(response.data.map((car) => car["variant-t"]));
                    this.cars = response.data;
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
