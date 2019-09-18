<template>
    <div class="signuppage">
        <h1 class="title">Sign up</h1>
        <form action="" method="post" class="signupForm">
            <div ref="nfffffo" class="signupform__username">
                <input type="text" placeholder="Username">
            </div>
            <div class="signupform__password">
                <input type="password" placeholder="Password">
            </div>
            <div class="signupform__confirm-password">
                <input type="password" placeholder="Confirm Password">
            </div>
            <div class="signupform__email">
                <input type="text" placeholder="Email">
            </div>
            <div class="signupform__submit">

                <button type="submit">
                    Sign up
                </button>


            </div>

        </form>
    </div>

</template>


<script>
export default {
    data: function() {
        return {
            helllo: null
        }
    },
    created: function(){

    }
}
</script>
<style >

    .signuppage{
        height: 70vh;
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: relative;
        margin:auto;
        margin-top:50px;
    }
    .signupform__username, .signupform__password, .signupform__confirm-password, .signupform__email{
        margin: 30px;
    }
    .signupform__username input, .signupform__password input, .signupform__confirm-password input, .signupform__email input{
        width: 80%;
        padding:14px;
        border: 1.5px solid rgb(250, 250, 250);
        border-radius: 15px;
        font-size: 16px;
        outline: none;
        box-shadow: 10px 6px 27px -23px rgba(0,0,0,0.75);
    }

    .signupform__username input:focus, .signupform__password input:focus, .signupform__confirm-password input:focus, .signupform__email input:focus{
        border: 2px solid #77d7c988
    }
    .title{
        margin: 0;
        margin-bottom: 10px;
    }

    .signupform__submit{
        margin: 30px;

    }

    .signupform__submit button{
        margin-top: 10px;
        width: 50%;
        border-radius: 5px;
        display: inline-block;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: .071em;
        line-height: 10px;
        padding: 18px 32px;
        text-transform: uppercase;
        white-space: nowrap;
        background-color: #1cb39b;
        border: 2px solid #ffffff;
        color: #ffffff;
    }

</style>
