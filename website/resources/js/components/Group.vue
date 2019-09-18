<template>
    <div class="group">

        <div class="backcard">
            <div class="circle">
                <p>{{ courseName }}</p>
            </div>
            <p class="course_name">{{ courseName }} {{ courseCode }}<span v-if="sectionNumber"> - {{ sectionNumber }} </span></p>
            <p class="course_instructor">{{ instructorName }}</p>
            <a class="join_button" :href="url">JOIN</a>
            <p class="last_update">Updated Semester {{ semesterNumber }}</p>
        </div>
    </div>
</template>
<script>
export default {
    name: "GroupTemplate",
    props:["courseName", "courseCode", "sectionNumber", "instructorName", "url", "semesterNumber" ]
};
</script>
<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat");

.group{
    margin: 30px;
    background-color: #ECE5DD;
    height: 100px;
    margin-bottom: 35px;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12);
    margin-top: 60px;
    position: relative;
}

.backcard{
    position: relative;
    background-color: #FFF;
    width: 100%;
    height: 80px;
}

.backcard .course_name{
    text-align: left;
    font-weight: 400;
    font-size: 18px;
    font-family: 'Segoe UI';
    padding: 0 75px;
    position: relative;
    top: 17.5px;
    letter-spacing: 0.05555555rem;
}

.backcard .course_instructor{
    text-align: left;
    padding: 5px 75px;
    font-size: 13px;
}

.circle{
    width: 45px;
    height: 45px;
    background-color: #00bfa5;
    border-radius: 50%;
    position: absolute;
    top: 0px;
    left: 15px;
    line-height: 100px;
    margin-top: 17.5px;
}

.circle p{
    font-family: 'Montserrat';
    line-height: 55px;
    text-align: center;
    color: #FFF;
    font-weight: 400;
    font-size: 13px;
    top: -17px;
    left: 8px;
    position: absolute;
}

.course_information{
    font-family: 'Segoe UI';
    line-height: 2px;
    font-size: 12px;
    position: absolute;
    bottom: 0;
    margin-left: 10px;
    font-family: 'Quicksand', sans-serif;

}

.course_information p{
    text-align: left;
}

.join_button{
    text-decoration: none;
    color: rgb(0, 0, 0);
    font-family: 'Montserrat';
    position: absolute;
    right: 20px;
    top: 40.5px;
}

.last_update{
    font-family: 'Segoe UI';
    position: absolute;
    bottom: -30px;
    width: 100%;
    text-align: center;
    color: #AE793C;
    font-size: 12px;
}
</style>
