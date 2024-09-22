<template>
    <div className="app-wrapper">
        <Navbar />

        <Sidebar />

        <!--begin::App Main-->
        <main className="app-main">
            <Mainheader />

            <div className="app-content">
                <div className="container-fluid"></div>
            </div>
        </main>

        <Footer />
    </div>

    <div>
        <h1>This is dashboard page</h1>

        <button @click="logout">Logout</button>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("User data:", this.$user); // Access the logged-in user's details
    },
    methods: {
        logout() {
            // const response = await this.$axios.post('/logout', { //$axios variable is set in app.js  which utilises axios.js
            //     email : this.email,
            //     password : this.password
            // });
            // Clear the auth token and user data from localStorage
            localStorage.removeItem("authToken");
            localStorage.removeItem("userData");

            // Clear global user data
            this.$user.clearUser();

            // Redirect to login page
            this.$router.push({ name: "login" });
        },
    },
};
</script>
