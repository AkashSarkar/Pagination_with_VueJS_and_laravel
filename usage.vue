<template>
  <pagination
    style="float: right"
    v-if="pagination.last_page > 1"
    :pagination="pagination"
    :offset="5"
    @paginate="getList()"
  ></pagination>
</template>
<script>
export default {
  data() {
    return {
      perPage: ["10", "20", "30"],
      pagination: {
        current_page: 1
      }
    };
  },
  methods: {
    getList(url = AppURL.BaseURL + "/employees?page=") {
      axios
        .get(url + this.pagination.current_page)
        .then(response => {
          this.employees = response.data.data.data;
          this.pagination = response.data.pagination;
        })
        .catch(error => {
          console.log(error.response.data);
        });
    }
  },
  components: {
    Pagination
  },
  mounted() {
    this.getList();
  }
};
</script>

