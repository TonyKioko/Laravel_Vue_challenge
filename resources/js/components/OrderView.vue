<template>
  <div>
    <div class="container">
      <h2 class="text-center">Orders Details</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Order Number</th>
            <th>Product Id</th>
            <!-- <th>Quantity</th> -->
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!-- <td>{{order_details}}</td> -->

            <td>{{order_id}}</td>
            <td>{{product_id}}</td>
            <td>{{created_at}}</td>
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
      created_at: ""
    };
  },
  props: ["orderId"],
  beforeMount() {
    let url = `/api/orders/${this.$route.params.orderId}`;
    axios.get(url).then(response => {
      console.log("response", response.data.order_details.order_id);
      // this.orders_details = response.data.order_details
      this.order_id = response.data.order_details.order_id;
      this.product_id = response.data.order_details.product_id;
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