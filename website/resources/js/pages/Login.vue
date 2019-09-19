<template>
    <div class="loginpage">
        <h1 class="title">Login</h1>
        <form action="" method="post" class="loginForm">
            <div class="loginform__username">
                <input type="text" placeholder="Username">
            </div>
            <div class="loginform__password">
                <input type="password" placeholder="Password">
            </div>
            <div class="loginform__submit">

                <button type="submit">
                    Login
                </button>


            </div>

        </form>
    </div>

</template>

<style>
    .loginpage{
        height: 60vh;
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: relative;
        margin:auto;
        margin-top:50px;
    }
    .loginform__username, .loginform__password{
        margin: 30px;
    }
    .loginform__username input, .loginform__password input{
        width: 80%;
        padding:14px;
        border: 1.5px solid rgb(250, 250, 250);
        border-radius: 15px;
        font-size: 16px;
        outline: none;
        box-shadow: 10px 6px 27px -23px rgba(0,0,0,0.75);
    }

    .loginform__username input:focus, .loginform__password input:focus{
        border: 2px solid #77d7c988
    }
    .title{
        margin: 0;
        margin-bottom: 10px;
    }

    .loginform__submit{
        margin: 30px;

    }

    .loginform__submit button{
        margin-top: 10px;
        width: 50%;
        border-radius: 40px;
        display: inline-block;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: .071em;
        line-height: 10px;
        padding: 18px 32px;
        text-transform: uppercase;
        white-space: nowrap;
        background-color: #fff;
        border: 2px solid #77d7c8;
        color: #1cb39b;
    }

</style>
