<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Shop Name</h1>
                <hr />
                <app-search v-model="filter.search" :change-handler="loadProducts"></app-search>
                <hr />

                <!-- <vue-slider
                    v-model="priceRange"
                    :enable-cross="false"
                    :min="Math.floor(this.min_price)"
                    :max="Math.ceil(this.max_price)"
                    :interval="1"
                    :lazy="true"
                    @change="loadProducts"
                ></vue-slider>-->
                <h5>Categories</h5>
                <div class="form-check" v-for="(category, id) in categories" :key="id">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        :value="category.id"
                        :id="'category-'+id"
                        v-model="filter.categories"
                        @change="loadProducts"
                    />
                    <label class="form-check-label" :for="'category-'+id">{{category.name}}</label>
                </div>
                <div></div>
                <hr />
                <div class="form-group mt-3">
                    <app-price-filter
                        v-model="price"
                        :change-handler="loadProducts"
                        :min-price="min_price"
                        :max-price="max_price"
                   ></app-price-filter>
                </div>
    
                <!-- {{price.min}} -->
                <hr />
                <button
                    class="btn btn-outline-danger btn-block"
                    @click="clearAllFilters"
                >Clear All Filters</button>
            </div>
            <!-- /.col-lg-3 -->

            <!-------------------------------------------------END SIDEBAR------------------------------------------------------------>

            <div class="col-lg-9 mt-4">
                <div class="row .no-gutters pl-3">
                    <div class="col-xs-1">
                        <div class="form-group form-inline px-1">
                            <app-no-of-products
                                v-model="filter.noOfProducts"
                                :change-handler="loadProducts"
                                select-class="form-control px-1"
                            ></app-no-of-products>
                        </div>
                    </div>

                    <div class="float-right">
                        <paginate
                            :page-count="pageCount"
                            :click-handler="loadProducts"
                            :prev-text="'<'"
                            :next-text="'>'"
                            :container-class="'pagination'"
                            :page-class="'page-item'"
                            :page-link-class="'page-link'"
                            :prev-class="'page-item'"
                            :prev-link-class="'page-link'"
                            :next-class="'page-item'"
                            :next-link-class="'page-link'"
                            :break-view-class="'page-item'"
                            :break-view-link-class="'page-link'"
                        ></paginate>
                       
                    </div>

                    <div class="col-md pl-0">
                        <div class="form-group form-inline float-lg-right">
                            <label for="productSortBy">Sort By - &nbsp;</label>
                            <app-product-sort-by
                                select-class="form-control"
                                select-id="productSortBy"
                                v-model="filter.orderBy"
                                :change-handler="loadProducts"
                            ></app-product-sort-by>

                            <!-- ***PRODUCT STYLE BUTTONS*** -->

                            <button
                                class="btn btn-outline-secondary"
                                :disabled="productListStyle == 'grid'"
                                @click="productListStyle = 'grid'"
                            >
                                <i class="fa fa-th" aria-hidden="true"></i>
                            </button>
                            <button
                                class="btn btn-outline-secondary"
                                :disabled="productListStyle == 'list'"
                                @click="productListStyle = 'list'"
                            >
                                <i class="fa fa-th-list" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-------------------------------------------------END TOPBAR------------------------------------------------------------>

                <div
                    class="row no-matching-products"
                    v-show="productsLoaded && products.length === 0"
                >
                    <div class="col text-center my-auto pb-5">
                        <h1 class="alert">
                            There are no products that
                            <br />match your filter :(
                        </h1>
                    </div>
                </div>

                <!--GRID STYLE -->

                <div class="product-grid min-vh-100" v-show="productListStyle == 'grid'">
                    <div class="row">
                        <div :class="{'loader': loading}"></div>
                        <div
                            class="col-lg-4 col-md-6 mb-4"
                            v-for="(product,id) in products"
                            v-bind:key="id"
                            v-show="!loading"
                        >
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" :src="productImg" alt />
                                </a>
                                <div class="card-header" :class="product.category.name">
                                    <h4 class="card-title">
                                        <a href="#">{{product.name}}</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <h5>{{product.price}}</h5>
                                    <p class="card-text">{{product.description}}</p>
                                </div>
                                <div
                                    class="card-footer"
                                    :class="product.category.name"
                                >{{product.category.name}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--LIST STYLE -->

                <div class="product-grid min-vh-100" v-show="productListStyle == 'list'">
                    <div class="row">
                        <div :class="{'loader': loading}"></div>
                        <div
                            class="col-lg-12 col-md-12 mb-4"
                            v-for="(product,id) in products"
                            v-bind:key="id"
                            v-show="!loading"
                        >
                            <div class="card h-100">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <a href="#">
                                            <img class="card-img-top img-list" :src="productImg" />
                                        </a>
                                    </div>

                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="#">{{product.name}}</a>
                                            </h4>
                                            <h5>{{product.price}}</h5>
                                            <p class="card-text">{{product.description}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">{{product.category.name}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
        <hr />
    </div>
    <!-- /.row -->

    <!-- /.container -->
</template>

<script>
import Paginate from "vuejs-paginate";
import AddCategory from "../components/AddCategory.vue";
import Search from "../components/frontpage/Search.vue";
import PriceFilter from "../components/frontpage/PriceFilter.vue";
import NoOfProducts from "../components/frontpage/NoOfProducts.vue";
import ProductSortBy from "../components/frontpage/ProductSortBy.vue";

import VueSlider from "vue-slider-component";
import "vue-slider-component/theme/default.css";

export default {
    data() {
        return {
            categories: [],
            products: [],
            max_price: 100,
            min_price: 0,
            loading: true,
            pageCount: 1,
            productImg: "http://placehold.it/700x400",
            productListStyle: "grid",
            productsLoaded: false,
            priceRange: [],
            price: {
                 min: null,
                 max: null
             }
        };
    },

    components: {
        "add-category": AddCategory,
        "app-search": Search,
        "app-price-filter": PriceFilter,
        "app-no-of-products": NoOfProducts,
        "app-product-sort-by": ProductSortBy,
        Paginate,
        VueSlider
    },

    computed: {
        filter() {
            return {
                categories: [],
                minPrice: this.price.min,
                maxPrice: this.price.max,
                noOfProducts: 10,
                orderBy: "latest",
                search: ""
            };
        }
    },

    mounted() {
        this.loadCategories();
        this.loadProducts();
    },

    methods: {
        loadCategories: function() {
            this.loading = true;
            axios
                .get("/api/categories")
                .then(response => {
                    this.categories = response.data.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },

        loadProducts: function(index) {
            this.loading = true;
            axios
                .get("/api/products?page=" + index, {
                    params: this.filter
                })
                .then(response => {
                    this.products = response.data.data;
                    this.pageCount = response.data.meta.last_page;
                    this.loading = false;
                    this.min_price = response.data.meta.min_price / 100;
                    this.max_price = response.data.meta.max_price / 100;
                   // this.price.min = response.data.meta.min_price / 100;
                   // this.price.max = response.data.meta.max_price / 100;

                    if (!this.productsLoaded) {
                        this.priceRange = [this.min_price, this.max_price];
                    }
                    this.productsLoaded = true;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },

        clearAllFilters: function() {
            this.filter = {
                categories: [],
                minPrice: null,
                maxPrice: null,
                noOfProducts: 10,
                orderBy: "latest",
                search: ""
            };
            this.loadProducts();
        }
    }
};
</script>

