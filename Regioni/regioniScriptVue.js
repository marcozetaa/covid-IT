var regione = new Vue({ 
    el: '#component-regione',
    data: function() {
        return{
        regioneSelezionata: 0,
        regioni: [
                {id:0, nomeRegione:'Abruzzo', info:"regione stocazzo", image:'regioniFoto/abruzzo.png'},
                {id:1, nomeRegione:'Basilicata', info:"regione stocazzo", image:'regioniFoto/basilicata.png'},
                {id:2, nomeRegione:'Calabria', info:"regione stocazzo", image:'regioniFoto/calabria.png'},
                {id:3, nomeRegione:'Campania', info:"regione stocazzo", image:'regioniFoto/campania.png'},
                {id:4, nomeRegione:'Emilia-Romagna', info:"regione stocazzo", image:'regioniFoto/emilia-romagna.png'},
                {id:5, nomeRegione:'Friuli Venezia Giulia', info:"regione stocazzo", image:'regioniFoto/friuli-venezia-giulia.png'},
                {id:6, nomeRegione:'Lazio', info:"regione stocazzo", image:'regioniFoto/lazio.png'},
                {id:7, nomeRegione:'Liguria', info:"regione stocazzo", image:'regioniFoto/liguria.png'},
                {id:8, nomeRegione:'Lombardia', info:"regione stocazzo", image:'regioniFoto/lombardia.png'},
                {id:9, nomeRegione:'Marche', info:"regione stocazzo", image:'regioniFoto/marche.png'},
                {id:10, nomeRegione:'Molise', info:"regione stocazzo", image:'regioniFoto/molise.png'},
                {id:11, nomeRegione:'Piemonte', info:"regione stocazzo", image:'regioniFoto/piemonte.png'},
                {id:12, nomeRegione:'Puglia', info:"regione stocazzo", image:'regioniFoto/puglia.png'},
                {id:13, nomeRegione:'Sardegna', info:"regione stocazzo", image:'regioniFoto/sardegna.png'},
                {id:14, nomeRegione:'Sicilia', info:"regione stocazzo", image:'regioniFoto/sicilia.png'},
                {id:15, nomeRegione:'Toscana', info:"regione stocazzo", image:'regioniFoto/toscana.png'},
                {id:16, nomeRegione:'Trentino Alto Adige', info:"regione stocazzo", image:'regioniFoto/trentino-alto-adige.png'},
                {id:17, nomeRegione:'Umbria', info:"regione stocazzo", image:'regioniFoto/umbria.png'},
                {id:18, nomeRegione:"Valle D'Aosta", info:"regione stocazzo", image:'regioniFoto/valle-daosta.png'},
                {id:19, nomeRegione:'Veneto', info:"regione stocazzo", image:'regioniFoto/veneto.png'}
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
            return this.regioni[this.regioneSelezionata].nomeRegione;
        },
        info: function(){
            return this.regioni[this.regioneSelezionata].info;
        },
        image: function(){
            return this.regioni[this.regioneSelezionata].image;
        }
    }
});