<template>
    <div>
        <el-container style="border: 1px solid #eee">
            <el-aside width="300px">
                <el-form label-position="top" :model="filter" @submit.native.prevent>
                    <el-form-item label="Name">
                        <el-input type="text" v-model="filter.name"></el-input>
                    </el-form-item>
                    <el-form-item label="Price">
                        <el-col :span="11">
                            <el-form-item prop="from">
                                <el-input type="number" v-model="filter.priceFrom"></el-input>
                            </el-form-item>
                        </el-col>
                        <el-col class="line" :span="2">-</el-col>
                        <el-col :span="11">
                            <el-form-item prop="to">
                                <el-input type="number" v-model="filter.priceTo"></el-input>
                            </el-form-item>
                        </el-col>
                    </el-form-item>
                    <el-row :gutter="20">
                        <el-col :span="12">
                            <el-form-item label="Bedrooms">
                                <el-input type="number" v-model="filter.bedrooms"></el-input>
                            </el-form-item>
                        </el-col>
                        <el-col :span="12">
                            <el-form-item label="Bathrooms">
                                <el-input type="number" v-model="filter.bathrooms"></el-input>
                            </el-form-item>
                        </el-col>
                    </el-row>
                    <el-row :gutter="20">
                        <el-col :span="12">
                            <el-form-item label="Storeys">
                                <el-input type="number" v-model="filter.storeys"></el-input>
                            </el-form-item>
                        </el-col>
                        <el-col :span="12">
                            <el-form-item label="Garages">
                                <el-input type="number" v-model="filter.garages"></el-input>
                            </el-form-item>

                        </el-col>
                    </el-row>
                </el-form>
            </el-aside>

            <el-container>

                <el-main>
                    <el-table v-loading="loading" :data="property" :default-sort = "{prop: 'price', order: 'descending'}" empty-text="no results">
                        <el-table-column prop="name" label="Name" sortable></el-table-column>
                        <el-table-column prop="price" label="Price" sortable :formatter="price"></el-table-column>
                        <el-table-column prop="bedrooms" label="Bedrooms"></el-table-column>
                        <el-table-column prop="bathrooms" label="Bathrooms"></el-table-column>
                        <el-table-column prop="storeys" label="Storeys"></el-table-column>
                        <el-table-column prop="garages" label="Garages"></el-table-column>
                    </el-table>
                </el-main>
            </el-container>
        </el-container>
    </div>
</template>

<style>
    .el-container {
        height: 100vh;
    }
    .el-header {
        background-color: #B3C0D1;
        color: #333;
        line-height: 60px;
    }

    .el-aside {
        background-color: rgb(238, 241, 246);
        color: #333;
        padding: 30px;
    }

    .line {
        text-align: center;
    }

    .el-form--label-top .el-form-item__label {
        margin: 0;
        padding: 0;
    }
</style>

<script>
    export default {
        data() {
            return {
                property: [],
                filter: {
                    name: '',
                    priceFrom: '',
                    priceTo: '',
                    bedrooms: '',
                    bathrooms: '',
                    storeys: '',
                    garages: '',
                },
                loading: true,
            }
        },
        created() {
            this.getProperty();
        },
        watch: {
            filter: {
                handler: function() {
                    this.getProperty();
                },
                deep: true
            },
        },
        methods: {
            getProperty() {
                this.loading = true;
                axios.get('api/property', {
                    params: this.filter
                }).then((response) => {
                    this.property = response.data;
                    this.loading = false;
                })
            },
            price(row) {
                return row.price.toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 0,
                });
            }
        }
    };
</script>
