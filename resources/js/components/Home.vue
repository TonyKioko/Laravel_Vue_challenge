<template>
        <div>
            <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
                <!-- <h2 class="title">Welcome to JamboStore</h2> -->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 product-box" v-for="(product,index) in products" :key="index">
                                <router-link :to="{ path: '/products/'+product.id}">
                                    <img :src="product.image" :alt="product.name" style="width:150px;height:150px;">
                                    <h5><span v-html="product.name"></span>
                                        <span class="small-text text-muted float-right">Ksh {{product.price}}</span>
                                    </h5>
                                    <button class="col-md-4 btn btn-sm btn-primary text-center">Order Now</button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script>
        export default {
            data(){
                return {
                    products : []
                }
            },
            mounted(){
                axios.get("api/products/").then(response => this.products = response.data)      
            }
        }
    </script>