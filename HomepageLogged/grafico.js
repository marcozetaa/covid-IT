Chart.defaults.global.defaultFontColor = 'white';
Chart.defaults.global.defaultFontFamily = 'Open Sans';

var myGraf= new Vue({
    el: '#graf',
    data: function(){
            return{
                loading: true,
                error: false,
                myLabel: [],
                myDeceduti: [],
                myPositivi: [],
                myGuariti: [],
                graph_attribute: [
                    {id: 0, txt:"Deceduti", borderColor:'#FF6F00', backgroundColor:'rgba(255, 111, 0, 0.6)'},
                    {id: 1, txt:"Positivi", borderColor:'#66ffff', backgroundColor:'rgba(102, 255, 255, 0.6)'},
                    {id: 2, txt:"Guariti", borderColor:'rgba(255, 206, 86, 1)', backgroundColor:'rgba(255, 206, 86, 0.6)'},
                ]
            };
        },
    methods: {
            doGraph: function(result,ctx,index){                
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: this.myLabel,
                        datasets: [{     
                            label: this.graph_attribute[index].txt,       
                            data: result,
                            backgroundColor: [
                                this.graph_attribute[index].backgroundColor
                            ],
                            borderColor: [
                                this.graph_attribute[index].borderColor
                            ],
                            borderWidth: 4,
                            hoverBorderColor: 'black'
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        title: {
                            display: true,
                            text: this.graph_attribute[index].txt
                        },
                        legend: {
                            display: false
                        }
                    }
                });  
            },
        },
    computed : {
        trendDeceduti: function(){
            var tx= "Deceduti";
            var ctx = document.getElementById('myChartD').getContext('2d');
            this.doGraph(this.myDeceduti,ctx,0);
        },

        trendPositivi: function(){
            var tx="Positivi";
            var ctx = document.getElementById('myChartP').getContext('2d');
            this.doGraph(this.myPositivi,ctx,1);
        },              
        trendGuariti: function(){
            var tx="Guariti";
            var ctx = document.getElementById('myChartG').getContext('2d');
            this.doGraph(this.myGuariti,ctx,2);
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




