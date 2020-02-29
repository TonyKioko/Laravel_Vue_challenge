<template>
  <div>
    <div class="container">
      <h2 class="text-center">Product List</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product">
            <td>{{product.name}}</td>
            <td>{{product.price}}</td>
            <td>{{product.quantity}}</td>
            <td>
              <img :src="product.image" :alt="product.name" style="width:40px;height:40px;" />
            </td>

            <td>
              <button class="btn-danger" @click.prevent="deleteProduct(product.id)">Delete</button>
            </td>
            <!-- <td>
              <router-link
                :to="{name: 'OrderView', params:{orderId: product.id}}"
                class="btn btn-secondary btn-xs mr-2"
              >View</router-link>
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
      products: []
    };
  },
  mounted() {
    axios
      .get("api/products/")
      .then(response => (this.products = response.data));
  },
  methods: {
      
    deleteProduct(id) {
      axios
        .delete("api/products/" + id)
        .then(response => {
            
            console.log("product deleted")});
            axios
      .get("api/products/")
      .then(response => (this.products = response.data));

      // REFRESH ORDERS ON DELETION
    }
  }
};
</script>