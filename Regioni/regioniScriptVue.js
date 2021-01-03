var regione = new Vue({ 
    el: '#component-regione',
    data: function() {
        return{
            loading: true,
            errored: false,
            show: true,
            regioneSelezionata: this.getRegioneid(), 
            regioni: [],
            immagini: [
                {id:0, image:'regioniFoto/abruzzo.png'},
                {id:1, image:'regioniFoto/basilicata.png'},
                {id:2, image:'regioniFoto/calabria.png'},
                {id:3, image:'regioniFoto/campania.png'},
                {id:4, image:'regioniFoto/emilia-romagna.png'},
                {id:5, image:'regioniFoto/friuli-venezia-giulia.png'},
                {id:6, image:'regioniFoto/lazio.png'},
                {id:7, image:'regioniFoto/liguria.png'},
                {id:8, image:'regioniFoto/lombardia.png'},
                {id:9, image:'regioniFoto/marche.png'},
                {id:10, image:'regioniFoto/molise.png'},
                {id:11, image:'regioniFoto/trentino-alto-adige.png'},
                {id:12, image:'regioniFoto/trentino-alto-adige.png'},
                {id:13, image:'regioniFoto/piemonte.png'},
                {id:14, image:'regioniFoto/puglia.png'},
                {id:15, image:'regioniFoto/sardegna.png'},
                {id:16, image:'regioniFoto/sicilia.png'},
                {id:17, image:'regioniFoto/toscana.png'},
                {id:18, image:'regioniFoto/umbria.png'},
                {id:19, image:'regioniFoto/valle-daosta.png'},
                {id:20, image:'regioniFoto/veneto.png'}
            ]
        };
    },
    methods: {
        getRegioneid: function() {
            let urlParams = new URLSearchParams(window.location.search);
            let param = urlParams.get('id');
            if(!param) return 0;
            else return param;
        },
        showRegione: function(i){
            console.log("Index selezionato =", this.regioneSelezionata)
            console.log("Nome regione = ", this.regioni[this.regioneSelezionata].denominazione_regione)
            this.loading=true;
            setTimeout(() => {
                this.regioneSelezionata=i;
                this.loading=false;
            }, 1500);
        },
    },
    computed: {
        nomeRegione: function(){
            return this.regioni[this.regioneSelezionata].denominazione_regione;
        },
        data: function(){
            var data = this.regioni[this.regioneSelezionata].data;
            var res = data.split("T"); 
            return res[0] + ' - ' + res[1];
        },
        idRegione: function(){
            return this.regioni[this.regioneSelezionata].codice_regione;
        },
        ricoveratiConSintomi: function(){
            return this.regioni[this.regioneSelezionata].ricoverati_con_sintomi;
        },
        terapiaIntensiva: function(){
            return this.regioni[this.regioneSelezionata].terapia_intensiva; 
        },
        totaleOspedalizzati: function(){
            return this.regioni[this.regioneSelezionata].totale_ospedalizzati;
        },
        isolamentoDomiciliare: function(){
            return this.regioni[this.regioneSelezionata].isolamento_domiciliare;
        },
        totalePositivi: function(){
            return this.regioni[this.regioneSelezionata].totale_positivi;
        },
        variazioneTotalePositivi: function(){
            var info = this.regioni[this.regioneSelezionata].variazione_totale_positivi;
            if(info > 0) info = "+" + info;
            return info;
        },
        nuoviPositivi: function(){
            return this.regioni[this.regioneSelezionata].nuovi_positivi;
        },
        dimessiGuariti: function(){
            return this.regioni[this.regioneSelezionata].dimessi_guariti;
        },
        totaleDeceduti: function(){
            return this.regioni[this.regioneSelezionata].deceduti;
        },
        totaleCasi: function(){
            return this.regioni[this.regioneSelezionata].totale_casi;
        },
        totaleTamponi: function(){
            return this.regioni[this.regioneSelezionata].tamponi;
        },
        casiTestati: function(){
            return this.regioni[this.regioneSelezionata].casi_testati;
        },
        noteIT: function(){
            return this.regioni[this.regioneSelezionata].note_it;
        },
        image: function(){
            return this.immagini[this.regioneSelezionata].image;
        },
        computeColor: function(){
            var info = this.regioni[this.regioneSelezionata].variazione_totale_positivi;
            if( info > 0) return 'red';
            else return 'green';
        }
    },
    mounted () {
            axios.get('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni-latest.json')
            .then(response => {this.regioni = response.data})
            .catch(error => {
                console.log(error)
                this.errored=true;
            })
            .finally(() => this.loading=false);
        }
});
