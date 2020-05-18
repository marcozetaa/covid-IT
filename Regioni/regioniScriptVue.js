var regione = new Vue({ 
    el: '#component-regione',
    data: function() {
        return{
            loading: true,
            errored: false,
            regioneSelezionata: 0,
            regioni: [],
            immagini: [
                {id:0, image:'regioniFoto/abruzzo.png'},
                {id:1, image:'regioniFoto/basilicata.png'},
                {id:2, image:'regioniFoto/trentino-alto-adige.png'},
                {id:3, image:'regioniFoto/calabria.png'},
                {id:4, image:'regioniFoto/campania.png'},
                {id:5, image:'regioniFoto/emilia-romagna.png'},
                {id:6, image:'regioniFoto/friuli-venezia-giulia.png'},
                {id:7, image:'regioniFoto/lazio.png'},
                {id:8, image:'regioniFoto/liguria.png'},
                {id:9, image:'regioniFoto/lombardia.png'},
                {id:10, image:'regioniFoto/marche.png'},
                {id:11, image:'regioniFoto/molise.png'},
                {id:12, image:'regioniFoto/piemonte.png'},
                {id:13, image:'regioniFoto/puglia.png'},
                {id:14, image:'regioniFoto/sardegna.png'},
                {id:15, image:'regioniFoto/sicilia.png'},
                {id:16, image:'regioniFoto/toscana.png'},
                {id:17, image:'regioniFoto/trentino-alto-adige.png'},
                {id:18, image:'regioniFoto/umbria.png'},
                {id:19, image:'regioniFoto/valle-daosta.png'},
                {id:20, image:'regioniFoto/veneto.png'}
            ]
        };
    },
    methods: {
        showRegione: function(i){
            this.regioneSelezionata=i;
        }
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
            if (info > 0) $('#variazione').css('color','red');
            else $('#variazione').css('color','green');
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
        info: function(){
            return this.immagini[this.regioneSelezionata].info;
        },
        image: function(){
            return this.immagini[this.regioneSelezionata].image;
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