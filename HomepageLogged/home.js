var italia = new Vue({
    el: '#ultimi_dati',
    data: function(){
        return{
            loading: true,
            error: false,
            italia: [],
            regioni: [],
        };
    },

    computed: {
        giorno: function() {
            var data = this.italia.data + '';
            var res = data.split("T");
            var giorno = res[0].split("-");
            return giorno[2] + "-" + giorno[1] + "-" + giorno[0];
        },
        
        ora: function() {
            var data = this.italia.data+'';
            var res = data.split("T");
            return res[1];
        },

        ricoveratiConSintomi: function(){
            return this.italia.ricoverati_con_sintomi;
        },

        terapiaIntensiva: function(){
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
        },

        nomeRegione: function(){
            return this.regioni.denominazione_regione;
        },
        reg_ricoveratiConSintomi: function(){
            return this.regioni.ricoverati_con_sintomi;
        },
        reg_terapiaIntensiva: function(){
            return this.regioni.terapia_intensiva; 
        },
        reg_totaleOspedalizzati: function(){
            return this.regioni.totale_ospedalizzati;
        },
        reg_isolamentoDomiciliare: function(){
            return this.regioni.isolamento_domiciliare;
        },
        reg_totalePositivi: function(){
            return this.regioni.totale_positivi;
        },
        reg_variazioneTotalePositivi: function(){
            var info = this.regioni.variazione_totale_positivi;
            if(info > 0) info = "+" + info;
            return info;
        },
        reg_nuoviPositivi: function(){
            return this.regioni.nuovi_positivi;
        },
        reg_dimessiGuariti: function(){
            return this.regioni.dimessi_guariti;
        },
        reg_totaleDeceduti: function(){
            return this.regioni.deceduti;
        },
        reg_totaleCasi: function(){
            return this.regioni.totale_casi;
        },
        reg_totaleTamponi: function(){
            return this.regioni.tamponi;
        },
        reg_casiTestati: function(){
            return this.regioni.casi_testati;
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
            this.loading=false
        });
        axios.get('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni-latest.json')
        .then(response => {
            var index = 0;
            let urlParams = new URLSearchParams(window.location.search);
            var reg = urlParams.get('regione');
            for(var i=0; i < response.data.length; i++){
                if(response.data[i].denominazione_regione == reg)
                    index = i;
            }
            console.log(response.data[index]);
            this.regioni = response.data[index]})
        .catch(error => {
            console.log(error)
            this.errored=true;
        })
        .finally(() => {
            this.loading=true;
        });
    }
});