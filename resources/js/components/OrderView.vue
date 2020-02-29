<template>
  <div>
    <div class="container">
      <button class="btn btn-warning btn-md" @click.prevent="$router.go(-1)">Back</button>
      <h2 class="text-center">Orders Details</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Order Number</th>
            <th>Product</th>
            <th>Price</th>
            <th>Image</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!-- <td>{{order_details}}</td> -->

            <td>{{order_id}}</td>
            <td>{{name}}</td>
            <td>Ksh {{price}}</td>

            <td> <img :src="image" :alt="image" style="width:50px;height:50px;"></td>
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
      order_id: "",
      product_id: "",
      created_at: "",
      name: "",
      price: "",
      image: ""
    };
  },
  props: ["orderId"],
  beforeMount() {
    let url = `/api/orders/${this.$route.params.orderId}`;
    axios.get(url).then(response => {
      console.log("response", response.data);
      // this.orders_details = response.data.order_details
      this.order_id = response.data.order_details.order_id;
      this.product_id = response.data.order_details.product_id;
      this.name = response.data.order_details.product.name
      this.price = response.data.order_details.product.price
      this.image = response.data.order_details.product.image
      this.created_at = new Date(
        response.data.order_details.created_at
      ).toLocaleDateString();

      console.log("order_details", this.orders_details);
    });
  },
  mounted() {
    // this.getOrderDetails();
  },
  methods: {
    deleteOrder(id) {
      axios
        .delete("api/orders", id)
        .then(response => console.log("order deleted"));
    },
    getOrderDetails() {
      axios
        .get(this.$route.params.orderId)
        .then(response => {
          console.log("order details", orders_details);
          console.log("waiting for response");
          console.log(response.data);
          this.orders_details = response.data;
        })
        .catch(error => {
          console.log(error.response);
        })
        .finally(() => {
          console.log("done");
        });
    }
  }
};
</script>