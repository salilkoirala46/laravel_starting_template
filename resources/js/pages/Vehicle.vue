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
                                            <th>Task</th>
                                            <th>Progress</th>
                                            <th style="width: 40px">Label</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Update software</td>
                                            <td>
                                                <div
                                                    class="progress progress-xs"
                                                >
                                                    <div
                                                        class="progress-bar progress-bar-danger"
                                                        style="width: 55%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger"
                                                    >55%</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Clean database</td>
                                            <td>
                                                <div
                                                    class="progress progress-xs"
                                                >
                                                    <div
                                                        class="progress-bar bg-warning"
                                                        style="width: 70%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning"
                                                    >70%</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Cron job running</td>
                                            <td>
                                                <div
                                                    class="progress progress-xs progress-striped active"
                                                >
                                                    <div
                                                        class="progress-bar bg-primary"
                                                        style="width: 30%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary"
                                                    >30%</span
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Fix and squish bugs</td>
                                            <td>
                                                <div
                                                    class="progress progress-xs progress-striped active"
                                                >
                                                    <div
                                                        class="progress-bar bg-success"
                                                        style="width: 90%"
                                                    ></div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success"
                                                    >90%</span
                                                >
                                            </td>
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
    methods: {
        addCar() {
            this.$router.push({ name: "vehicles.add" });
        },
    },
};
</script>

<style>
.addcar {
    max-width: 200px;
}
</style>
