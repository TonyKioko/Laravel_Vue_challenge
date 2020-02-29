<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h2 class="text-center">Product List</h2>
        </div>
        <div class="col-md-4">
          <router-link
            style="padding:10px;"
            :to="{'name':'ProductForm'}"
            class="btn-success btn-md"
          >Create Product</router-link>
        </div>
      </div>
      <table v-if="products.length > 0" class="table table-striped">
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
          <tr v-for="product in products" :key="'i'+product">
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
            </td>-->
          </tr>
        </tbody>
      </table>
       <div v-else class="text-center" style="margin-top:20px;">
        <p class="h4">No products available!</p>
      </div>
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
      axios.delete("api/products/" + id).then(response => {
        console.log("product deleted");
      });
      axios
        .get("api/products/")
        .then(response => (this.products = response.data));

      // REFRESH ORDERS ON DELETION
    }
  }
};
</script>