<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h2 class="text-center">Suppliers List</h2>
        </div>
        <div class="col-md-4">
          <router-link style="padding:10px;" :to="{'name':'SupplierForm'}" class="btn-success btn-md">Create New Supplier</router-link>
        </div>
      </div>

      <table v-if="suppliers.length > 0" class="table table-striped">
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
              <button class="btn-danger" @click.prevent="deleteSupplier(supplier.id)">Delete</button>
            </td>
        
          </tr>
        </tbody>
      </table>
       <div v-else class="text-center" style="margin-top:20px;">
        <p class="h4">No suppliers available!</p>
      </div>
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
   this.getSuppliers();
  },
  methods: {

    getSuppliers(){
       axios
      .get("api/suppliers/")
      .then(response => (this.suppliers = response.data));
    },
    deleteSupplier(id) {
      axios
        .delete("api/suppliers/" + id)
        .then(response => {console.log("supplier deleted")
        this.getSuppliers()
        });

      // REFRESH ORDERS ON DELETION
      // ADD SWEET ALERT FOR DELETION
    }
  }
};
</script>