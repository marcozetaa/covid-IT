var myGraf= new Vue({
    el: '#graf',
    data: function(){
            return{
                loading: true,
                error: false,
                myLabel: [],
                myDeceduti: [],
                myPositivi: [],
                myGuariti: []
            };
        },
    methods: {
            doGraph: function(result,ctx){                
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: this.myLabel,
                        datasets: [{            
                            data: result,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 4
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });  
            },
        },
    computed : {
        trendDeceduti: function(){
            var tx= "Deceduti";
            var ctx = document.getElementById('myChartD').getContext('2d');
            this.doGraph(this.myDeceduti,ctx);
        },

        trendPositivi: function(){
            var tx="Positivi";
            var ctx = document.getElementById('myChartP').getContext('2d');
            this.doGraph(this.myPositivi,ctx);
        },              
        trendGuariti: function(){
            var tx="Guariti";
            var ctx = document.getElementById('myChartG').getContext('2d');
            this.doGraph(this.myGuariti,ctx);
        }
    },
    mounted () {
        axios.get('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale.json')
        .then(response => {
            let dati=response.data;
            for(var i=0; i<dati.length; i++){
                this.myDeceduti.push(dati[i].deceduti);
                var res = dati[i].data.split("T");
                var giorno = res[0].split("-");    
                this.myLabel.push(giorno[2]+"-"+giorno[1]+"-"+giorno[0].substring(2,4));
                this.myPositivi.push(dati[i].totale_positivi);
                this.myGuariti.push(dati[i].dimessi_guariti);
            }
        })
        .catch(error => {
            console.log(error)
            this.errored=true;
        })
        .finally(() => {
            this.loading=false;
        });
    }
});




