<template>
    <div class="register-page">
        <div class="register-box">
            <div class="register-logo">
                <router-link to="/"><b>Car</b>Sales</router-link>
            </div>
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Create account</p>
                    <form @submit.prevent="register" method="post">
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Full name"
                                v-model="name"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </div>
                            </div>
                        </div>
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
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Retype password"
                                v-model="c_password"
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
                                    <input
                                        type="checkbox"
                                        id="agreeTerms"
                                        name="terms"
                                        value="agree"
                                    />
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    <router-link to="/login" class="text-center"
                        >Sign in here if you already have account</router-link
                    >
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            c_password: "",
        };
    },
    methods: {
        async register() {
            try {
                const response = await this.$axios.post("/register", {
                    //$axios variable is set in app.js  which utilises axios.js
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    c_password: this.c_password,
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
.register-page {
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
</style>
