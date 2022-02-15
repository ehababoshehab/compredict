<template>
<div>
    <router-link v-bind:to="'/vehicles'"">Back to Vehicles</router-link>
    <div class="d-flex justify-content-between align-content-center mb-2">
        <div class="col-md-4">
            <input
                v-model.keyup="search"
                type="search"
                class="form-control"
                placeholder="Search by recorded at..."
            />
        </div>
    </div>
    <div id="plotChart" style="height:100%">

    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover table-striped mb-0 table-bordered">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>Milage</th>
                    <th>Recoreded At</th>
                    <th>Created At</th>
                </tr>

                <tr v-for="trip in trips" :key="trip.id">
                    <td>{{ trip.id }}</td>
                    <td>{{ trip.mileage }}</td>
                    <td>{{ trip.recoreded_at }}</td>
                    <td>{{ trip.created_at }}</td>
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
			vehicleId : this.$route.params.id,
            trips : {},
            search: "",
        };
    },

	watch: {
        search: function(value) {
            this.search=value;
            this.GetTrips();
        },
    },

    methods: {
		Plot: function(tripsData) {
			if (tripsData) {
				let plotX = [];
				let plotY = [];
				for (var i = 0; i < tripsData.length; i++) {
					plotY.push(tripsData[i].mileage);
					plotX.push(tripsData[i].recoreded_at)
				}
				let plotChart = document.getElementById('plotChart');
                let layout = {
                    title:'Adding date and milage to basic line plot',
                    margin: { t: 100 }
                };
				Plotly.newPlot( plotChart, [{
				x: plotX,
				y: plotY }],
                layout);
			}
		},
		GetTrips: function() {
            axios.get('/api/vehicles/'+this.vehicleId+'/trips-plot?recoreded_at='+this.search).then(response => {
                let tripsData = response.data.data.trips;
				this.Plot(tripsData);
                this.trips = response.data.data.trips;
            }).catch(function (error) {
                alert(error.response.data.message)
                console.log(error.response.data.message);
            });
        },
    },

	mounted() {
		this.GetTrips();
    }
}
</script>
