var reg = new Vue({
  el: '#areaReg',
  data: function(){
    return{
        loading: true,
        error: false,
        regioni: []
    };
  },

  computed : {
    totalePositiviR: function(){
      this.regioni.[0].totale_positivi;
    }
  },

  mounted () {
    axios.get('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni-latest.json')
    .then(response => {
        let dati=response.data;
        for(var i=0; i<dati.length; i++){
            this.totalePositiviR.push(dati[i].totale_positivi);
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