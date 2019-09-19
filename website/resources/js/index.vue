<template>
  <div id="app">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
      integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
      crossorigin="anonymous"
    />
    <div class="navbarr">
      <div class="navbar__header">
        <router-link tag="div" to="/">
          <img v-on:click="closeMunu()" src="./assets/logo.png" />
        </router-link>
        <div class="header__menu-icons">
          <i v-if="!hide" id="search_button" v-on:click="toggleSearchMenu()" class="fas fa-search"></i>
          <i id="menu_button" v-on:click="toggleMunu()" class="fas fa-sliders-h"></i>
        </div>
      </div>
      <div class="navbar__menu" :class="{munushow: toggleMunuBool}">
        <p class="menu__describtion">
          <b>UniWhats</b> is the home of student's whatsapp groups. Currently serving Saudi Universites only
        </p>
        <ul class="menu__links">
          <router-link tag="li" to="/login">
            <span v-on:click="toggleMunu()">Login</span>
          </router-link>
          <router-link tag="li" to="/signup">
            <span v-on:click="toggleMunu()">Sign up</span>
          </router-link>
        </ul>
      </div>
      <div v-if="!hide" class="navbar__search" :class="{searchshow: !toggleSearchBool}">
        <div v-if="!hide"
          class="search__search-by-name"
          :class="{hidenavbar: hidenav,searchfixed: !toggleSearchBool, searchdown: toggleMunuBool, searchbynamenoopacity: !showNavbar} "
        >
          <input placeholder="Course Name" v-model="searchKey" />
          <i class="fas fa-search"></i>
        </div>
        <div class="search__search-parameters">
          <select>
            <option v-for="major in majors" v-bind:key="major">{{major}}</option>
          </select>

          <select>
            <option>Major</option>
            <option>315</option>
            <option>202</option>
            <option>103</option>
          </select>
        </div>
      </div>
    </div>

    <router-view />
  </div>
</template>

<script>
// import JsonDummyData from "../json/JsonDatabase.json";
import { bus } from "./app";
export default {
  name: "app",
  data: function() {
    return {
      toggleMunuBool: false,
      toggleSearchBool: true,
      majors: [
        "ACCT",
        "ECON",
        "FIN",
        "AE",
        "ARE",
        "ARC",
        "CE",
        "CEM",
        "EM",
        "CHE",
        "CHEM",
        "COE",
        "CP",
        "CPR",
        "ENVS",
        "GEOL",
        "GEOP",
        "EE",
        "SEN",
        "ENGL",
        "MIS",
        "CM",
        "GS",
        "IAS",
        "ICS",
        "SWE",
        "BOL",
        "MS",
        "Math",
        "STAT",
        "ME",
        "HRM",
        "MGT",
        "MKT",
        "PETE",
        "PHYS",
        "PYP",
        "CISE"
      ],
      searchKey: "",
      showNavbar: true,
      hidenav: true
    };
  },
  methods: {
    closeMunu: function() {
      this.toggleMunuBool = false;
    },
    toggleMunu: function() {
      this.toggleMunuBool = !this.toggleMunuBool;
    },
    toggleSearchMenu: function() {
      this.toggleSearchBool = !this.toggleSearchBool;
    },
    onScroll () {
      // Get the current scroll position
      const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop
      // Because of momentum scrolling on mobiles, we shouldn't continue if it is less than zero
      if (currentScrollPosition < 0) {
        return
      }
      // Here we determine whether we need to show or hide the navbar
      this.showNavbar = currentScrollPosition == 0
      // Set the current scroll position as the last scroll position
      // this.lastScrollPosition = currentScrollPosition
    }
  },
  computed: {
    hide () {
      return this.$route.path === '/login' || this.$route.path === '/signup';

    }
  },
  watch: {
    searchKey: function(v) {
      bus.$emit("newSearchKey", this.searchKey);
    },
    $route: function() {
    // Check if given route is true, if it is then hide Nav.
    if (this.$route.path === "/login") {
          this.hidenav = false;
        } else  {
          this.hidenav = true;
    }
  }
  },
  mounted () {
    window.addEventListener('scroll', this.onScroll)
  },
  beforeDestroy () {
    window.removeEventListener('scroll', this.onScroll)
  }
};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");
#app {
  font-family: "Montserrat", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  position: relative;
  font-family: "Montserrat", sans-serif;
}
#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}

/* Header Styles */
.navbarr {
  display: flex;
  flex-direction: column;
  background-color: #00bfa5;
  justify-content: space-between;
  box-shadow: 0px 3px 17px 0px rgb(202, 202, 202);
  padding: 25px;
}

.navbarr img {
  width: 60px;
}

.navbar__header {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  height: 30px;
}

.navbar__munu-icons {
  height: 30px;
}

.header__menu-icons i {
  color: #fff;
  padding-left: 25px;
  font-size: 22.5px;
  line-height: 30px;
}

.navbar__menu {
  height: 0px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  color: #fff;
  transition: all 350ms ease-in-out;
  z-index: 102121;
  position: relative;
}

.munushow {
  height: 35vh;
}

.menu__describtion {
  text-align: start;
  padding: 20px 0px;
  font-size: 18px;
  line-height: 26px;
}

.menu__links {
  padding: 0;
  text-align: center;
  color: white;
  font-weight: 800;
  font-size: 20px;
}

.menu__links li {
  list-style-type: none;
  margin: 0;
  padding: 0;
  margin-bottom: 10px;
}

.navbar__search {
  height: 0;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  align-items: center;
  padding-top: 0;
  transition: all 350ms ease-in-out;
  padding-bottom: 20px;
}

.searchshow {
  height: 150px;
  padding-top: 25px;
  padding-bottom: 25;
}

.search__search-by-name,
.search__search-parameters {
  display: flex;
  flex-direction: row;
  justify-content: center;
  margin: 0 auto;
  padding: 10px;
  width: 70vw;
  height: 26px;
  background-color: rgb(255, 255, 255);
  border-radius: 80px;
  font-size: 15px;
  box-shadow: 0px 3px 17px 0px rgba(148, 148, 148, 0.123);
}

.search__search-parameters {
  background-color: rgba(255, 255, 255, 0.671);
  box-shadow: none;
}

.search__search-by-name {
  opacity: 1;
  transition: all 350ms ease-in-out;
  position: fixed;
  top: 76px;
  z-index: 1200;
}

.searchfixed {
  z-index: 1200;
  opacity: 1;
  top: calc(100px);
}

.searchdown {
  top: calc(35vh + 75px);
}

.search__search-by-name i {
  line-height: 26px;
  position: relative;
  color: black;
  padding-right: 10px;
}

.search__search-by-name input,
.search__search-parameters select {
  width: 100%;
  background-color: transparent;
  border: none;
  padding-left: 10px;
  outline: none;
}

.search__search-by-name:hover {
  opacity: 1;
}

.search__search-by-name input::placeholder {
  color: rgba(0, 0, 0, 0.596);
  font-weight: 500;
  font-family: Arial;
}

.searchbynamenoopacity {
  opacity: 0.3;
  /* transition: all 350ms ease-in-out; */

}

.hideSearchBar{
  opacity: 0;
}

.collapseNavbarHeader{
  height: 10px;
}
</style>
