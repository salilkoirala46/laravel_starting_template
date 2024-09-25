<template>
    <div class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <router-link to="/login"><b>Car</b>SALES</router-link>
            </div>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form @submit.prevent="login" method="post">
                        <div class="input-group mb-3">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                v-model="email"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Password"
                                v-model="password"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" />
                                    <label for="remember"> Remember Me </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    Sign In
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="mb-0">
                        <router-link
                            to="/register"
                            class="text-center router-link"
                            >Click here to register</router-link
                        >
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
        };
    },
    methods: {
        async login() {
            try {
                const response = await this.$axios.post("/login", {
                    //$axios variable is set in app.js  which utilises axios.js
                    email: this.email,
                    password: this.password,
                });

                const token = response.data.data.token;
                const userData = response.data.data.user;

                //store in local storage and axios header token
                localStorage.setItem("authToken", token);
                localStorage.setItem("userData", JSON.stringify(userData));
                axios.defaults.headers.common[
                    "Authorization"
                ] = `Bearer ${token}`;

                this.$user.setUser(userData);
                this.$router.push({ name: "dashboard" });
            } catch (error) {
                console.error("Login failed:", error);
                // Handle the error (e.g., show an error message)
            }
        },
    },
};
</script>

<style>
.login-page {
    background-color: #e9ecef;
}
.input-group-text {
    border-radius: 0px;
    border: 1px solid #ced4da;
}
.input-group-append {
    display: flex;
    border-left: 0px;
}
.form-control {
    border-right: 0px;
}
.router-link {
    text-decoration: none;
    background-color: transparent;
    color: #007bff;
}
.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    box-shadow: none;
}
.btn-block {
    display: block;
    width: 100%;
}
.icheck-primary label {
    font-weight: 700;
}
</style>
