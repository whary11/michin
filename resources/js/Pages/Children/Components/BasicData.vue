<template>
    <div>
        <h3>Datos básicos</h3>
        <div class="row">
            
            <div class="form-group col-md-12">
                <pre>{{basicData}}</pre>
            </div>
            <div class="form-group col-md-4">
                <label for="name">Nombre</label>
                <input v-model="basicData.name" type="text" id="name" name="name" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group col-md-4">
                <label for="surname">Primer apellido</label>
                <input v-model="basicData.surname" type="text" id="surname" name="surname" class="form-control" placeholder="Primer apellido">
            </div>
            <div class="form-group col-md-4">
                <label for="secound-surname">Segundo apellido</label>
                <input v-model="basicData.secoundSurname" type="text" id="secound-surname" name="secound-surname" class="form-control" placeholder="Segundo apellido">
            </div>
            <div class="form-group col-md-4">
                <label for="document-type">Tipo de documento</label>
                <v-select v-model="basicData.documentType" :options="documentTypes" label="name" placeholder="Tipo de documento" inputId="document-type">
                    <template slot="no-options">
                        <span>No existe el tipo de documento</span>
                    </template>
                </v-select>
            </div>
            <div class="form-group col-md-4">
                <label for="document">Número de documento</label>
                <input v-model="basicData.document" type="number" id="document" name="document" class="form-control" placeholder="Número de documento">
            </div>
            <div class="form-group col-md-4">
                <label for="expedition-date">Fecha de expedición</label>
                <datetime v-model="basicData.expeditionDate" :auto="true" input-id="expedition-date" input-class="form-control" placeholder="Fecha de expedición"></datetime>
            </div>

            <div class="form-group col-md-4">
                <label for="gender">Género</label>
                <v-select v-model="basicData.gender" :options="genders" label="name" placeholder="Género" inputId="gender">
                    <template slot="no-options">
                        <span>No existe el género</span>
                    </template>
                </v-select>
            </div>
            <div class="form-group col-md-4">
                <label for="date-birth">Fecha de nacimiento</label>
                <datetime v-model="basicData.dateBirth" :auto="true" input-class="form-control" input-id="date-birth" placeholder="Fecha de nacimiento"></datetime>
                <small class="text-success">{{ageCalculate}}</small>
            </div>
            <div class="form-group col-md-4">
                <label for="country">Nacionalidad</label>
                <v-select v-model="basicData.country" :options="countries" label="name" placeholder="Nacionalidad" inputId="country">
                    <template slot="no-options">
                        <span>No existe el país</span>
                    </template>
                </v-select>
            </div>
            
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            documentTypes: [
                {name:"Tarjeta de identidad", id:1},
                {name:"Registro civil", id:2},
            ],
            genders:[
                {name:"Masculino", id:1},
                {name:"Femenino", id:2},
            ],
            countries:[
                {name:"Colombia", id:1},
            ],
            basicData: {}
        }
    },
    computed:{
        ageCalculate() {
            if (this.basicData.dateBirth) {
                let fecha = this.basicData.dateBirth
                
                if (typeof fecha != "string" && fecha && esNumero(fecha.getTime())) {
                    fecha = formatDate(fecha, "yyyy-MM-dd");
                }

                var values = fecha.split("-");
                var dia = values[2];
                var mes = values[1];
                var ano = values[0];

                // cogemos los valores actuales
                var fecha_hoy = new Date();
                var ahora_ano = fecha_hoy.getYear();
                var ahora_mes = fecha_hoy.getMonth() + 1;
                var ahora_dia = fecha_hoy.getDate();

                // realizamos el calculo
                var edad = (ahora_ano + 1900) - ano;
                if (ahora_mes < mes) {
                    edad--;
                }
                if ((mes == ahora_mes) && (ahora_dia < dia)) {
                    edad--;
                }
                if (edad > 1900) {
                    edad -= 1900;
                }

                // calculamos los meses
                var meses = 0;

                if (ahora_mes > mes && dia > ahora_dia)
                    meses = ahora_mes - mes - 1;
                else if (ahora_mes > mes)
                    meses = ahora_mes - mes
                if (ahora_mes < mes && dia < ahora_dia)
                    meses = 12 - (mes - ahora_mes);
                else if (ahora_mes < mes)
                    meses = 12 - (mes - ahora_mes + 1);
                if (ahora_mes == mes && dia > ahora_dia)
                    meses = 11;

                // calculamos los dias
                var dias = 0;
                if (ahora_dia > dia)
                    dias = ahora_dia - dia;
                if (ahora_dia < dia) {
                    ultimoDiaMes = new Date(ahora_ano, ahora_mes - 1, 0);
                    dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
                }

                return edad + " años, " + meses + " meses"//  + dias + " días";
            }else{
                return ""
            }
        }
    }
}
</script>