<template>
  <div>
    <div class="card card-default mt-4">
      <div class="card-header">
        <button class="btn btn-info btn-lg" @click.prevent="$router.go(-1)">
          <em class="fa fa-arrow-left"></em>
        </button>

        <h2 class="text-center h2">Create Supplier</h2>
        <!-- <h2 v-if="mode.edit" class="text-center h2">Edit Customer</h2> -->

        <hr />
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <div class="row justify-content-around">
            <div class="col-md-4">
              <label>Supplier Name</label>
              <input
                type="text"
                v-model="supplier.name"
                class="form-control"
                v-validate="'required'"
                name="supplier.name"
              />
            </div>
          </div>
        </div>
<br>
        <div class="col-md text-center">
          <button @click.prevent="createSupplier" type="submit" class="btn btn-success">
            Save
          </button>
          
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      supplier: {
        name: ""
      }
    };
  },
  methods:{
      createSupplier(){
                console.log(this.supplier.name)
                let supplier = this.supplier.name
                console.log('supplier',supplier)
                axios.post(
                    '/api/suppliers/', {supplier}
                )
                .then((response) => {
                  console.log('supplier created succesfully')
                    console.log(response)
                    this.$router.push({
                        name: 'SupplierList',
                    })
                })
                .catch(error => {
                    // if(error){
                        console.log(error)
                    // } else if (error.message){
                        console.log(error.message)
                    // } else if (error.data){
                        console.log(error.data)
                    // }  else if (error.response){
                        console.log(error.response)
                    // }

                })
                .finally(() => console.log("finally"))

            },
  }
};
</script>