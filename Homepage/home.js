var italia = new Vue({
    el: '#tutto',
    data: function(){
        return{
            loading: true,
            error: false,
            italia: []
        };
    },

    computed: {
        /*data: function(){
            var data = this.italia.data;
            var res = data.split("T"); 
            return res[0] + ' - ' + res[1];
        },*/

        ricoveratiConSintomi: function(){
            console.log("RCS= " + this.italia.ricoverati_con_sintomi)
            return this.italia.ricoverati_con_sintomi;
        },

        terapiaIntensiva: function(){
            console.log("TI= " + this.italia.terapia_intensiva)
            return this.italia.terapia_intensiva;
        },

        totaleOspedalizzati: function(){
            return this.italia.totale_ospedalizzati;
        },

        isolamentoDomiciliare: function(){
            return this.italia.isolamento_domiciliare;
        },

        totalePositivi: function(){
            return this.italia.totale_positivi;
        },

        varPositivi: function(){
            var pos = this.italia.variazione_totale_positivi;
            return pos;
        },

        nuoviPositivi: function(){
            return this.italia.nuovi_positivi;
        },

        dimessiGuariti: function(){
            return this.italia.dimessi_guariti;
        },

        deceduti: function(){
            return this.italia.deceduti;
        },

        totaleCasi: function(){
            return this.italia.totale_casi;
        },
        
        tamponi: function(){
            return this.italia.tamponi;
        },

        casiTestati: function(){
            return this.italia.casi_testati;
        },

        computeColor: function(){
            var pos = this.italia.variazione_totale_positivi;
            if( pos > 0) return 'red';
            else return 'green';
        }

    },
    mounted () {
        axios.get('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale-latest.json')
        .then(response => {this.italia = response.data[0]})
        .catch(error => {
            console.log(error)
            this.errored=true;
        })
        .finally(() => {
            //console.log(this.italia)
            this.loading=false
        });
    }
});