<template>
  <div class="signupPage">
    <h1 class="title">Sign up</h1>
    <form autocomplete="off" @submit.prevent="register" action method="post" class="signupForm">
      <div class="signupform__username">
        <p class="username_text">First Name</p>
        <input type="text" v-model="fname" />
      </div>
      <div class="signupform__username">
        <p class="username_text">Last Name</p>
        <input type="text" v-model="lname" />
        <p class="validation-text" v-text="nameValidation"></p>
      </div>
      <div class="signupform__password">
        <p class="username_text">Password</p>
        <input type="password" v-model="password" />
        <p class="validation-text" v-text="passwordValidation"></p>
      </div>
      <div class="signupform__confirm-password">
        <p class="username_text">Confirm Password</p>
        <input type="password" v-model="password_confirmation" />
        <p class="validation-text" v-text="confirmPasswordValidation"></p>
      </div>
      <div class="signupform__email">
        <p class="username_text">Email</p>
        <input type="email" v-model="email" />
        <p class="validation-text" v-text="emailValidation"></p>
      </div>
      <div class="signupform__submit">
        <button :disabled="!submitDisable" type="submit">Sign up</button>
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
  created: function() {},
  computed: {
    nameValidation: function() {
      if ((this.fname.length < 3 && this.fname.length != 0) || (this.lname.length < 3 && this.lname.length != 0)) {
        this.nameHasError = false;
        return "fname or lname should be greater than 3 chars.";
      } else if (this.fname.length == 0 || this.lname.length == 0) {
        this.nameHasError = false;
      } else {
        this.nameHasError = true;
      }
    },
    passwordValidation: function() {
      if (this.password.length < 3 && this.password.length != 0) {
        this.passwordHasError = false;
        return "Password should be greater than 3 chars.";
      } else if (this.password.length == 0) {
        this.passwordHasError = false;
      } else {
        this.passwordHasError = true;
      }
    },
    confirmPasswordValidation: function() {
      if (this.password != this.password_confirmation) {
        this.passwordHasError = false;
        return "it doesn't match the password";
      } else {
        this.passwordHasError = true;
      }
    },
    emailValidation: function() {
      if (!this.email.toLowerCase().includes("@kfupm.edu.sa") && this.email.length != 0) {
        this.passwordHasError = false;
        return "Register with your university email!";
      } else {
        this.passwordHasError = true;
      }
    },
    submitDisable: function(){
        return this.nameHasError && this.passwordHasError;
    }
  },
  methods: {
    register() {
      this.$auth.register({
        data: {
          fname: this.fname,
          lname: this.lname,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
          role: 1
        },success: function () {
            app.success = true;
            this.$router.push({name: 'login'});
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
.signupPage {
  height: 70vh;
  display: flex;
  justify-content: center;
  flex-direction: column;
  position: relative;
  margin: auto;
  margin-top: 50px;
}

.signupForm {
  /* margin: 0 3rem; */
  width: 70%;
  margin: 10px auto;
  position: relative;
}
.signupform__username,
.signupform__password,
.signupform__confirm-password,
.signupform__email {
  margin: 0 0px;
  margin-top: 12px;
}
.signupform__username input,
.signupform__password input,
.signupform__confirm-password input,
.signupform__email input {
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

.signupform__username input:focus,
.signupform__password input:focus,
.signupform__confirm-password input:focus,
.signupform__email input:focus {
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

.signupform__submit {
  margin: 30px;
}

.signupform__submit button {
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

.validation-text {
  font-size: 14px;
  text-align: left;
  color: red;
}
</style>
