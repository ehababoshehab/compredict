<template>
    <div>
        <div class="d-flex justify-content-between align-content-center mb-2">
            <div class="col-md-4">
                <input
                    v-model.keyup="search"
                    type="search"
                    class="form-control"
                    placeholder="Search by name..."
                />
            </div>
        </div>

        <div class="card-body table-responsive table-wrapper-scroll-y">
            <table class="table table-hover table-striped mb-0 table-bordered">
                <tbody>
                    <tr>
                        <th>
                            <a href="#" @click.prevent="change_sort('id')"
                                >Id</a
                            >
                            <span
                                v-if="
                                    sort_direction == 'desc' &&
                                        sort_by == 'id'
                                "
                                >&uarr;</span
                            >
                            <span
                                v-if="
                                    sort_direction == 'asc' &&
                                        sort_by == 'id'
                                "
                                >&darr;</span
                            >
                        </th>
                        <th>
                            <a href="#" @click.prevent="change_sort('name')"
                                >Name</a
                            >
                            <span
                                v-if="
                                    sort_direction == 'desc' &&
                                        sort_by == 'name'
                                "
                                >&uarr;</span
                            >
                            <span
                                v-if="
                                    sort_direction == 'asc' &&
                                        sort_by == 'name'
                                "
                                >&darr;</span
                            >
                        </th>
                        <th>
                            <a href="#" @click.prevent="change_sort('trips_count')"
                                >Trips</a
                            >
                            <span
                                v-if="
                                    sort_direction == 'desc' &&
                                        sort_by == 'trips_count'
                                "
                                >&uarr;</span
                            >
                            <span
                                v-if="
                                    sort_direction == 'asc' &&
                                        sort_by == 'trips_count'
                                "
                                >&darr;</span
                            >
                        </th>
                        <th>
                            <a
                                href="#"
                                @click.prevent="change_sort('created_at')"
                                >Created At</a
                            >
                            <span
                                v-if="
                                    sort_direction == 'desc' &&
                                        sort_by == 'created_at'
                                "
                                >&uarr;</span
                            >
                            <span
                                v-if="
                                    sort_direction == 'asc' &&
                                        sort_by == 'created_at'
                                "
                                >&darr;</span
                            >
                        </th>
                    </tr>

                    <tr
                        v-for="vehicle in vehicles"
                        :key="vehicle.id"
                    >
                        <td>{{ vehicle.id }}</td>
                        <td>
                            <router-link v-bind:to="'/vehicles/' + vehicle.id + '/trips-plot'"">{{ vehicle.name }}</router-link>
                        </td>
                        <td>{{ vehicle.trips_count }}</td>
                        <td>{{ vehicle.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- <pagination :data="vehicles" @pagination-change-page="getVehicles"></pagination> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            vehicles: {},
            search: "",
            selectPage: false,
            selectAll: false,
            sort_direction: "desc",
            sort_by: "created_at",
            url: "",
            getVehiclesUrl: ""
        };
    },

    watch: {
        search: function(value) {
            this.search=value;
            this.getVehicles();
        },
    },

    methods: {
        change_sort(field) {
            if (this.sort_by == field) {
                this.sort_direction =
                    this.sort_direction == "asc" ? "desc" : "asc";
            } else {
                this.sort_by = field;
            }
            this.getVehicles();
        },
        getVehicles() {
            this.getVehiclesUrl = '/api/vehicles?&name='+this.search+'&sort_by='+this.sort_by+'&sort_direction='+this.sort_direction;
            axios.get(this.getVehiclesUrl).then(response => {
                this.vehicles = response.data.data.vehicles
            });
        }
    },

    mounted() {
        this.getVehicles();
    }
};
</script>
