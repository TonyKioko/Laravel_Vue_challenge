<template>
  <div>
    <div class="card card-default mt-4">
      <div class="card-header">
        <button class=" btn btn-danger btn-md" @click.prevent="$router.go(-1)">Back
        </button>

        <h2 class="text-center h2">Create Product</h2>
        <!-- <h2 v-if="mode.edit" class="text-center h2">Edit Customer</h2> -->

        <hr />
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <div class="row justify-content-around">
            <div class="col-md-4">
              <label>Product Name</label>
              <input
                type="text"
                v-model="product.name"
                class="form-control"
                v-validate="'required'"
                name="product.name"
              />
              <label>Description</label>
              <input
                type="text"
                v-model="product.description"
                class="form-control"
                v-validate="'required'"
                name="product.description"
              />
              <label>Quantity</label>
              <input
                type="text"
                v-model="product.quantity"
                class="form-control"
                v-validate="'required'"
                name="product.quantity"
              />
            </div>
          </div>
        </div>
        <br />
        <div class="col-md text-center">
          <button @click.prevent="createProduct" type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      product: {
        name: "",
        description: "",
        quantity: 0
      }
    };
  },
  methods: {
      cleanData(){

                var temp = {}
                temp.name = this.product.name
                temp.description = this.product.description
                temp.quantity = this.product.quantity
             
                return temp
            },
    createProduct() {
      console.log(this.product.name);
      let name = this.product.name;
      console.log("product", product);
      let data = this.cleanData();
      console.log('data',data)
      axios
        .post("api/products/", {
          name:name
        })
        .then(response => {
          console.log("product created succesfully");
          console.log(response);
          this.$router.push({
            name: "SupplierList"
          });
        })
        .catch(error => {
          // if(error){
          console.log(error);
          // } else if (error.message){
          console.log(error.message);
          // } else if (error.data){
          console.log(error.data);
          // }  else if (error.response){
          console.log(error.response);
          // }
        })
        .finally(() => console.log("finally"));
    }
  }
};
</script>