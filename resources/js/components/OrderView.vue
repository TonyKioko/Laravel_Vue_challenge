<template>
  <div>
    <div class="container">
      <h2 class="text-center">Orders Details</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Order Number</th>
            <th>Product Id</th>
            <th>Quantity</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="order in orders" :key="order">
            <td>{{order_details.order_id}}</td>
            <td>{{order_details.product_id}}</td>
            <td>{{order_details.created_at}}</td>
          
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
      orders_details: []
    };
  },
   props: [
            'orderId'
        ],
  mounted() {
    this.getOrderDetails()

  },
  methods:{
    deleteOrder(id){
      axios.delete('api/orders',id).then(response => 
      console.log('order deleted'))
    },
    getOrderDetails(){
                axios
                .get(
                    this.$route.params.orderId
                ).then(response => {
                    console.log('order details',orders_details)
                    console.log('waiting for response')
                    console.log(response.data)
                    this.orders_details = response.data

                }).catch(error => {
                    console.log(error.response)
                }).finally(() => {
                    console.log("done")
                });
            },
  }
};
</script>