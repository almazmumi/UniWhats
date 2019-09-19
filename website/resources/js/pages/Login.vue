<template>
  <div class="loginPage">
    <h1 class="title">Login</h1>
    <form autocomplete="off" @submit.prevent="login" action method="post" class="loginForm">
      <div class="loginform__email">
        <p class="username_text">Email</p>
        <input type="email" v-model="email" />
        <p class="validation-text"></p>
      </div>
      <div class="loginform__password">
        <p class="username_text">Password</p>
        <input type="password" v-model="password" />
      </div>

      <div class="loginform__submit">
        <button type="submit">Login</button>
      </div>
    </form>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      fname: "",
      lname: "",
      email: "",
      password: "",
      password_confirmation: "",
      nameHasError: false,
      passwordHasError: false,
      emailHasError: false,
    };
  },
  methods: {
    login() {

        console.log("111");
      this.$auth.login({
        data: {
          email: this.email,
          password: this.password,
        },success: function () {
            app.success = true
            this.$router.push({name: 'home'})
          },
          error: function (res) {
            console.log(res.response.data.errors)
            // app.has_error = true
            // app.error = res.response.data.error
            // app.errors = res.response.data.errors || {}
          }
      });
    }
  }
};
</script>
<style >
.loginPage {
  height: 70vh;
  display: flex;
  justify-content: center;
  flex-direction: column;
  position: relative;
  margin: auto;
  margin-top: 50px;
}

.loginForm {
  /* margin: 0 3rem; */
  width: 70%;
  margin: 10px auto;
  position: relative;
}
.loginform__username,
.loginform__password,
.loginform__confirm-password,
.loginform__email {
  margin: 0 0px;
  margin-top: 12px;
}
.loginform__username input,
.loginform__password input,
.loginform__confirm-password input,
.loginform__email input {
  padding: 9px 14px;
  background-color: #f8f8f8;
  border: 1.5px solid rgb(250, 250, 250);
  border-radius: 5px;
  font-size: 16px;
  outline: none;
  box-shadow: 10px 6px 27px -23px rgba(0, 0, 0, 0.911);
  box-sizing: border-box;
  width: 100%;
}

.loginform__username input:focus,
.loginform__password input:focus,
.loginform__confirm-password input:focus,
.loginform__email input:focus {
  border: 2px solid #77d7c988;
}


.title {
  margin: 0;
  margin-bottom: 30px;
  font-weight: 800;
  z-index: -1;
}

/* =================================== */
.username_text {
  margin: 0;
  text-align: left;
}

.loginform__submit {
  margin: 30px;
}

.loginform__submit button {
  margin-top: 10px;
  border-radius: 5px;
  display: inline-block;
  font-size: 15px;
  font-weight: 500;
  letter-spacing: 0.071em;
  line-height: 10px;
  padding: 18px 32px;
  text-transform: uppercase;
  white-space: nowrap;
  background-color: #1cb39b;
  border: 2px solid #ffffff;
  color: #ffffff;
}


</style>
