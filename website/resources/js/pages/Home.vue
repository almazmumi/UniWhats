<template>
  <div class="home">
    <GroupTemplate
      v-for="group in filteredGroups"
      v-bind:key="group.id"
      :courseName="group.course_name"
      :courseCode="group.course_code"
      :sectionNumber="group.section_number"
      :instructorName="group.instructor_name"
      :url="group.url"
      :semesterNumber="group.semester_number"
    />
    <!-- <pagination :data="ffilteredGroups" @pagination-change-page="getResults" :limit="1"></pagination> -->
  </div>
</template>

<script>
// @ is an alias to /src
import GroupTemplate from "../components/Group.vue";
import { bus } from "../app";
export default {
  name: "home",
  data: function() {
    return {
      groups: [],
      searchKey: ""
    };
  },
  components: {
    GroupTemplate
  },
  created() {
    bus.$on("newSearchKey", data => (this.searchKey = data));
    this.getResults();
  },
  methods: {
    getResults() {
    //   axios.get("api/group").then(response => {
    //     this.groups = response.data;
    //   });

        this.$http({
          url: `group`,
          method: 'GET'
        })
            .then((res) => {
              this.groups = res.data;
            }, () => {

            });
    }
  },
  computed: {
    filteredGroups: function() {
      if (!this.groups) return this.groups;

      return this.groups.filter(group =>
        `${group.course_name} ${group.course_code}`
          .toLowerCase()
          .match(this.searchKey.toLowerCase())
      );
    },
  }
};
</script>
<style>
.pagination {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 0 40px;
}

.pagination li {
  list-style-type: none;
  display: inline-block;
  background-color: rgba(0, 191, 166, 0.356);
  padding: 10px;
  width: 10px;
  height: 10px;
  line-height: 10px;
  border-radius: 50%;
  text-decoration: none;
  color: #fff;
}

.pagination a {
  text-decoration: none;
  color: #fff;
}

.page-item.pagination-page-nav.active {
  background-color: rgb(0, 191, 165);
}
</style>
