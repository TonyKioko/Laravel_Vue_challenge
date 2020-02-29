<template>
  <div>
    <div class="container">
      <h2 class="text-center">Orders List</h2>
      <table v-if="orders.length > 0" class="table table-striped">
        <thead>
          <tr>
            <th>Order Number</th>
            <th>Created At</th>
            <th>Action</th>
            <th>Order Details</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="order in orders" :key="order">
            <td>{{order.order_number}}</td>
            <td>{{order.created_at}}</td>
            <td>
              <button class="btn-danger" @click.prevent="deleteOrder(order.id)">Delete</button>
            </td>
            <td>
              <router-link
                :to="{name: 'OrderView', params:{orderId: order.id}}"
                class="btn btn-primary btn-xs mr-2"
              >View</router-link>
            </td>
          </tr>
        </tbody>
      </table>
      <div v-else class="text-center">
        <p>No orders available!</p>
      </div>
    </div>
  </div>
</template>

    <script>
export default {
  data() {
    return {
      orders: []
    };
  },
  mounted() {
    this.getOrders();
  },
  methods: {
    deleteOrder(id) {
      axios.delete("api/orders/" + id).then(response => {
        console.log("order deleted");
        this.getOrders();
      });

      // REFRESH ORDERS ON DELETION
    },
    getOrders() {
      axios
        .get("api/orders/")
        .then(response => (this.orders = response.data.data));
    }
  }
};
</script>