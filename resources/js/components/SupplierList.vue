<template>
  <div>
    <div class="container">
      <h2 class="text-center">Suppliers List</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Supplier Name</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="supplier in suppliers" :key="supplier">
            <td>{{supplier.id}}</td>
            <td>{{supplier.name}}</td>
            <td>{{supplier.created_at}}</td>
            <td>
              <button class="primary danger" @click.prevent="deleteSupplier(supplier.id)">Delete</button>
            </td>
            <!-- <td>
              <router-link
                :to="{name: 'OrderView', params:{orderId: supplier.id}}"
              
                class="btn btn-secondary btn-xs mr-2"
              >View
              </router-link>
            </td> -->
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

    <script>
export default {
  data() {
    return {
      suppliers: []
    };
  },
  mounted() {
    axios.get("api/suppliers/").then(response => (this.suppliers = response.data));
  },
  methods: {
    deleteSupplier(id) {
      axios
        .delete("api/suppliers/"+ id)
        .then(response => console.log("supplier deleted"));

        // REFRESH ORDERS ON DELETION 
        // ADD SWEET ALERT FOR DELETION
    }
  }
};
</script>