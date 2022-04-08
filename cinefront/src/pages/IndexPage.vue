<template>
  <q-page class="">
    <div class="row">
      <div v-for="f in peliculas" :key="f.id" class="col-12 col-sm-4 q-pa-xs">
        <q-card >
          <q-parallax
            @click="selecionarfuncion(f)"
            :src="url+'../imagenes/'+f.pelicula.imagen"
            :height="300"
          />
          <q-card-section>
            <q-btn
              fab
              @click="selecionarfuncion(f)"
              color="primary"
              icon="paid"
              class="absolute"
              style="top: 0; right: 12px; transform: translateY(-50%);"
            />
            <div class="row no-wrap items-center">
              <div class="col text-h6 ellipsis">
                {{f.pelicula.titulo}}
              </div>
              <div class="col-auto text-grey text-subtitle2 q-pt-md row no-wrap items-center">
<!--                <q-icon name="paid" /> {{ f.precio }} Bs-->
<!--                Multicines plaza-->
              </div>
            </div>
            <q-rating v-model="f.pelicula.estrellas" :max="5" size="30px"  />
          </q-card-section>

          <q-card-section class="q-pt-none">
            <div class="text-subtitle1">
<!--              <q-badge :label="f.tipo"/>-->
              <q-badge :label="f.pelicula.clasificacion"/>
              <q-badge :label="f.pelicula.tiempo+' min'"/>
              <q-badge v-if="f.pelicula.estreno" label="ESTRENO" color="red-10"/>
            </div>
            <div class="text-subtitle2 text-grey">
              Director: {{f.pelicula.director}}
            </div>
          </q-card-section>

          <q-separator />

          <q-card-actions>
            <q-btn type="a" :href="f.pelicula.trailer" target="_blank"  icon="fa-brands fa-youtube" color="negative" label="trailer" />
            <q-btn @click="selecionarfuncion(f)" color="primary" icon="paid" label="comprar"/>
          </q-card-actions>
        </q-card>
      </div>
    </div>
    <q-dialog v-model="modalfunciones" full-width full-height>
      <q-card>
        <q-card-section>
          <div class="text-h6">Fuciones disponibles 1/4  <q-btn flat round color="primary" icon="schedule"/> </div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <q-card>
            <q-tabs v-model="tab" dense class="bg-grey-3" align="justify" narrow-indicator>
<!--              <q-tab name="mails" label="Mails" />-->
<!--              <q-tab name="alarms" label="Alarms" />-->
<!--              <q-tab name="movies" label="Movies" />-->
              <q-tab @click="cambio(f)" v-for="(f,i) in fechas" :key="i" :name="i" >
                <div class="text-subtitle2">{{formatofecha(f.fecha,'ddd')}}</div>
                <div class="text-subtitle">{{formatofecha(f.fecha,'DD MMM YYYY')}}</div>
<!--                <pre>{{f.fecha}}</pre>-->
              </q-tab>
            </q-tabs>
            <q-tab-panels v-model="tab" animated>
              <q-tab-panel v-for="(f,i) in fechas" :key="i" :name="i">
<!--                <div class="text-h6">{{ f.fecha }}</div>-->
                <div class="row">
                  <div class="col-12 col-sm-4" v-for="f in funcionesaelegir" :key="f.id">
                    <q-card >
                      <q-card-section>
                        <div class="text-h6 text-center">
                          <q-badge v-if="f.sub" label="SUB" />
                          <q-badge v-if="f.traducida" label="TRADUCIDA" color="secondary" />
                          <q-badge :label="f.tipo" color="info"/>
                        </div>
                        <div class="text-subtitle2 text-center">
                          {{f.hora.substring(0,5)}} - {{f.sala.nombre}} <q-btn @click="frmentradas(f)" color="primary" icon="paid" :label="'Comprar '+f.precio+' Bs'" />
                        </div>
                      </q-card-section>
                      <!--                    <q-card-section>-->
                      <!--                      {{ f }}-->
                      <!--                    </q-card-section>-->
                    </q-card>
                  </div>
                </div>

              </q-tab-panel>
            </q-tab-panels>
          </q-card>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn flat label="OK" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
    <q-dialog v-model="modalcantidadentradas" full-width full-height>
      <q-card>
        <q-card-section>
          <div class="text-h6">Cantidad de entradas 2/4  <q-btn flat round color="primary" icon="local_activity"/> </div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          <q-card>
            <q-card >
              <q-card-section>
                <div class="text-h6 text-center">
                  <div class="row">
                    <div class="col-12 col-sm-4"></div>
                    <div class="col-4 col-sm-1"><q-btn @click="entradasmas" color="positive"  icon="add_circle" /></div>
                    <div class="col-4 col-sm-2"><div class="text-h5 text-center text-bold">{{cantidadentradas}}</div></div>
                    <div class="col-4 col-sm-1"><q-btn @click="entradasmenos" color="negative"  icon="remove_circle" /></div>
                    <div class="col-12 col-sm-4"></div>
                    <div class="col-12">
                      <div class="text-subtitle2 q-pt-md text-grey">Seleccion cuántas entradas desea para {{funcion.pelicula.titulo}}</div>
                    </div>
                    <div class="col-12">
                      <div class="text-subtitle q-pt-md ">Monto {{funcion.precio*cantidadentradas}} Bs</div>
                    </div>
                    <div class="col-12 q-pt-md">
                      <q-btn @click="frmsala" icon="movie" color="primary" label="continuar" />
                    </div>
                  </div>
<!--                  <q-badge v-if="f.sub" label="SUB" />-->
<!--                  <q-badge v-if="f.traducida" label="TRADUCIDA" color="secondary" />-->
<!--                  <q-badge :label="f.tipo" color="info"/>-->
                </div>
<!--                <div class="text-subtitle2 text-center">-->
<!--                  {{f.hora.substring(0,5)}} - {{f.sala.nombre}} <q-btn @click="frmentradas(f)" color="primary" icon="paid" :label="'Comprar '+f.precio+' Bs'" />-->
<!--                </div>-->
              </q-card-section>
              <!--                    <q-card-section>-->
              <!--                      {{ f }}-->
              <!--                    </q-card-section>-->
            </q-card>
          </q-card>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn flat label="OK" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
    <q-dialog v-model="modalsala" full-width full-height>
      <q-card>
        <q-card-section>
          <div class="text-h6">Seleccionar asientos 3/4  <q-btn flat round color="primary" icon="movie"/> </div>
        </q-card-section>
        <q-card-section class="q-pt-none">
            <q-card >
              <q-card-section class="q-pa-none q-ma-none">
                <div class="text-h6 text-center">
                  <div class="row">
                    <div class="col-12">
                      <q-banner class="bg-primary text-white text-center text-weight-bold">
                        <div class="row">
                          <div class="col-2"><q-btn icon="arrow_left" flat round/></div>
                          <div class="col-8"><b>PANTALLA</b></div>
                          <div class="col-2"><q-btn icon="arrow_right" flat round/></div>
                        </div>
                      </q-banner>
                    </div>
                    <div class="col-12">
<!--                      <q-responsive :ratio="16/9">-->
                        <div  auto-width :style="'overflow-x:auto;display: grid;grid-template-columns: '+generarx(funcion.sala.x)+';padding-bottom:10px'">
                          <div @click="selecionarbutaca(b)" v-for="b in funcion.sala.butacas" :key="b.id" class="grid-item">{{b.x}}{{b.y}}</div>
                        </div>
<!--                      </q-responsive>-->

                    </div>
<!--                    <div class="col-12">-->
<!--                      <div class="text-subtitle2 q-pt-none "><pre>{{funcion.sala.butacas}}</pre></div>-->
<!--                    </div>-->
                    <div class="col-12 q-pt-md">
                      <q-btn icon="movie" color="primary" label="continuar" />
                    </div>
                  </div>
                  <!--                  <q-badge v-if="f.sub" label="SUB" />-->
                  <!--                  <q-badge v-if="f.traducida" label="TRADUCIDA" color="secondary" />-->
                  <!--                  <q-badge :label="f.tipo" color="info"/>-->
                </div>
                <!--                <div class="text-subtitle2 text-center">-->
                <!--                  {{f.hora.substring(0,5)}} - {{f.sala.nombre}} <q-btn @click="frmentradas(f)" color="primary" icon="paid" :label="'Comprar '+f.precio+' Bs'" />-->
                <!--                </div>-->
              </q-card-section>
              <!--                    <q-card-section>-->
              <!--                      {{ f }}-->
              <!--                    </q-card-section>-->
            </q-card>
        </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn flat label="OK" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-page>
</template>
<script>
import { date } from 'quasar'
import moment from 'moment-timezone'
export default{
  data(){
    return{
      tab:'mails',
      modalfunciones:false,
      modalsala:false,
      modalcantidadentradas:false,
      cantidadentradas:0,
      // stars:4,
      url:process.env.API,
      peliculas:[],
      funciones:[],
      funcion:{},
      funcionesaelegir:[],
      fechas:[],
    }
  },
  mounted() {
    this.$q.loading.show()
    this.$api.get('funcion').then(res=>{
      this.$q.loading.hide()
      this.peliculas=res.data
    })
  },
  methods:{
    generarx(num){
      let t=''
      for(let i=0;i<num;i++){
        t+=' auto'
      }
      return t
    },
    entradasmas(){
      if (this.cantidadentradas>=5){
        this.$q.notify({
          message:'Solo puedes comprar maximo 5 entradas',
          color:'red',
          icon:'error',
        })
        return false
      }
      this.cantidadentradas++
    },
    entradasmenos(){
      if (this.cantidadentradas > 1){
        this.cantidadentradas--
      }
    },
    frmentradas(f){
      this.funcion=f
      this.modalfunciones=false
      this.modalcantidadentradas=true
      this.cantidadentradas=1
    },
    formatofecha(dia,formato){
      // 'MMMM - dddd'
      // console.log(new Date())
      // let date = date.extractDate(dia, 'YYYY-MM-DD')
      let formattedString = date.formatDate(moment.tz(dia, "America/La_Paz"), formato, {
        days: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado' /* and all the rest of days - remember starting with Sunday */],
        daysShort: ['Dom.', 'Lun.', 'Mar.', 'Mie.', 'Jue.', 'Vie.', 'Sab.' /* and all the rest of days - remember starting with Sunday */],
        months: ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"],
        monthsShort: ["ENE", "FEB", "MAR", "ABR", "MAY", "JUN", "JUL", "AGO", "SEP", "OCT", "NOV", "DIC",]
      })
      // console.log(formattedString)
      return formattedString.toUpperCase()
    },
    selecionarfuncion(f){
      this.$q.loading.show()
      this.$api.get('funcion/'+f.pelicula_id).then(res=>{
        this.funciones=res.data.funciones
        this.fechas=res.data.fechas
        console.log(this.fechas)
        // console.log(this.funciones)
        this.funcionesaelegir=[]
        this.tab=0
        this.funciones.forEach(r=>{
          // console.log(r.fecha+'   -   '+this.fechas[0].fecha)
          if (r.fecha==this.fechas[0].fecha){
            this.funcionesaelegir.push(r)
          }
        })

        this.modalfunciones=true
        this.$q.loading.hide()
      })
    },
    cambio(f){
      // console.log(f)
      this.funcionesaelegir=[]
      this.funciones.forEach(r=>{
        // console.log(r.fecha+'   -   '+f.fecha)
        if (r.fecha==f.fecha){
          this.funcionesaelegir.push(r)
        }
      })
    },
    frmsala(){
      this.modalcantidadentradas=false
      this.modalsala=true
    },
    selecionarbutaca(b){
      console.log(b)
    }
  }
}
</script>
<style>
.grid-container {

}
.grid-item {
  background-color: rgb(0,150,136);
  color: white;
  outline: 1px solid rgba(0, 0, 0, 0.8);
  padding: 5px;
  font-size: 15px;
  margin: 3px;
  border-radius: 2px;
  width: 3em;
  text-align: center;
}
</style>
